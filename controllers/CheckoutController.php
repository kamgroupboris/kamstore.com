<?php


namespace app\controllers;

use Yii;
use app\models\Orders;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Session;
use app\models\Purchases;
use app\models\Variants;

class CheckoutController extends \yii\web\Controller
{    public $layout = "/page";
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
     * Lists all Orders models.
     * @return mixed
     */
	 
	public function actionIndex()
    {
        $model = new Orders();

        if ($model->load(Yii::$app->request->post()) ) {


            $session = Yii::$app->session;

            $shopping_cart = $session->get('shopping_cart') ? $session->get('shopping_cart') : [];
            $keys = array_keys($shopping_cart);
            $query = Variants::find()->where(['id' => $keys])->with('product')->all();

            $total=[];

            foreach ($shopping_cart as $k => $v){
              $variant =  Variants::findOne($k);
                $total[$variant->id]  = $v*$variant->price;       }




			$model->ip = $_SERVER["REMOTE_ADDR"];

			$model->total_price = array_sum ($total);;
			$session = new Session;
			$session->open();			
			$model->url = $session->getId();
			$model->save();






        foreach($query as $purchases){
            $pur =  new Purchases();
            $pur->order_id = $model->id;
            $pur->product_id = $purchases->product->id;
            $pur->variant_id = $purchases->id;
            $pur->product_name = $purchases->product->name;
            $pur->variant_name = $purchases->name;
            $pur->price = $purchases->price;
            $pur->amount = $shopping_cart[$purchases->id];
            $pur->sku = $purchases->sku;
            $pur->save();

        }
            $session->remove('shopping_cart');

            Yii::$app->mailer->compose('@app/views/mail/callback',['model'=>$model])
                ->setFrom(Yii::$app->params['adminEmail'])
                ->setTo(Yii::$app->params['adminEmail'])
                ->setSubject('Заказ с сайта')
                ->send();


            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
	 
 /*   public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Orders::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }*/

    /**
     * Displays a single Orders model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Orders model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Orders();

        if ($model->load(Yii::$app->request->post()) ) {
			$model->ip = $_SERVER["REMOTE_ADDR"];

			$model->total_price = 89;	
			$session = new Session;
			$session->open();			
			$model->url = $session->getId();
			$model->save();


            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Orders model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

            Yii::$app->mailer->compose('@app/views/mail/callback',['model'=>$model])
            ->setFrom(Yii::$app->params['adminEmail'])
            ->setTo(Yii::$app->params['adminEmail'])
            ->setSubject('Заказ с сайта')
            ->send();

        if ($model->load(Yii::$app->request->post()) /*&& $model->save()*/) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Orders model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Orders model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Orders the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Orders::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
