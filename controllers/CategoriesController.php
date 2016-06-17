<?php

namespace app\controllers;

use Yii;
use app\models\Categories;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\SqlDataProvider;



use app\models\ProductsCategories;
use yii\helpers\ArrayHelper;
use app\models\Products;

/**
 * CategoriesController implements the CRUD actions for Categories model.
 */
class CategoriesController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Categories models.
     * @return mixed
     */

    public function actionSort($alias='mobilnye-telefony', $path=10, $order = 'DESC', $sort = 'price')
    {
     //  print_r($_POST);
        /*
order
ASC
path
25
sort
price
        */
/*

        $cat =  Categories::find()->where(['url'=>$alias])->one();
        $prodcat =  ProductsCategories::find()->where(['category_id' => $cat->id])->asArray()->all();
        $product =  ArrayHelper::getColumn($prodcat, 'product_id');


        $dataProvider = new ActiveDataProvider([
            'query' => Products::find()->with('variants')->where(['id'=>$product]),
            'pagination' => [
                'pagesize' => $path,
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => $order,
                ],
            ]
        ]);*/

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
s_products.meta_description,
s_variants.`name` variant,
s_variants.price
FROM
s_categories
INNER JOIN s_products_categories ON s_categories.id = s_products_categories.category_id
INNER JOIN s_products ON s_products_categories.product_id = s_products.id
INNER JOIN s_variants ON s_variants.product_id = s_products.id
WHERE
s_categories.url =:url
ORDER BY
'.$sort.'  '.$order,
            'params' => [':url' => $alias],
            'pagination' => [
                'pageSize' => $path,
            ],
        ]);


        return $this->render('/category/category', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Categories::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Categories model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Categories model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Categories();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Categories model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Categories model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Categories model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Categories the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Categories::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
