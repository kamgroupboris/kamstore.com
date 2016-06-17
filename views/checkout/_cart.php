<?php


use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Purchases;
use app\models\Variants;
use app\models\Images;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;
use yii\widgets\Pjax;
use \yii\widgets\MaskedInput;

/* @var $this yii\web\View */
/* @var $model app\models\Purchases */
/* @var $form ActiveForm */



use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Корзина';
$this->params['breadcrumbs'][] = $this->title;
?>

<?
$session = Yii::$app->session;

$shopping_cart = $session->get('shopping_cart') ? $session->get('shopping_cart') : [];
$keys = array_keys($shopping_cart);

$query = Variants::find()->where(['id' => $keys])->with('product');
$provider = new ActiveDataProvider([
    'query' => $query,
]);


?>
 <h1><?=$this->title?></h1>


<?php Pjax::begin([
		'enableReplaceState'=>false,
		'enablePushState'=>false,
		'clientOptions'=>[
				'container'=>'x8',
		]
]); ?>

<?php $form = ActiveForm::begin([
		'id' => 'variants-form',
		'method' => 'post',
	// 'enableAjaxValidation' => false,
		'action'=>Url::to(['/cart/edit']),

		'options' => [
				'enctype' => 'multipart/form-data',
				'data-pjax'=>'#x9'
		]
]) ?>
<!--<form action="/cart/edit" method="post" enctype="multipart/form-data">-->
    <?= GridView::widget([
        'dataProvider' => $provider,
        'columns' => [
         //   ['class' => 'yii\grid\SerialColumn'],
		 [
            'label' => 'Изображение',
            'format' => 'raw',
			'contentOptions' =>['class' => 'text-center'],
            'value' => function($data){
				
			//	print_r($data->product_id);
              $image = Images::find()->where(['product_id'=>$data->product_id, 'position'=>0])->one();
				
                return Html::img(Url::toRoute('/files/products/'.str_replace('.','.35x35.',$image->filename)),[
                    'alt'=>'',
                    'class' => 'img-thumbnail'
                ]);
            },
        ],
		 [
			'attribute' => 'product.name',
			'format' => 'text',
			'label' => 'Наименование Товара',
		 ],[
			'attribute' => 'name',
			'format' => 'text',
			'label' => 'Модель',
		 ],[			
			'label' => 'Количество',
			'format' => 'raw',
			'contentOptions' =>['class' => 'text-center'],
            'value' => function($data) use ($shopping_cart){
                return '<div class="input-group btn-block" style="max-width: 150px;">
                    <input type="text" name="quantity['.$data->id.']" value="'.$shopping_cart[$data->id].'" size="1" class="form-control quaility" />
                    <span class="input-group-btn">
                    <button type="submit" data-toggle="tooltip" title="Обновить" class="btn btn-primary"><i class="fa fa-refresh"></i></button>
                    <button type="button" data-toggle="tooltip" title="Удалить" class="btn btn-danger" onclick="cart.remove('.$data->id.');"><i class="fa fa-times-circle"></i></button></span></div>'; 
            },
        ],[
			'attribute' => 'price',
			'format' => 'text',
			'label' => 'Цена за единицу',
			'contentOptions' =>['class' => 'text-right'],
		 ],[
			'label' => 'Всего',
			'format' => 'text',
			'contentOptions' =>['class' => 'text-right'],
			'value' => function($data) use ($shopping_cart, &$total){

				$item_total  = $shopping_cart[$data->id]*$data->price;
				$total[$data->id] = $item_total;
				return $item_total.' ₽';
			},
		 ],
		 
		 ],
    ]); ?>
<?php ActiveForm::end(); ?>
<?Pjax::end();?>

	<?//print_r($total);
$cost = array_sum ($total);
?>



       
   
      <div class="row">
        <div class="col-sm-4 col-sm-offset-8">
          <table class="table table-bordered">
                        <tr>
              <td class="text-right"><strong>Промежуточный итог:</strong></td>
              <td class="text-right"><?=$cost?> ₽</td>
            </tr>
                        <tr>
              <td class="text-right"><strong>Всего:</strong></td>
              <td class="text-right"><?=$cost?> ₽</td>
            </tr>
                      </table>
        </div>
      </div>
    


</div>


