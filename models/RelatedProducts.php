<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "s_related_products".
 *
 * @property integer $product_id
 * @property integer $related_id
 * @property integer $position
 */
class RelatedProducts extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 's_related_products';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
          //  [['product_id', 'related_id', 'position'], 'required'],
		    [['product_id', 'related_id', 'position'], 'safe'],
            [['product_id', 'related_id', 'position'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'product_id' => 'Product ID',
            'related_id' => 'Related ID',
            'position' => 'Position',
        ];
    }
}
