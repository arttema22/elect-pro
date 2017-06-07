<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('admin', 'Categories');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('admin', 'Create Category'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'rowOptions' => function ($model, $key, $index, $grid) {
            if (!$model->active) {
                return ['style' => 'background-color:#EEE;'];
            }
        },
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'name:html',
                    [
                        'attribute' => 'parent_id',
                        'value' => function($data) {
                            return $data->parent_id ? $data->category->name : Yii::t('admin', 'Root category');
                        },
                    ],
                    [
                        'attribute' => 'active',
                        'value' => function($data) {
                            return !$data->active ? '<span class="text-danger glyphicon glyphicon-remove"></span>' :
                                    '<span class="text-success glyphicon glyphicon-ok"></span>';
                        },
                        'format' => 'html',
                    ],
                    [
                        'attribute' => 'col',
                        'value' => function($data) {
                            return '<span class="badge">' . $data->col . '</span>';
                        },
                        'format' => 'html',
                    ],
                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]);
            ?>
</div>
