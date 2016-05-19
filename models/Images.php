<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "s_images".
 *
 * @property integer $id
 * @property string $name
 * @property integer $product_id
 * @property string $filename
 * @property integer $position
 */
class Images extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 's_images';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'position'], 'required'],
            [['product_id', 'position'], 'integer'],
            [['name', 'filename'], 'string', 'max' => 255],
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
            'product_id' => 'Product ID',
            'filename' => 'Filename',
            'position' => 'Position',
        ];
    }
}
