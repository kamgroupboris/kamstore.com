<?php

namespace app\models;

use Yii;

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
}
