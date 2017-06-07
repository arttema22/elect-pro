<?php

namespace app\modules\admin\controllers;

use yii\web\Controller;
use app\modules\admin\models\Product;

class DefaultController extends Controller {

    public function actionIndex() {

        return $this->render('index');
    }

    public function actionImages() {

        $model = new Product();

        return $this->render('images', [
                    'model' => $model,
        ]);
    }

}
