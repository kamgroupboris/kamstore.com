<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%menu_link}}".
 *
 * @property integer $id
 * @property string $label
 * @property string $url
 * @property string $type_menu
 * @property integer $active
 * @property integer $parent_id
 */
class MenuLink extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%menu_link}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['label', 'type_menu'], 'required'],
            [['active','parent_id'], 'integer'],
            [['label', 'url'], 'string', 'max' => 156],
            [['type_menu'], 'string', 'max' => 25],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'label' => 'Название ссылки',
            'url' => 'Url',
            'type_menu' => 'Тип меню',
            'active' => 'Активность',
            'active' => 'Активность',
            'parent_id' => 'Родительская категория',
        ];
    }
}
