<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "s_delivery".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property double $free_from
 * @property double $price
 * @property integer $enabled
 * @property integer $position
 * @property integer $separate_payment
 */
class Delivery extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 's_delivery';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'description', 'free_from', 'price', 'position'], 'required'],
            [['description'], 'string'],
            [['free_from', 'price'], 'number'],
            [['enabled', 'position', 'separate_payment'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'free_from' => 'Free From',
            'price' => 'Price',
            'enabled' => 'Enabled',
            'position' => 'Position',
            'separate_payment' => 'Separate Payment',
        ];
    }
}
