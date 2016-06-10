<?php

namespace app\controllers;
use Yii;

use yii\helpers\ArrayHelper;

use app\models\Products;
use app\models\Variants;
use app\models\Images;
use yii\widgets\ListView;
use yii\data\ActiveDataProvider;

class WishlistController extends \yii\web\Controller
{
    public function actionAdd()
	{
		//print_r($_POST); wish list

		$product_id = $_POST['product_id'];
		$amount = isset($_POST['quantity']) ? max(1, $_POST['quantity']) : 1;

		$session = Yii::$app->session;

		$wish_list = $session->get('wish_list') ? $session->get('wish_list') : [];

		if (isset($wish_list[$product_id])) {
			$amount = max(1, $amount + $wish_list[$product_id]);
		}

		$wish_list[$product_id] = $amount;

		$session->set('wish_list', $wish_list);
		$wish_list = $session->get('wish_list');
		$count = count($wish_list);

		$product = Products::findOne($product_id);
		$img = Images::find()->where(['product_id'=>$product->id,'position'=>0])->asArray()->one();
		//print_r($product);

		$item = [
				"success" => 'Вы должны <a href="/login">авторизоваться</a> или <a href="/register">создать акаунт</a> для сохранения <a href="/product/'.$product->url.'">'.$product->name.'</a> в Ваш <a href="/wishlist/">список избранного</a>!',
				"total" => "Отложено (".$count.")",
				"title" => "Товар добавлен в избранное",
				"thumb" => '<img src="/files/products/'.str_replace(".", ".200x200.", $img['filename']).'" alt="" />',
		];

		return json_encode($item);

	}
	
	public function actionInfo()
    {
		print_r($_POST);
	}

	public function actionRemove()
	{
		print_r($_POST);
	}

}
