<?php

namespace app\models;

use Yii;
use app\models\Products;

/**
 * This is the model class for table "s_products_categories".
 *
 * @property integer $product_id
 * @property integer $category_id
 * @property integer $position
 */
class ProductsCategories extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 's_products_categories';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
         //   [['product_id', 'category_id', 'position'], 'required'],
            [['product_id', 'category_id', 'position'], 'safe'],
            [['product_id', 'category_id', 'position'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'product_id' => 'Product ID',
            'category_id' => 'Category ID',
            'position' => 'Position',
        ];
    }

    public function getProducts()
    {
        return $this->hasMany(Products::className(), ['id' => 'product_id']);
    }
}
