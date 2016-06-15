<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "s_purchases".
 *
 * @property integer $id
 * @property integer $order_id
 * @property integer $product_id
 * @property integer $variant_id
 * @property string $product_name
 * @property string $variant_name
 * @property double $price
 * @property integer $amount
 * @property string $sku
 */
class Purchases extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 's_purchases';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id', 'product_id', 'variant_id', 'amount'], 'integer'],
          //  [['variant_name', 'sku'], 'required'],
		    [['variant_name', 'sku'], 'safe'],
            [['price'], 'number'],
            [['product_name', 'variant_name', 'sku'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_id' => 'Order ID',
            'product_id' => 'Product ID',
            'variant_id' => 'Variant ID',
            'product_name' => 'Product Name',
            'variant_name' => 'Variant Name',
            'price' => 'Price',
            'amount' => 'Amount',
            'sku' => 'Sku',
        ];
    }
}
