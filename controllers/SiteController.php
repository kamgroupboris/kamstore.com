<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

use app\models\Articles;
use yii\web\NotFoundHttpException;

class SiteController extends Controller
{
    public $layout = "/kamstorePage";

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        $this->layout = "/kamstore";
        return $this->render('index');
    }


    public function actionArticles()
    {

        $dataProvider = new ActiveDataProvider([
            'query' => Articles::find()->where(['viseble' => 1]),
        ]);

        return $this->render('articles', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionArtikle($alias)
    {


        $model = Articles::find()->where(['url' => $alias])->one();


        if($model){
            return $this->render('/articles/view', [
                'model' => $model,
            ]);
        }else{
            //return $this->render('index');
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }



    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
          //  return $this->goHome();


         return $this->redirect(['/control/index']);
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    public function actionAbout()
    {
        return $this->render('about');
    }
}
