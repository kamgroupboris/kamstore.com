<?php

namespace app\controllers;

use app\models\Brands;
use Yii;
use app\models\Products;
use yii\data\ActiveDataProvider;
use yii\data\SqlDataProvider;
use yii\data\ArrayDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Options;
use app\models\Images;
use app\models\Categories;
use yii\helpers\ArrayHelper;

/**
 * ItemsController implements the CRUD actions for Products model.
 */
class ItemsController extends Controller
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
     * Lists all Products models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Products::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Products model.
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
     * Creates a new Products model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Products();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Products model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
        //    return $this->redirect(['view', 'id' => $model->id]);
        //    return true;
            return $this->render('_product', [
                'model' => $model,
            ]);
        } else {
/*
              $dataProvider = new ActiveDataProvider([
                    'query' => Options::find()
                        ->where(['product_id' => $model->id])
                        ->with(['features']),
             ]);
            */

            $dataProvider = new SqlDataProvider([
                'sql' => 'SELECT
                        s_options.product_id,
                        s_options.feature_id,
                        s_options.`value`,
                        s_features.id,
                        s_features.`name`,
                        s_features.position,
                        s_features.in_filter
                    FROM
                    s_features
                    INNER JOIN s_options ON s_options.feature_id = s_features.id
                    WHERE
                    s_options.product_id = '.$model->id
            ]);

            $image = new Images();




                 $category = ArrayHelper::map(Categories::find()->all(), 'id', 'name');
                 $brand = ArrayHelper::map(Brands::find()->all(), 'id', 'name');



            return $this->render('update', [
                'model' => $model,
                'dataProvider' => $dataProvider,
                'image' => $image,
                'category' => $category,
                'brand' => $brand,
              ]);

        /*   $models =   Options::find()
                ->where(['product_id' => $model->id])
                ->with(['features'])
                ->asArray()
                ->all();
            print('<pre>');
            print_r($models);*/

        /*  foreach($models as $model) {
                echo $model->value;

                foreach($model->features as $item) {
                    echo $item->name;
                }
            }*/


        }
    }

    public function Options()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Options::find(),
        ]);

        return $this->render('options', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionImage()
    {
        $model = new Images();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                // form inputs are valid, do something here
                return;
            }
        }

        return $this->render('_image', [
            'model' => $model,
        ]);
    }


    /**
     * Deletes an existing Products model.
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
     * Finds the Products model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Products the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Products::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
