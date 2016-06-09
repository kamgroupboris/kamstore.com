<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "s_variants".
 *
 * @property string $id
 * @property integer $product_id
 * @property string $sku
 * @property string $name
 * @property double $price
 * @property double $compare_price
 * @property integer $stock
 * @property integer $position
 * @property string $attachment
 * @property string $external_id
 */
class Variants extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 's_variants';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
        //    [['product_id', 'sku', 'name', 'price', 'position', 'attachment', 'external_id'], 'required'],
            [['product_id', 'sku', 'name', 'price', 'position', 'attachment', 'external_id'], 'safe'],
            [['product_id', 'stock', 'position'], 'integer'],
            [['price', 'compare_price'], 'number'],
            [['sku', 'name', 'attachment'], 'string', 'max' => 255],
            [['external_id'], 'string', 'max' => 36],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Product ID',
            'sku' => 'Sku',
            'name' => 'Name',
            'price' => 'Price',
            'compare_price' => 'Compare Price',
            'stock' => 'Stock',
            'position' => 'Position',
            'attachment' => 'Attachment',
            'external_id' => 'External ID',
        ];
    }
}
