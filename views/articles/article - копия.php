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
                                
                <div class="row form-group">
                                            <div class="article-info">
    						<div class="article-title">
    							<h1><?=$model->meta_title?><h1>
    						</div>
                            
                            <div class="article-sub-title">
    							<span class="article-author"><a href="index.php@route=simple_blog%252Fauthor&amp;simple_blog_author_id=1.html">Post by: Admin</a></span>
    							
    							<span class="bullet">&bull;</span>
							    							<span class="article-date">Created Date: Mon, Mar 28, 2016</span>
    							
    							    								<span class="bullet">&bull;</span>
    								<span class="article-comment">5  Comment(s)</span>
    								
    							
    												
    						</div>
                            
                                							    								<div class="article-image">
    									<img src="../image/catalog/blog/1.jpg" alt="Ac tincidunt Suspendisse malesuada" height="500" />
    								</div>
    							    						                            
                                							<div class="article-description">
    								<div class="itemFullText"><?=$model->body?></div>    							</div>
    						                            
                                                        
                                                        
                              <?=$this->render('/articles/related-comment');?>                          
                            
                                                                                                                    
                                                            
                                                                  
                                                        
                        </div>
                                    </div>
                
                


            </div>
            
                    </div>        
    </div>


