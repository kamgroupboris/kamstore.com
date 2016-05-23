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
 * @property string $name_original
 * @property string $type_file
 */
class Images extends \yii\db\ActiveRecord
{

    public $imageFile;
    public $file_id;
    public $cat_id;
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
            [['name', 'position', 'type_file'], 'safe'],
            [['product_id', 'position'], 'integer'],
            [['name', 'filename', 'name_original'], 'string', 'max' => 255],
            [['type_file'], 'string', 'max' => 11],
            [['imageFile'], 'file'],

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
            'name_original' => 'Name Original',
            'type_file' => 'Type File',
        ];
    }
}
