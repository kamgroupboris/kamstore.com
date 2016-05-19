<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "s_users".
 *
 * @property integer $id
 * @property string $email
 * @property string $password
 * @property string $name
 * @property integer $group_id
 * @property integer $enabled
 * @property string $last_ip
 * @property string $created
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 's_users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email'], 'required'],
            [['group_id', 'enabled'], 'integer'],
            [['created'], 'safe'],
            [['email', 'password', 'name'], 'string', 'max' => 255],
            [['last_ip'], 'string', 'max' => 15],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'password' => 'Password',
            'name' => 'Name',
            'group_id' => 'Group ID',
            'enabled' => 'Enabled',
            'last_ip' => 'Last Ip',
            'created' => 'Created',
        ];
    }
}
