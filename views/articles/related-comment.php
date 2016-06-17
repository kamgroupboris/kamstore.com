<div class="panel panel-default related-comment">

                                    
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <div id="comments" class="blog-comment-info">
        										 <div id="comment-list"></div>
        										<div id="comment-section"></div>
        										<h2 id="review-title">
        											Оставьте свой комментарий        											<i class="fa fa-times-circle fa-lg" id="reply-remove" style="display:none; cursor: pointer;" onclick="removeCommentId();"></i>
        										</h2>							
        										<input type="hidden" name="blog_article_reply_id" value="0" id="blog-reply-id"/>
        										
        										<div class="comment-left contacts-form row">
											 <div class="col-md-6">
												<b>Ваше имя:</b><br />
        											<input type="text" name="name" value="" class="form-control" /><br />
											 </div>
											 <div class="col-md-12">
												<b>Ваш комментарий:</b><br />
        										    <textarea name="text" class="form-control"></textarea>
        										    <span style="font-size: 11px;">Примечание: HTML не поддерживается!</span>
        										    <br /><br />
											 </div>
        											
        										 <div class="col-md-4">
												<b>Введите код в поле ниже:</b><br />
												    <input type="text" name="captcha" style="" value="" class="form-control" /><br />
												    <div class="form-group">
													   <img src="#" alt="" id="captcha" />
												    </div> 
											 </div>
        										  
        										</div>
        										<br />
        										<div class="text-left"><a id="button-comment" class="btn btn-info"><span>Отправить</span></a></div>			
                                            </div>    										
    									</div>
                                    </div>                                    
                                </div>  
								
								<script type="text/javascript">
		function removeCommentId() {
			$("#blog-reply-id").val(0);
			$("#reply-remove").css('display', 'none');
		}
	</script>
    
    <script type="text/javascript">
		$('#comment-list .pagination a').delegate('click', function() {
			$('#comment-list').fadeOut('slow');
				
			$('#comment-list').load(this.href);
			
			$('#comment-list').fadeIn('slow');
			
			return false;
		});			
		
		$('#comment-list').load('/article/comment?simple_blog_article_id=8');
		
	</script>	
    
    <script type="text/javascript">		
			$('#button-comment').bind('click', function() {
				$.ajax({
					type: 'POST',
					url: '/article/writeComment?blog_article_id=8',
					dataType: 'json',
					data: 'name=' + encodeURIComponent($('input[name=\'name\']').val()) + '&text=' + encodeURIComponent($('textarea[name=\'text\']').val()) + '&captcha=' + encodeURIComponent($('input[name=\'captcha\']').val()) + '&reply_id=' + encodeURIComponent($('input[name=\'blog_article_reply_id\']').val()),
					beforeSend: function() {
						$('.success, .warning').remove();
						$('#button-comment').attr('disabled', true);
						$('#review-title').after('<div class="attention"><img src="/catalog/view/theme/default/image/loading.gif" alt="" /> Wait</div>');
					},
					complete: function() {
						$('#button-comment').attr('disabled', false);
						$('.attention').remove();
					},
					success: function(data) {
					   
                        $('.alert').remove();
                        
						if (data['error']) {
							$('#review-title').after('<div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> ' + data['error'] + '</div>');
						}
						
						if (data['success']) {
							$('#review-title').after('<div class="alert alert-success"><i class="fa fa-check-circle"></i> ' + data['success'] + '</div>');
											
							$('input[name=\'name\']').val('');
							$('textarea[name=\'text\']').val('');
							$('input[name=\'captcha\']').val('');
							$("#blog-reply-id").val(0);
							$("#reply-remove").css('display', 'none');
							
							$('#comment-list').load('/article/comment?blog_article_id=8');							
						}
					}
				});
			});
		</script> 