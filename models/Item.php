<?php

/**
 * @link https://github.com/unclead/yii2-multiple-input
 * @copyright Copyright (c) 2014 unclead
 * @license https://github.com/unclead/yii2-multiple-input/blob/master/LICENSE.md
 */

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * Class Item
 * @package unclead\widgets\examples\models
 */
class Item extends Model
{
    public $id;

    public $title;

    public $description;

    public $feature_id;

    public $product_id;



    public $value;

    public $name;

    public $file;

    public $date;


    public function behaviors()
    {
        return [
            // you have to install https://github.com/vova07/yii2-fileapi-widget
            /*
            'uploadBehavior' => [
                'class' => \vova07\fileapi\behaviors\UploadBehavior::className(),
                'attributes' => [
                    'file' => [
                        'path' => Yii::getAlias('@webroot') . '/images/',
                        'tempPath' => Yii::getAlias('@webroot') . '/images/tmp/',
                        'url' => '/images/'
                    ],
                ]
            ]*/
        ];
    }

    public function rules()
    {
        return [
          //  [['title', 'description'], 'required'],
            [['title', 'description', 'name', 'value', 'feature_id', 'product_id'], 'safe'],
            [['title'], 'string', 'min' => 5, 'max' => 64],
            [['id', 'file'], 'safe']
        ];
    }


}