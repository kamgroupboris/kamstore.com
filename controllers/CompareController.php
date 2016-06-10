<?php

namespace app\controllers;
use Yii;

use yii\helpers\ArrayHelper;

use app\models\Products;
use app\models\Variants;
use app\models\Images;
use yii\widgets\ListView;
use yii\data\ActiveDataProvider;

class CompareController extends \yii\web\Controller
{
    public function actionAdd()
	{
		//print_r($_POST); wish list

		$product_id = $_POST['product_id'];
		$amount = isset($_POST['quantity']) ? max(1, $_POST['quantity']) : 1;

		$session = Yii::$app->session;

		$compare_product = $session->get('compare_product') ? $session->get('compare_product') : [];

		if (isset($compare_product[$product_id])) {
			$amount = max(1, $amount + $compare_product[$product_id]);
		}

		$compare_product[$product_id] = $amount;

		$session->set('compare_product', $compare_product);
		$compare_product = $session->get('compare_product');
		$count = count($compare_product);

		$product = Products::findOne($product_id);
		$img = Images::find()->where(['product_id'=>$product->id,'position'=>0])->asArray()->one();
		//print_r($product);

		$item = [
				"success" => ' Вы добавили <a href="/product/'.$product->url.'">'.$product->name.'</a> в Ваш <a href="/compare/">лист для сравнения</a>!',
				"total" => "Продуктоы для сравнения (".$count.")",
				"title" => "Продукт добавлен для сравнения",
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
