<?php

use yii\helpers\Html;
//use yii\widgets\DetailView;
use kartik\detail\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Product */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('admin', 'Products'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<!--<div class="product-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
<?= Html::a(Yii::t('admin', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
<?=
Html::a(Yii::t('admin', 'Delete'), ['delete', 'id' => $model->id], [
    'class' => 'btn btn-danger',
    'data' => [
        'confirm' => Yii::t('admin', 'Are you sure you want to delete this item?'),
        'method' => 'post',
    ],
])
?>
    </p>

<?php $img = $model->getImage(); ?>
    <div class="row">
        <div class="col-md-6">
<?=
DetailView::widget([
    'model' => $model,
    'attributes' => [
        'id',
        'name:html',
//        [
//            'attribute' => 'category_id',
//            'value' => $model->category->name,
//        ],
        'vcode',
        'content:html',
        'price',
        'quantity',
    ],
])
?>
        </div>
        <div class="col-md-6">
<?=
DetailView::widget([
    'model' => $model,
    'attributes' => [
        [
            'attribute' => 'image',
            'value' => "<img src='{$img->getUrl('200x')}'>",
            'format' => 'html',
        ],
        'keywords',
        'description',
    ],
])
?>
        </div>
        <div class="col-md-12">
<?=
DetailView::widget([
    'model' => $model,
    'attributes' => [
        'content:html',
    ],
])
?>
        </div>
    </div>
</div>-->

<?=
DetailView::widget([
    'model' => $model,
    'bootstrap' => true,
    //'condensed' => true,
    'hover' => true,
    'mode' => DetailView::MODE_VIEW,
    'panel' => [
        'heading' => $model->name,
        'type' => DetailView::TYPE_DEFAULT,
    ],
    'attributes' => [
        [
            'group' => true,
            'label' => 'SECTION 1: Identification Information',
            'rowOptions' => ['class' => 'info']
        ],
        [
            'columns' => [
                [
                    'attribute' => 'id',
                    'label' => 'Book #',
                    'displayOnly' => true,
                    'valueColOptions' => ['style' => 'width:30%']
                ],
                [
                    'attribute' => 'vcode',
                    'format' => 'raw',
                    'value' => '<kbd>' . $model->vcode . '</kbd>',
                    'valueColOptions' => ['style' => 'width:30%'],
                ],
            ],
        ],
        [
            'columns' => [
//                [
//                    'attribute' => 'category_id',
//                    'label' => 'Book #',
//                    'valueColOptions' => ['style' => 'width:30%'],
//                    'value' => $model->category->name,
//                ],
                [
                    'attribute' => 'vcode',
                    'format' => 'raw',
                    'value' => '<kbd>' . $model->vcode . '</kbd>',
                    'valueColOptions' => ['style' => 'width:30%'],
                ],
            ],
        ],
        [
            'group' => true,
            'label' => 'SECTION 2: Price / Valuation Amounts',
            'rowOptions' => ['class' => 'info'],
        //'groupOptions'=>['class'=>'text-center']
        ],
        'name',
        'name:html',
//        [
//            'attribute' => 'category_id',
//            'value' => $model->category->name,
//        ],
        'vcode',
        'content:html',
        'price',
        'quantity',
        
        [
            'attribute' => 'image',
            'value' => "<img src='{$img->getUrl('200x')}'>",
            'format' => 'html',
        ],
        'keywords',
        'description',
    ]
]);
?>