<?


use yii\helpers\Html;
use yii\grid\GridView;

use yii\widgets\ListView;
use yii\data\ActiveDataProvider;
use app\models\Pages;
use yii\helpers\ArrayHelper;

$this->title = 'Статьи';
$this->params['breadcrumbs'][] = $this->title;
?>
<?=$this->render('/articles/sidebar-left');?>
<div id="content" class="col-md-9 col-sm-8">
    <div class="blog-header">
        <h2>Статьи</h2>
        <p><span style="font-size: 13px; line-height: 22px;">Последние новинки и обзоры.</span><br></p>			 </div>



        <?
        $dataProvider = new ActiveDataProvider([
            'query' => Pages::find(),
            'pagination' => [
                'pageSize' => 5,
            ],
        ]);
        echo ListView::widget([
            'dataProvider' => $dataProvider,
            'summary' => false,
            'emptyText'=>'Здесь ещё никто ничего не написал',
            'options' => [
                'tag'=>'div',
                'class' => 'blog-listitem'
            ],
            'itemOptions' => [
                'tag'=>false,
            ],
            'itemView' => '_blog-item',
        ]);

        ?>






</div>


