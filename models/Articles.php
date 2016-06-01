<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%pages}}".
 *
 * @property integer $id
 * @property string $url
 * @property string $name
 * @property string $meta_title
 * @property string $meta_description
 * @property string $meta_keywords
 * @property string $body
 * @property integer $menu_id
 * @property integer $position
 * @property integer $visible
 * @property string $header
 */
class Articles extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%pages}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['meta_title', 'meta_description', 'meta_keywords', 'body', 'header'], 'required'],
            [['body'], 'string'],
            [['menu_id', 'position', 'visible'], 'integer'],
            [['url', 'name'], 'string', 'max' => 255],
            [['meta_title', 'meta_description', 'meta_keywords'], 'string', 'max' => 500],
            [['header'], 'string', 'max' => 1024],
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
            'name' => 'Name',
            'meta_title' => 'Meta Title',
            'meta_description' => 'Meta Description',
            'meta_keywords' => 'Meta Keywords',
            'body' => 'Body',
            'menu_id' => 'Menu ID',
            'position' => 'Position',
            'visible' => 'Visible',
            'header' => 'Header',
        ];
    }
}
