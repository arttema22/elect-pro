<?php
/* @var $this yii\web\View */

use mihaildev\elfinder\InputFile;
use mihaildev\elfinder\ElFinder;
use yii\web\JsExpression;
use yii\widgets\ActiveForm;
use app\modules\admin\models\Product;

$this->title = Yii::t('admin', 'Images');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">

    <?=
    InputFile::widget([
        'language' => 'ru',
        'controller' => 'elfinder', // вставляем название контроллера, по умолчанию равен elfinder
        'filter' => 'image', // фильтр файлов, можно задать массив фильтров https://github.com/Studio-42/elFinder/wiki/Client-configuration-options#wiki-onlyMimes
        'name' => 'myinput',
        'value' => '',
    ]);
    ?>

    <?php $form = ActiveForm::begin(); ?>
    <?php
    echo $form->field($model, 'image')->widget(InputFile::className(), [
        'language' => 'ru',
        'controller' => 'elfinder', // вставляем название контроллера, по умолчанию равен elfinder
        //'path' => 'image', // будет открыта папка из настроек контроллера с добавлением указанной под деритории 
        'filter' => 'image', // фильтр файлов, можно задать массив фильтров https://github.com/Studio-42/elFinder/wiki/Client-configuration-options#wiki-onlyMimes
        'template' => '<div class="input-group">{input}<span class="input-group-btn">{button}</span></div>',
        'options' => ['class' => 'form-control'],
        'buttonOptions' => ['class' => 'btn btn-default'],
        'multiple' => false       // возможность выбора нескольких файлов
    ]);
    ?>
    <?php ActiveForm::end(); ?>

    <div>
        <?php
        echo ElFinder::widget([
            //'language' => 'ru',
            'controller' => 'elfinder', // вставляем название контроллера, по умолчанию равен elfinder
            //'path' => 'image', // будет открыта папка из настроек контроллера с добавлением указанной под деритории 
            'filter' => 'image', // фильтр файлов, можно задать массив фильтров https://github.com/Studio-42/elFinder/wiki/Client-configuration-options#wiki-onlyMimes
            'callbackFunction' => new JsExpression('function(file, id){}') // id - id виджета
        ]);
        ?>
    </div>
</div>