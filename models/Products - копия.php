<?php

namespace app\models;

use Yii;


use yii\behaviors\TimestampBehavior;
use yii\db\Expression;




use app\models\Brands;
use app\models\RelatedProducts;
use app\models\Options;
use app\models\Features;
use app\models\Images;
use app\models\Categories;
use app\models\Item;
use app\models\ProductsCategories;
use app\models\Variants;






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

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created',
                'updatedAtAttribute' => 'update',
                'value' => new Expression('NOW()'),
            ],
        ];
    }

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
            [['name', 'annotation', 'body', 'meta_title', 'meta_keywords', 'meta_description'], 'safe'],
            [['annotation', 'body'], 'string'],
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
            'featured' => 'Рекомендуемый',
            'external_id' => 'Внешний',//'External ID',
        ];
    }


    public function getImages()
    {
        return $this->hasMany(Images::className(), ['product_id' => 'id']);
    }

    public function getBrands()
    {
        return $this->hasOne(Brands::className(), ['id' => 'brand_id']);
    }

    public function getProductsCategories()
    {
        return $this->hasMany(ProductsCategories::className(), ['product_id' => 'id']);
    }

    public function getRelatedProducts()
    {
        return $this->hasMany(RelatedProducts::className(), ['product_id' => 'id']);
    }

    public function getVariants()
    {
        return $this->hasMany(Variants::className(), ['product_id' => 'id']);
    }

//viaTable

    public function getImg()
    {
        return $this->hasMany(Images::className(), ['product_id' => 'id']);
    }

}
