<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "s_products".
 *
 * @property integer $id
 * @property string $url
 * @property integer $brand_id
 * @property string $name
 * @property string $annotation
 * @property string $body
 * @property integer $visible
 * @property integer $position
 * @property string $meta_title
 * @property string $meta_keywords
 * @property string $meta_description
 * @property string $created
 * @property integer $featured
 * @property string $external_id
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 's_products';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['brand_id', 'visible', 'position', 'featured'], 'integer'],
            [['name', 'annotation', 'body', 'meta_title', 'meta_keywords', 'meta_description'], 'required'],
            [['annotation', 'body'], 'string'],
            [['created'], 'safe'],
            [['url'], 'string', 'max' => 255],
            [['name', 'meta_title', 'meta_keywords', 'meta_description'], 'string', 'max' => 500],
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
            'url' => 'Url',
            'brand_id' => 'Brand ID',
            'name' => 'Name',
            'annotation' => 'Annotation',
            'body' => 'Body',
            'visible' => 'Visible',
            'position' => 'Position',
            'meta_title' => 'Meta Title',
            'meta_keywords' => 'Meta Keywords',
            'meta_description' => 'Meta Description',
            'created' => 'Created',
            'featured' => 'Featured',
            'external_id' => 'External ID',
        ];
    }
}
