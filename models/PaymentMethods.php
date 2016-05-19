<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "s_payment_methods".
 *
 * @property integer $id
 * @property string $module
 * @property string $name
 * @property string $description
 * @property double $currency_id
 * @property string $settings
 * @property integer $enabled
 * @property integer $position
 */
class PaymentMethods extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 's_payment_methods';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['module', 'name', 'description', 'currency_id', 'settings', 'position'], 'required'],
            [['description', 'settings'], 'string'],
            [['currency_id'], 'number'],
            [['enabled', 'position'], 'integer'],
            [['module', 'name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'module' => 'Module',
            'name' => 'Name',
            'description' => 'Description',
            'currency_id' => 'Currency ID',
            'settings' => 'Settings',
            'enabled' => 'Enabled',
            'position' => 'Position',
        ];
    }
}
