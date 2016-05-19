<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "s_labels".
 *
 * @property integer $id
 * @property string $name
 * @property string $color
 * @property integer $position
 */
class Labels extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 's_labels';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'color', 'position'], 'required'],
            [['position'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['color'], 'string', 'max' => 6],
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
            'color' => 'Color',
            'position' => 'Position',
        ];
    }
}
