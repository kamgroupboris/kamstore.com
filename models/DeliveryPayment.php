<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "s_delivery_payment".
 *
 * @property integer $delivery_id
 * @property integer $payment_method_id
 */
class DeliveryPayment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 's_delivery_payment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['delivery_id', 'payment_method_id'], 'required'],
            [['delivery_id', 'payment_method_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'delivery_id' => 'Delivery ID',
            'payment_method_id' => 'Payment Method ID',
        ];
    }
}
