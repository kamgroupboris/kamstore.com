<div class="blog-item">
    <div class="itemBlogImg col-md-4 col-sm-12">
        <div class="article-image">
            <a href="/news/<?=$model->url?>"><img src="/image/catalog/blog/1.jpg" alt="Ac tincidunt Suspendisse malesuada" /></a>
        </div>

    </div>
    <div class="itemBlogContent col-md-8 col-sm-12">
        <div class="article-title">
            <h4><a href="/news/<?=$model->url?>"><?=$model->name?></a><h4>
        </div>

        <div class="article-sub-title">

            <!-- <span class="article-author">Admin</span> -->
        							<span class="article-date">

                                         <?$date = new DateTime($model->date);?>
								    								    <i class="fa fa-calendar"></i><?=$date->format('Y m d')?>							</span>

        </div>


        <div class="article-description"><?=$model->annotation?> </div>

        <div class="blog-meta">
            <!--<span class="comment_count"><a href="index.php@route=simple_blog%252Farticle%252Fview&amp;simple_blog_article_id=8.html#comment-section">5 Comment(s)</a></span>-->

            <span class="author"><span>Опубликованно </span>Кам Store</span>

        </div>

        <!-- <div align="right">
           <a class="btn btn-success btn-large" href=""><b></b></a>
        </div> -->


    </div>







</div>