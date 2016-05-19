<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "s_orders_labels".
 *
 * @property integer $order_id
 * @property integer $label_id
 */
class OrdersLabels extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 's_orders_labels';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id', 'label_id'], 'required'],
            [['order_id', 'label_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'order_id' => 'Order ID',
            'label_id' => 'Label ID',
        ];
    }
}
