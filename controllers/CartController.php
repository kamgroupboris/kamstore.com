<?php

namespace app\controllers;
use Yii;

use yii\helpers\ArrayHelper;

use app\models\Products;
use app\models\Orders;
use app\models\Variants;
use app\models\Images;
use yii\widgets\ListView;
use yii\data\ActiveDataProvider;

class CartController extends \yii\web\Controller
{


	public $layout = "/page";


	public function actionIndex()
	{
		$dataProvider = new ActiveDataProvider([
				'query' => Orders::find(),
		]);

		return $this->render('index', [
				'dataProvider' => $dataProvider,
		]);
	}

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

		if ($model->load(Yii::$app->request->post()) && $model->save()) {
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

		if ($model->load(Yii::$app->request->post()) && $model->save()) {
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






    public function actionAdd()
	{

		$variant_id = $_POST['product_id'];
		$amount = isset($_POST['quantity']) ? max(1, $_POST['quantity']) : 1;

		$session = Yii::$app->session;

		$shopping_cart = $session->get('shopping_cart') ? $session->get('shopping_cart') : [];

		if (isset($shopping_cart[$variant_id])) {
			$amount = max(1, $amount + $shopping_cart[$variant_id]);
		}

		$shopping_cart[$variant_id] = $amount;

		$session->set('shopping_cart', $shopping_cart);
		//	$session->remove('shopping_cart');
		// print_r($shopping_cart);
		//$product = Products::find()->select('name, url')->where(['id' => $variant_id])->asArray()->one();



		$variant = Variants::find()->where(['id' => $variant_id])->with('product')->asArray()->one();
		$img = Images::find()->where(['product_id' => $variant['product']['id'], 'position' => 0])->asArray()->one();

	//	print_r($variant);
		$shopping_cart = $session->get('shopping_cart');
		$count = array_sum ($shopping_cart);

		$item = [
				"title" => "Товар добавлен в корзину",
				"thumb" => '<img class="img-responsive" alt="'.$variant['product']['name'].'" src="/files/products/' . str_replace(".", ".200x200.", $img['filename']) . '">',
				"success" => '<a href="/product/'.$variant['product']['url'].'">'.$variant['product']['name'].'</a> добавлен <a href="/cart/"> в корзину</a>!',
				"total" => "1",
				"text_total" => $variant['price']." p.",
				"text_items_full" => $count." шт. - ".$variant['price']." p.",
		];

		return json_encode($item);

	}


	public function actionEdit()
	{
	//	print('<pre>');
	//	print_r($_POST);['quantity']
		if(isset($_POST['quantity'])){
			$session = Yii::$app->session;
			$session->set('shopping_cart', $_POST['quantity']);
		}
	//	$model = new Orders();
		return $this->renderAjax('/checkout/cart', [
			//	'model' => $model,
		]);
	}

	
	public function actionInfo()
    {
	echo '
		<li>
			<div class="added_items"/>
		</li>';
	
	
        $session = Yii::$app->session;		
		$shopping_cart = $session->get('shopping_cart')?$session->get('shopping_cart'):[];
		$keys = array_keys($shopping_cart);

		$total=[];
		foreach($shopping_cart as $k => $v ){
			$variant = Variants::find()->where(['id' => $k])->asArray()->one();
			$total[]=$variant['price']*$v;
		}
		$cost = array_sum ($total);






		$dataProvider = new ActiveDataProvider([
			'query' => Variants::find()->where(['id' => $keys])->with('product'), //Products::find()->where(['id' => $keys]),
			'pagination' => false,
		]);
		 
		echo ListView::widget([
			'dataProvider' => $dataProvider,
			'summary' => false,

			'options' => [

			],
			'itemOptions' => [
			   'tag'=>false,
			],
			'itemView' => '/cart/added_items',
		]);
	

	
	echo'<li>
		<div>
			<table class="table table-bordered">
				<tbody>
					<tr>
						<td class="text-left" style="white-space: nowrap;">
							<strong>Промежуточный Итог</strong>
						</td>
						<td class="text-right">'.$cost.' p.</td>
					</tr>
					<tr>
						<td class="text-left" style="white-space: nowrap;">
							<strong>Итог</strong>
						</td>
						<td class="text-right">'.$cost.' p.</td>
					</tr>
				</tbody>
			</table>
			<p class="text-center">
				<a class="btn view-cart" href="/cart/">
					<i class="fa fa-shopping-cart"/>
		В корзину
				</a>
				<a class="btn btn-mega checkout-cart" href="/checkout/">
					<i class="fa fa-share"/>
		Оформить
				</a>
			</p>
		</div>
	</li>
';
	}

	public function actionRemove()
	{
		//print_r($_POST);
		$key = $_POST['key'];
		$session = Yii::$app->session;		
		$shopping_cart = $session->get('shopping_cart');
		ArrayHelper::remove($shopping_cart, $key);
		$session->set('shopping_cart', $shopping_cart);
		$count = array_sum ($shopping_cart);

		$total=[];
		foreach($shopping_cart as $k => $v ){
			$variant = Variants::find()->where(['product_id' => $k])->asArray()->one();
			$total[]=$variant['price']*$v;
		}
		$cost = array_sum ($total);

		$item = [
				"total" => "1",
				"text_total" => $cost." p.",
				"text_items_full" => $count." шт. - ".$cost." p.",
		];

		return json_encode($item);
		
//echo '{"total":"0","text_total":"$0.00","text_items_full":"0 item(s) - $0.00"}';

		

	}

	protected function findModel($id)
	{
		if (($model = Orders::findOne($id)) !== null) {
			return $model;
		} else {
			throw new NotFoundHttpException('The requested page does not exist.');
		}
	}

}
