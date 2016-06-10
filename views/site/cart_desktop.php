<?
use app\models\Products;
use app\models\Variants;
use yii\widgets\ListView;
use yii\data\ActiveDataProvider;
?>
<?
			$session = Yii::$app->session;
			$shopping_cart = $session->get('shopping_cart')?$session->get('shopping_cart'):[];
			$keys = array_keys($shopping_cart);
			$count = array_sum ($shopping_cart);
?>
<?
	$total=[];
	foreach($shopping_cart as $k => $v ){
		$variant = Variants::find()->where(['product_id' => $k])->asArray()->one();
		//print_r($variant);
		$total[]=$variant['price']*$v;
	}
	$cost = array_sum ($total);
?>
<div id="cart" class=" btn-group btn-shopping-cart">
	<h2 class="title">Корзина</h2>
	<a data-loading-text="Загрузка..." class="top_cart dropdown-toggle" data-toggle="dropdown">
		<div class="shopcart">		
			<p class="text-shopping-cart cart-total-full">
						<?=$count?> шт. - <?=$cost?> p.						
			</p>	
		</div>


	</a>


	<ul class="tab-content content dropdown-menu pull-right shoppingcart-box" role="menu">
		<li>
			<div class="added_items"/>
		</li>
		<?
			$dataProvider = new ActiveDataProvider([
			'query' => Variants::find()->where(['id' => $keys])->with('product'), //Products::find()->where(['id' => $keys]),
			'pagination' => false,
			]);

			echo ListView::widget([
			'dataProvider' => $dataProvider,
			'emptyText' => 'Ваша корзина пуста!',
			'summary' => false,
			'options' => [
				'tag'=>false,
			],
			'itemOptions' => [
				'tag'=>false,
			],
			'itemView' => '/cart/added_items',
			]);
		?>

		<li>
			<div>
				<table class="table table-bordered">
					<tbody>
					<tr>
						<td class="text-left" style="white-space: nowrap;">
							<strong>Промежуточный Итог</strong>
						</td>
						<td class="text-right"><?=$cost?> p.</td>
					</tr>
					<tr>
						<td class="text-left" style="white-space: nowrap;">
							<strong>Итог</strong>
						</td>
						<td class="text-right"><?=$cost?> p.</td>
					</tr>
					</tbody>
				</table>
				<p class="text-center">
					<a class="btn view-cart" href="/cart/">
						
						В корзину
					</a>
					<a class="btn btn-mega checkout-cart" href="/checkout/">
					
						Оформить
					</a>
				</p>
			</div>
		</li>

	</ul>
</div>
<!--//cart-->