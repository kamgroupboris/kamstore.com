<?php

namespace app\models;

use Yii;

use \app\models\Options;

/**
 * This is the model class for table "s_features".
 *
 * @property integer $id
 * @property string $name
 * @property integer $position
 * @property integer $in_filter
 */
class Features extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 's_features';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'position', 'in_filter'], 'required'],
            [['position', 'in_filter'], 'integer'],
            [['name'], 'string', 'max' => 255],
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
            'position' => 'Position',
            'in_filter' => 'In Filter',
        ];
    }

 /*   public function getOptions()
    {
        return $this->hasOne(Options::className(), ['feature_id' => 'id']);
    }*/
}
