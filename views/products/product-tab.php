
			<div class="tabsslider   col-xs-12">
								<ul class="nav nav-tabs ">
										<li class="active"><a data-toggle="tab" href="#tab-1">Описание</a></li>
										
					
										<li class="item_nonactive"><a data-toggle="tab" href="#tab-review">Отзывы</a></li>
										
										<li class="item_nonactive"><a data-toggle="tab" href="#tab-4">Теги</a></li>
					
									</ul>
							
												<div class="tab-content  col-xs-12">
												<div id="tab-1" class="tab-pane fade active in">
							<div class="cpt_product_description ">
	<div>
		<p><?=$model['body']?></p>
	</div>
</div>
<!-- cpt_container_end -->						</div>
						
						
												<div id="tab-review" class="tab-pane fade">
							<form>
								<div id="review"></div>
								<h2 id="review-title">Написать обзор</h2>
																	<div class="contacts-form">
										<div class="form-group">
											<span class="icon icon-user"></span>
											<input type="text" name="name" class="form-control" value="Ваше имя" onblur="if (this.value == '') {this.value = 'Ваше имя';}" onfocus="if(this.value == 'Ваше имя') {this.value = '';}">
										</div>
										<div class="form-group">
											<span class="icon icon-bubbles-2"></span>
											<textarea class="form-control" name="text" onblur="if (this.value == '') {this.value = 'Ваш обзор';}" onfocus="if(this.value == 'Ваш обзор') {this.value = '';}">Ваш обзор</textarea>
										</div>
										<span style="font-size: 11px;"><span class="text-danger">Заметка:</span> HTML не поддерживается!</span>
										<br />
										<br />
										<b>Рейтинг</b> <span>Плохо</span>&nbsp;
										<input type="radio" name="rating" value="1" />
										&nbsp;
										<input type="radio" name="rating" value="2" />
										&nbsp;
										<input type="radio" name="rating" value="3" />
										&nbsp;
										<input type="radio" name="rating" value="4" />
										&nbsp;
										<input type="radio" name="rating" value="5" />
										&nbsp;<span>Хорошо</span><br />
										<br />
																		<div class="buttons clearfix">
									  <div class="pull-right">
										<button type="button" id="button-review" data-loading-text="Loading..." class="btn btn-primary">Продолжить</button>
									  </div>
									</div>
																		</div>
							</form>

						</div>
						
												<div id="tab-4" class="tab-pane fade">
																					<a href="/"><?=$model['meta_keywords']?></a>
																				</div>
						
						
					</div>

			

		  </div><!-- End Tabs Slider -->
