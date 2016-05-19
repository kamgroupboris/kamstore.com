<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "s_coupons".
 *
 * @property string $id
 * @property string $code
 * @property string $expire
 * @property string $type
 * @property double $value
 * @property double $min_order_price
 * @property integer $single
 * @property integer $usages
 */
class Coupons extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 's_coupons';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code', 'value'], 'required'],
            [['expire'], 'safe'],
            [['type'], 'string'],
            [['value', 'min_order_price'], 'number'],
            [['single', 'usages'], 'integer'],
            [['code'], 'string', 'max' => 256],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'Code',
            'expire' => 'Expire',
            'type' => 'Type',
            'value' => 'Value',
            'min_order_price' => 'Min Order Price',
            'single' => 'Single',
            'usages' => 'Usages',
        ];
    }
}
