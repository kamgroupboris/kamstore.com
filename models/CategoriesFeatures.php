<?php

namespace app\models;

use Yii;
use \app\models\Features;

/**
 * This is the model class for table "s_categories_features".
 *
 * @property integer $category_id
 * @property integer $feature_id
 */
class CategoriesFeatures extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 's_categories_features';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'feature_id'], 'required'],
            [['category_id', 'feature_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'category_id' => 'Category ID',
            'feature_id' => 'Feature ID',
        ];
    }

    public function getFeatures()
    {
        return $this->hasMany(Features::className(), ['id' => 'feature_id']);
    }

    public function getFeature()
    {
        return $this->hasOne(Features::className(), ['id' => 'feature_id']);
    }

    public function getOptions()
    {
        return $this->hasOne(Options::className(), ['feature_id' => 'feature_id']);
    }

}
