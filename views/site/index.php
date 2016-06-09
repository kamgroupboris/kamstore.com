<?
use yii\widgets\ListView;
use yii\data\ActiveDataProvider;
use app\models\Categories;
?>

<?=$this->render('/site/slider');?>

<div class="container">
  <div class="row">
	<div id="content" class="col-sm-12">
		 
		<?=$this->render('/site/mod-content');?>

<script>
//<![CDATA[
	var listdeal1 = [];
//]]>
</script>
		<?=$this->render('/site/hot-deals');?>


		<?

		$dataProvider = new ActiveDataProvider([
				'query' => Categories::find()->where(['parent_id'=>0])->limit(3),
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
				'itemView' => 'category-slider',
		]);

		?>


		<?//=$this->render('/site/category-slider');?>

		<?//=$this->render('/site/category-slider1');?>

		<?//=$this->render('/site/category-slider2');?>

		<?//=$this->render('/site/category-slider3');?>


    </div>
  </div>
</div>

<?=$this->render('/site/spotlight');?>

<?=$this->render('/site/spotlight2');?>

