<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%nvtrd_category}}".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property string $name
 * @property string $keywords
 * @property string $description
 * @property string $active
 * @property string $col
 */
class Category extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return '{{%category}}';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['parent_id'], 'integer'],
            [['name'], 'required'],
            [['name', 'keywords', 'description', 'active', 'col'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'ID'),
            'parent_id' => Yii::t('app', 'Parent ID'),
            'name' => Yii::t('app', 'Name'),
            'keywords' => Yii::t('app', 'Keywords'),
            'description' => Yii::t('app', 'Description'),
            'active' => Yii::t('app', 'Active'),
            'col' => Yii::t('app', 'Columns'),
        ];
    }

    public function getProducts() {
        return $this->hasMany(Product::className(), ['category_id' => 'id']);
    }

    public static function getMenuItems() {
        $category = self::find()->orderBy('id')->where(['active' => '1'])->all();

        $items = [];
        array_push($items, ['label' => 'Главная', 'url' => ['/site/index'], 'params' => []]);

        foreach ($category as $var) {
            if ($var->parent_id == null) {
                array_push($items, [
                    'label' => $var->name,
                    'url' => ['/category/view', 'id' => $var->id],
                    'items' => self::getMenuChildrenItems($category, $var->id)
                ]);
            }
        }
//        array_push($items, ['label' => 'Контакты', 'url' => ['/site/contact'], 'params' => [],]);

        return $items;
    }

    private static function getMenuChildrenItems($category, $id) {
        $items = [];
        foreach ($category as $var) {
            if ($var->parent_id == $id) {
                array_push($items, [
                    'label' => $var->name,
                    'url' => ['/category/view', 'id' => $var->id],
                    'items' => self::getMenuChildrenItems($category, $var->id)
                ]);
            }
        }
        return $items;
    }

}
