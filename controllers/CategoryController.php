<?php

namespace app\controllers;

use Yii;
use app\controllers\AppController;
use app\models\Category;
use app\models\Product;
use yii\web\HttpException;

class CategoryController extends AppController {

    public function actionView($id) {

        $category = Category::findOne($id);

        $col = $category['col']; // количество столбцов

        // error
        if (empty($category))
            throw new HttpException(404, 'Такой категории нет');

        //set metatags
        $this->setMetatag($category->name, $category->keywords, $category->description);

        $products = Product::find()->where(['category_id' => $id])->all();

        return $this->render('view', compact('products', 'category', 'col'));
    }

    public function actionShow($id) {

        $category = Category::findOne($id);

        // error
        if (empty($category))
            throw new HttpException(404, 'Такого раздела нет');

        //set metatags
        $this->setMetatag($category->name, $category->keywords, $category->description);

        $show = Category::find()->where(['parent_id' => $id])->all();

        return $this->render('show', compact('show'));
    }

    public function actionSearch() {

        $q = trim(Yii::$app->request->get('q'));

        //set metatags
        $this->setMetatag('Поиск: ', $q);

        if (!$q)
            return $this->render('search', compact('q'));

        $query = Product::find()->where(['like', 'name', $q]);
        $products = $query->all();

        return $this->render('search', compact('products', 'q'));
    }

}
