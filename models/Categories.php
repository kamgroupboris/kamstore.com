<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "s_categories".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property string $name
 * @property string $meta_title
 * @property string $meta_keywords
 * @property string $meta_description
 * @property string $description
 * @property string $url
 * @property string $image
 * @property integer $position
 * @property integer $visible
 * @property string $external_id
 */
class Categories extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 's_categories';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id', 'position', 'visible'], 'integer'],
            [['meta_title', 'meta_keywords', 'meta_description', 'description', 'external_id'], 'required'],
            [['description'], 'string'],
            [['name', 'meta_title', 'meta_keywords', 'meta_description', 'url', 'image'], 'string', 'max' => 255],
            [['external_id'], 'string', 'max' => 36],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Parent ID',
            'name' => 'Name',
            'meta_title' => 'Meta Title',
            'meta_keywords' => 'Meta Keywords',
            'meta_description' => 'Meta Description',
            'description' => 'Description',
            'url' => 'Url',
            'image' => 'Image',
            'position' => 'Position',
            'visible' => 'Visible',
            'external_id' => 'External ID',
        ];
    }

}
