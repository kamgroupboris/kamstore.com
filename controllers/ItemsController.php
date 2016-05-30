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
use app\models\Features;
use app\models\Images;
use app\models\Categories;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use app\models\Item;
use app\models\ProductsCategories;


use app\models\CategoriesFeatures;

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


    public function actionProductCreate($action=null)
    {
        //   print_r($_POST);
        $model = new Products();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //    return   true;
            //  return $this->redirect(['view', 'id' => $model->id]);
            $model = $this->findModel($model->id);
            echo   $this->renderAjax('_productcreate', [
                'model' => $model,// 'related' => $related,
            ]);
        } else {
            return   false;
            //    return $this->render('create', [                'model' => $model,            ]);
        }

    }

    /*
    SELECT *
    FROM `s_options`
    WHERE
    s_options.product_id = 50 AND
    s_options.feature_id = 7
     */

    public function actionOptionsCategory($action=null,$category=1,$id=null)
    {

        ProductsCategories::deleteAll(['product_id' => $id]);

        $catp =  json_decode($category);

        foreach($catp as $cat) {
            $model = new ProductsCategories();
            $model->product_id = $id;
            $model->category_id = $cat;
            $model->save();
        }


        if(is_array($catp)) {$category = implode(', ',(array)$catp);};

        echo $this->renderAjax('_optionsupdate', [
            'items' => $this->itemsCart ($category,$id),
        ]);
    }


    public function actionOptionsCreate($action=null,$id=null,$category=1)
    {

        $catp =  json_decode($category);
        if(is_array($catp)) {$category = implode(', ',(array)$catp);};

        if(isset($id) && $id!='') {
            foreach ($_POST['Item'] as $row) {

                if (isset($row['value']) && $row['value'] != '') {


                    $model = Options::find()->where(['product_id' => $row['product_id'], 'feature_id' => $row['feature_id']])->One();
                    if (!$model) {
                        $model = new Options();
                        $model->setAttributes($row);
                        $model->product_id = $id;
                    } else {
                        $model->value = $row['value'];
                        $model->product_id = $id;
                    }

                    $model->save();
                }
            }

            echo $this->renderAjax('_optionsupdate', [
                'items' => $this->itemsCart ($category, $id),
            ]);


        }else{

            echo $this->renderAjax('_optionsupdate', [
                'items' => $this->itemsCart ($category, $id),
            ]);

        }




    }


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

    public function itemsCart ($category=1, $product=8){


        $dataProvider = new SqlDataProvider([
            'sql' => "
SELECT *, CONCAT('$product') AS id
FROM
(SELECT
		s_categories_features.category_id,
		s_categories_features.feature_id,
		s_features.`name`
		FROM
		s_categories_features
		INNER JOIN s_features ON s_categories_features.feature_id = s_features.id
		WHERE
		s_categories_features.category_id IN ($category)) AS category
LEFT JOIN
(SELECT
		s_options.product_id,
		s_options.`value`,
		s_options.feature_id AS feature_idp
		FROM
		s_features
		INNER JOIN s_options ON s_options.product_id = s_features.id
		WHERE
		s_options.product_id = '$product') AS feature
ON category.feature_id = feature.feature_idp
GROUP BY category.feature_id
ORDER BY category.feature_id ASC"
        ]);
        $data = $dataProvider->getModels();
        if(!$data) $data = new Item();

        $items = [];
        foreach ($data as $row) {
            $item = new Item();
            $item->setAttributes($row);
            $items[] = $item;
        }

        return  $items;
    }


    public function actionCreate()
    {

        $items =  $this->itemsCart(1,null);

        $model = new Products();
        $image = new Images();


        $dataProvider = new ActiveDataProvider([
            'query' => CategoriesFeatures::find()
                ->with(['feature'])
                ->where(['category_id' => 5]),
        ]);


        //    $category = ArrayHelper::map(Categories::find()->all(), 'id', 'name');



        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {


            return $this->render('create', [
                'model' => $model,
                'dataProvider' => $dataProvider,
                'image' => $image,
                //        'category' => $category,
                'items' => $items,
                //      'brand' => $brand,
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

        //$items =  $this->itemsCart(1,8);

        $model = $this->findModel($id);
        $category = ProductsCategories::find()->where(['product_id'=>$id])->asArray()->all();


        if($category)
            $category = ArrayHelper::getColumn($category, 'category_id');
        else   $category = [1];
       // print_r($category);
      //  $catp = ArrayHelper::getColumn($category, 'category_id');
     //   if(is_array($catp)) {$category = implode(', ',(array)$catp);};

        $cat = implode(', ',(array)$category);

       // print_r($category);
        $items =  $this->itemsCart($cat ,$id);
        $image = new Images();


        $dataProvider = new ActiveDataProvider([
            'query' => CategoriesFeatures::find()
                ->with(['feature'])
                ->where(['category_id' => 5]),
        ]);


        //    $category = ArrayHelper::map(Categories::find()->all(), 'id', 'name');



        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {


            return $this->render('update', [
                'model' => $model,
                'dataProvider' => $dataProvider,
                'image' => $image,
                'category' => $category,
                'items' => $items,
                //      'brand' => $brand,
            ]);

        }
    }


    public function actionFeatureList($id, $q = null)
    {
        $query =  Options::find()
            ->select(['value'])
            ->where([
                'and',
                ['like','value', $q],
                ['feature_id' => $id]
            ] )
            ->distinct(true);
        $command = $query->createCommand();
        $data = $command->queryAll();


        $out = [];
        foreach ($data as $d) {
            $out[] = ['value' => $d['value']];
        }
        echo Json::encode($out);

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
