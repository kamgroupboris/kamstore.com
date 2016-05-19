<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "s_brands".
 *
 * @property integer $id
 * @property string $name
 * @property string $url
 * @property string $meta_title
 * @property string $meta_keywords
 * @property string $meta_description
 * @property string $description
 * @property string $image
 */
class Brands extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 's_brands';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['meta_title', 'meta_keywords', 'meta_description', 'description', 'image'], 'required'],
            [['description'], 'string'],
            [['name', 'url', 'image'], 'string', 'max' => 255],
            [['meta_title', 'meta_keywords', 'meta_description'], 'string', 'max' => 500],
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
            'url' => 'Url',
            'meta_title' => 'Meta Title',
            'meta_keywords' => 'Meta Keywords',
            'meta_description' => 'Meta Description',
            'description' => 'Description',
            'image' => 'Image',
        ];
    }
}
