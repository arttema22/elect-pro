<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;

mihaildev\elfinder\Assets::noConflict($this);

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <div class="row">
        <div class="col-md-6">
            <?=
            $form->field($model, 'name')->widget(CKEditor::className(), [
                'editorOptions' => [
                    'preset' => 'basic', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
                    'inline' => true, //по умолчанию false
                ],
            ]);
            ?>
            <div class="form-group field-product-category_id has-success">
                <label class="control-label" for="product-category_id"><?= Yii::t('admin', 'Root category') ?></label>
                <select id="product-category_id" class="form-control" name="Product[category_id]">
                    <?= app\components\CatalogWidget::widget(['tpl' => 'select_product', 'model' => $model]) ?>
                </select>
            </div>
            
            <?php $img = $model->getImage(); ?>
            
            <img src="<?= $img->getUrl('200x'); ?>" alt="<?= $model->name ?>">
            
            <?= $form->field($model, 'image')->fileInput() ?>

            <?= $form->field($model, 'vcode')->textInput(['maxlength' => true]) ?>

        </div>
        <div class="col-md-6">
            <div class="panel panel-info">
                <div class="panel-heading"><?= Yii::t('admin', 'Meta data') ?></div>
                <div class="panel-body">
                    <?= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?=
            $form->field($model, 'content')->widget(CKEditor::className(), [
                'editorOptions' => ElFinder::ckeditorOptions(['elfinder'], [/* Some CKEditor Options */
                    'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
                    'inline' => false,
                ]),
            ]);
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? Yii::t('admin', 'Create') : Yii::t('admin', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
