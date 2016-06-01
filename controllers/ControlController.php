<?php

namespace app\controllers;

use yii\filters\AccessControl;

class ControlController extends \yii\web\Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => [],
                'rules' => [
                    // разрешаем аутентифицированным пользователям
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    // всё остальное по умолчанию запрещено
                ],
            ],
        ];
    }

    public function actionIndex()
    {		
		return $this->render('profile');
    }

}
