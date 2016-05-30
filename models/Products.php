<?php

namespace app\models;

use Yii;
use \app\models\Images;

use yii\behaviors\TimestampBehavior;
use yii\db\Expression;


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
/*
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created',
                'value' => new Expression('NOW()'),
            ],
        ];
    }
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
            [['name'], 'required'],
            [['brand_id', 'visible', 'position', 'featured'], 'integer'],
            //  [['name', 'annotation', 'body', 'meta_title', 'meta_keywords', 'meta_description'], 'required'],
            [['name', 'annotation', 'body', 'meta_title', 'meta_keywords', 'meta_description','created'], 'safe'],
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
            'brand_id' => 'Бренд',
            'name' => 'Заголовок',
            'annotation' => 'Аннотация',
            'body' => 'Контент',
            'visible' => 'Видимость',//'Visible',
            'position' => 'Позиция',
            'meta_title' => 'Meta Title',
            'meta_keywords' => 'Meta Keywords',
            'meta_description' => 'Meta Description',
            'created' => 'Создано',
            'featured' => 'Связанные товары',
            'external_id' => 'Рекомендуемый',//'External ID',
        ];
    }


    public function getImages()
    {
        return $this->hasOne(Images::className(), ['product_id' => 'id']);
    }

}
