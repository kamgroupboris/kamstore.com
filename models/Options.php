<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "s_options".
 *
 * @property integer $product_id
 * @property integer $feature_id
 * @property string $value
 */
class Options extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 's_options';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'feature_id', 'value'], 'required'],
            [['product_id', 'feature_id'], 'integer'],
            [['value'], 'string', 'max' => 1024],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'product_id' => 'Product ID',
            'feature_id' => 'Feature ID',
            'value' => 'Value',
        ];
    }
}
