<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "s_comments".
 *
 * @property string $id
 * @property string $date
 * @property string $ip
 * @property integer $object_id
 * @property string $name
 * @property string $text
 * @property string $type
 * @property integer $approved
 */
class Comments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 's_comments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date'], 'safe'],
            [['ip', 'name', 'text', 'type'], 'required'],
            [['object_id', 'approved'], 'integer'],
            [['text', 'type'], 'string'],
            [['ip'], 'string', 'max' => 20],
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
            'date' => 'Date',
            'ip' => 'Ip',
            'object_id' => 'Object ID',
            'name' => 'Name',
            'text' => 'Text',
            'type' => 'Type',
            'approved' => 'Approved',
        ];
    }
}
