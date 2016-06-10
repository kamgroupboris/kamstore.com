<?
use app\models\Images;
use app\models\Variants;
use yii\web\Session;
?>
	<?
	$session = new Session;
	$session->open();
	$shop_item = $session->get('shopping_cart');
	
	$img1 = Images::find()->where(['product_id'=>$model['product_id'],'position'=>0])->asArray()->one();
	$variants1 = Variants::find()->where(['product_id'=>$model['id']])->asArray()->all();
	?>
	
	<li style="max-height: 200px;overflow-y: auto;">
	<table class="table table-striped">
		<tbody>
			<tr>
				<td class="text-center" width="70px">
					<a href="/product/<?=$model->product['url']?>">
						<img class="preview" title="<?=$model->name?>" alt="<?=$model->name?>" src="/files/products/<?= str_replace(".", ".200x200.",$img1['filename'])?>">
						</a>
					</td>
					<td class="text-left">
						<a class="cart_product_name" href="/product/<?=$model->product['url']?>"><?=$model->product['name'].' '.$model->name?></a>
					</td>
					<td class="text-center"> x<?=$shop_item[$model['id']]?> </td>
					<td class="text-center"> <?=$model->price?> ₽ </td>
					<td class="text-right">
						<a class="fa fa-edit" href="/product/<?=$model->product['url']?>"/>
					</td>
					<td class="text-right">
						<a class="fa fa-times fa-delete" onclick="cart.remove('<?=$model->id?>');"/>
					</td>
				</tr>
			</tbody>
		</table>
	</li>