<?
use yii\widgets\ListView;
use yii\data\ActiveDataProvider;
use app\models\Categories;
?>
<?
	$this->title = 'Кам Стор.ру ';
	$this->registerMetaTag(['name' => 'keywords', 'content' => 'Кам Стор']);
	$this->registerMetaTag(['name' => 'description', 'content' => 'Кам Стор']);
?>


<div class="container">
  <div class="row">
	<div id="content" class="col-sm-12">
		 



		<?

		$dataProvider = new ActiveDataProvider([
				'query' => Categories::find(),
				'pagination' => false,
		]);


		echo ListView::widget([
				'dataProvider' => $dataProvider,
				'summary' => false,

				'options' => [
						'tag'=>'div',
						'class' => ''
				],
				'itemOptions' => [
						'tag'=>false,
				],
				'itemView' => '/site/category-slider',
		]);

		?>





    </div>
  </div>
</div>


