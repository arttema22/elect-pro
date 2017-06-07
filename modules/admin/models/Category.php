<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "{{%category}}".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property string $name
 * @property string $keywords
 * @property string $description
 * @property string $active
 * @property integer $col
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%category}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id', 'col'], 'integer'],
            [['name'], 'required'],
            [['active'], 'string'],
            [['name', 'keywords', 'description'], 'string', 'max' => 255],
        ];
    }

    public function getCategory() {
        return $this->hasOne(Category::className(), ['id' => 'parent_id']);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('admin', 'ID'),
            'parent_id' => Yii::t('admin', 'Parent ID'),
            'name' => Yii::t('admin', 'Name'),
            'keywords' => Yii::t('admin', 'Keywords'),
            'description' => Yii::t('admin', 'Description'),
            'active' => Yii::t('admin', 'Active'),
            'col' => Yii::t('admin', 'Column'),
        ];
    }
}
