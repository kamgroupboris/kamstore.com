<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "s_blog".
 *
 * @property integer $id
 * @property string $name
 * @property string $url
 * @property string $meta_title
 * @property string $meta_keywords
 * @property string $meta_description
 * @property string $annotation
 * @property string $text
 * @property integer $visible
 * @property string $date
 */
class Blog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 's_blog';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'url', 'meta_title', 'meta_keywords', 'meta_description', 'annotation', 'text'], 'required'],
            [['annotation', 'text'], 'string'],
            [['visible'], 'integer'],
            [['date'], 'safe'],
            [['name', 'meta_title', 'meta_keywords', 'meta_description'], 'string', 'max' => 500],
            [['url'], 'string', 'max' => 255],
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
            'annotation' => 'Annotation',
            'text' => 'Text',
            'visible' => 'Visible',
            'date' => 'Date',
        ];
    }
}
