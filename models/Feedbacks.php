<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "s_feedbacks".
 *
 * @property string $id
 * @property string $date
 * @property string $ip
 * @property string $name
 * @property string $email
 * @property string $message
 */
class Feedbacks extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 's_feedbacks';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date', 'ip', 'name', 'email', 'message'], 'required'],
            [['date'], 'safe'],
            [['message'], 'string'],
            [['ip'], 'string', 'max' => 20],
            [['name', 'email'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Date',
            'ip' => 'Ip',
            'name' => 'Name',
            'email' => 'Email',
            'message' => 'Message',
        ];
    }
}
