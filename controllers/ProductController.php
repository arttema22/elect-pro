<?php

namespace app\controllers;

use app\controllers\AppController;
use app\models\Product;
use yii\web\HttpException;

class ProductController extends AppController {

    public function actionView($id) {

        $product = Product::findOne($id);

        // error
        if (empty($product))
            throw new HttpException(404, 'Такого товара нет');

        //set metatags
        $this->setMetatag($product->name, $product->keywords, $product->description);

        return $this->render('view', compact('product'));
    }

}
