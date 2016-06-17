<?php

namespace app\controllers;

use app\models\Categories;
use app\models\Pages;
use app\models\ProductsCategories;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\RegisterForm;
use app\models\ContactForm;
use app\models\Users;
use app\models\Products;
use app\models\Blog;
use yii\data\ActiveDataProvider;

use yii\data\SqlDataProvider;

use app\models\Articles;
use yii\web\NotFoundHttpException;

class SiteController extends Controller
{
    public $layout = "/page";

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

    public function actionCat($alias=null)
    {
        if($alias!=null) {
            $dataProvider = new SqlDataProvider([
                'sql' => 'SELECT
                s_products.id,
                s_products.url,
                s_products.`name`,
                s_products.brand_id,
                s_products.annotation,
                s_products.body,
                s_products.visible,
                s_products.position,
                s_products.meta_title,
                s_products.meta_keywords,
                s_products.meta_description
                FROM
                s_categories
                INNER JOIN s_products_categories ON s_categories.id = s_products_categories.category_id
                INNER JOIN s_products ON s_products_categories.product_id = s_products.id
                WHERE
                s_categories.url = :url',
                'params' => [':url' => $alias],
                'pagination' => [
                    'pageSize' => 10,
                ],
                'sort' => [
                    'defaultOrder' => [
                       // 'id' => SORT_DESC,
                    ],
                ]
            ]);


            return $this->render('/products/category', [
                'dataProvider' => $dataProvider,
            ]);
        }else{
            return $this->render('/site/category-list');
        }

}


    public function actionCategory($alias=null)
    {
        if($alias!=null) {

          $cat =  Categories::find()->where(['url'=>$alias])->one();
            $prodcat =  ProductsCategories::find()->where(['category_id' => $cat->id])->asArray()->all();
              $product =  ArrayHelper::getColumn($prodcat, 'product_id');


            $dataProvider = new ActiveDataProvider([
               'query' => Products::find()->with('variants')->where(['id'=>$product]),
                'pagination' => [
                    'pagesize' => 10,
                ],
                'sort' => [
                    'defaultOrder' => [
                         'id' => SORT_DESC,
                    ],
                ]
            ]);


        /*   $dataProvider = new SqlDataProvider([
                'sql' => 'SELECT
                s_products.id,
                s_products.url,
                s_products.`name`,
                s_products.brand_id,
                s_products.annotation,
                s_products.body,
                s_products.visible,
                s_products.position,
                s_products.meta_title,
                s_products.meta_keywords,
                s_products.meta_description
                FROM
                s_categories
                INNER JOIN s_products_categories ON s_categories.id = s_products_categories.category_id
                INNER JOIN s_products ON s_products_categories.product_id = s_products.id
                WHERE
                s_categories.url = :url',
                'params' => [':url' => $alias],
                'pagination' => [
                    'pageSize' => 10,
                ],
                'sort' => [
                    'defaultOrder' => [
                        // 'id' => SORT_DESC,
                    ],
                ]
            ]);*/


            return $this->render('/category/category', [
                'dataProvider' => $dataProvider,
            ]);
        }else{
            return $this->render('/category/category-list');
        }

    }

    public function actionProduct($alias=null, $id=null)
    {
        if($alias!=null) {
        $model = Products::find()->where(['url'=>$alias])->with(['productsCategories', 'relatedProducts', 'images', 'variants', 'brands'])->one();

      if($model){
        return $this->render('/products/product', [
          'model' => $model,
        ]); }else{
           return $this->render('index');
     //    throw new NotFoundHttpException('Запрашиваемая страница не существует.');
       }
    }else{

    }

    }

    public function actionQuickview($id)
    {
        $model = Products::find()->where(['id'=>$id])->with(['productsCategories', 'relatedProducts', 'images', 'variants', 'brands'])->one();
        return $this->renderAjax('/products/quickview', [
            'model' => $model,
        ]);

    }


    public function actionArticle($alias)
    {
        $model = Pages::find()->where(['url' => $alias])->one();
        if($model){
            return $this->render('/articles/article', [
                'model' => $model,
            ]);
        }else{
            //return $this->render('index');
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionNews($alias=null)
    {
        if($alias!=null){
            $model = Blog::find()->where(['url' => $alias])->one();
            if($model){
                return $this->render('/news/news', [
                    'model' => $model,
                ]);
            }else{
                //return $this->render('index');
                throw new NotFoundHttpException('The requested page does not exist.');
            }
        }else{
                $model = Blog::find()->all();
            return $this->render('/news/index', [
                'model' => $model,
            ]);
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
           // return $this->goBack();
            return $this->redirect(['/control/index']);
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionRegister()
    {
       /* if (!Yii::$app->user->isGuest) {
            //  return $this->goHome();


            return $this->redirect(['/control/index']);
        }*/

        $model = new Users();

        if ($model->load(Yii::$app->request->post())) {

            $model->setPassword($model->password);
            $model->generateAuthKey();
            $model->name = $model->username;

          if( $model->save(false)) {
              $userRole = Yii::$app->authManager->getRole('user');
              Yii::$app->authManager->assign($userRole,$model->id);
          }

            return $this->redirect(['/site/login']);
        }
        return $this->render('register', [
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
