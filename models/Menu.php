<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "s_menu".
 *
 * @property integer $id
 * @property string $name
 * @property integer $position
 */
class Menu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 's_menu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'position'], 'required'],
            [['id', 'position'], 'integer'],
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
            'position' => 'Position',
        ];
    }
}
