<?php

namespace app\models;

use Yii;

use \app\models\Features;
use yii\base\Model;
use \yii\db\ActiveRecord;

/**
 * This is the model class for table "s_options".
 *
 * @property integer $product_id
 * @property integer $feature_id
 * @property string $value
 */
class Options extends ActiveRecord //Model //\yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */


    public $id;

    public $name;

    public $title;

    public $description;

    public static function tableName()
    {
        return 's_options';
    }



    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
        //    [['product_id', 'feature_id', 'value'], 'required'],
        //    [['product_id', 'feature_id', 'value'], 'safe'],
            [['title', 'description', 'name', 'value', 'feature_id', 'product_id', 'id'], 'safe'],
            [['product_id', 'feature_id'], 'integer'],
            [['value'], 'string', 'max' => 1024],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'product_id' => 'Product ID',
            'feature_id' => 'Feature ID',
            'value' => 'Value',
        ];
    }

    public function getFeatures()
    {
        return $this->hasOne(Features::className(), ['id' => 'feature_id']);
    }


}
