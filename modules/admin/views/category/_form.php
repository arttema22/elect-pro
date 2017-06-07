<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-form">

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

            <div class="form-group field-category-parent_id has-success">
                <label class="control-label" for="category-parent_id"><?= Yii::t('admin', 'Parent category') ?></label>
                <select id="category-parent_id" class="form-control" name="<?= Yii::t('admin', 'Parent category') ?>">
                    <option value="0"><?= Yii::t('admin', 'Root category') ?></option>
                    <?= app\components\CatalogWidget::widget(['tpl' => 'select', 'model' => $model]) ?>
                </select>
            </div>

            <?= $form->field($model, 'active')->checkbox([ '0', '1',], ['prompt' => '']) ?>

            <?= $form->field($model, 'col')->textInput() ?>

            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? Yii::t('admin', 'Create') : Yii::t('admin', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
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
    <?php ActiveForm::end(); ?>

</div>
