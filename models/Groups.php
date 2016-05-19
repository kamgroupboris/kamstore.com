<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "s_groups".
 *
 * @property integer $id
 * @property string $name
 * @property double $discount
 */
class Groups extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 's_groups';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['discount'], 'number'],
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
            'discount' => 'Discount',
        ];
    }
}
