<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "s_currencies".
 *
 * @property integer $id
 * @property string $name
 * @property string $sign
 * @property string $code
 * @property double $rate_from
 * @property double $rate_to
 * @property integer $cents
 * @property integer $position
 * @property integer $enabled
 */
class Currencies extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 's_currencies';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sign', 'code', 'position', 'enabled'], 'required'],
            [['rate_from', 'rate_to'], 'number'],
            [['cents', 'position', 'enabled'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['sign'], 'string', 'max' => 20],
            [['code'], 'string', 'max' => 3],
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
            'sign' => 'Sign',
            'code' => 'Code',
            'rate_from' => 'Rate From',
            'rate_to' => 'Rate To',
            'cents' => 'Cents',
            'position' => 'Position',
            'enabled' => 'Enabled',
        ];
    }
}
