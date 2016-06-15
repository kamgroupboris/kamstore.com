<?php

namespace app\models;

use Yii;

use yii\behaviors\TimestampBehavior;
use \yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "s_orders".
 *
 * @property string $id
 * @property integer $delivery_id
 * @property double $delivery_price
 * @property integer $payment_method_id
 * @property integer $paid
 * @property string $payment_date
 * @property integer $closed
 * @property string $date
 * @property integer $user_id
 * @property string $name
 * @property string $address
 * @property string $phone
 * @property string $email
 * @property string $comment
 * @property integer $status
 * @property string $url
 * @property string $payment_details
 * @property string $ip
 * @property double $total_price
 * @property string $note
 * @property double $discount
 * @property double $coupon_discount
 * @property string $coupon_code
 * @property integer $separate_delivery
 * @property string $modified
 */
class Orders extends \yii\db\ActiveRecord
{
	
	
	
	public function behaviors()
{
    return [
        'timestamp' => [
            'class' => TimestampBehavior::className(),
            'attributes' => [
                ActiveRecord::EVENT_BEFORE_INSERT => 'date', //payment_date
                ActiveRecord::EVENT_BEFORE_UPDATE => 'modified',
            ],
            //'value' => function() { return date('U'); // unix timestamp 
			//	},
			 'value' => new Expression('CURRENT_TIMESTAMP()'),
		
        ],
    ];
}
	
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 's_orders';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['delivery_id', 'payment_method_id', 'paid', 'closed', 'user_id', 'status', 'separate_delivery'], 'integer'],
            [['delivery_price', 'total_price', 'discount', 'coupon_discount'], 'number'],
       //     [['payment_date', 'closed', 'email', 'comment', 'payment_details', 'ip', 'total_price', 'note', 'discount', 'coupon_discount', 'coupon_code'], 'required'],
	        [['payment_date', 'closed', 'email', 'comment', 'payment_details', 'ip', 'total_price', 'note', 'discount', 'coupon_discount', 'coupon_code'], 'safe'],
            [['payment_date', 'date', 'modified', 'url'], 'safe'],
            [['payment_details'], 'string'],
            [['name', 'address', 'phone', 'email', 'url', 'coupon_code'], 'string', 'max' => 255],
            [['comment', 'note'], 'string', 'max' => 1024],
            [['ip'], 'string', 'max' => 15],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'delivery_id' => 'Delivery ID',
            'delivery_price' => 'Delivery Price',
            'payment_method_id' => 'Payment Method ID',
            'paid' => 'Paid',
            'payment_date' => 'Payment Date',
            'closed' => 'Closed',
            'date' => 'Date',
            'user_id' => 'User ID',
            'name' => 'Имя, фамилия',
            'address' => 'Адрес доставки',
            'phone' => 'Телефон',
            'email' => 'Email',
            'comment' => 'Комментарий к заказу',
            'status' => 'Status',
            'url' => 'Url',
            'payment_details' => 'Payment Details',
            'ip' => 'Ip',
            'total_price' => 'Total Price',
            'note' => 'Note',
            'discount' => 'Discount',
            'coupon_discount' => 'Coupon Discount',
            'coupon_code' => 'Coupon Code',
            'separate_delivery' => 'Separate Delivery',
            'modified' => 'Modified',
        ];
    }
}
