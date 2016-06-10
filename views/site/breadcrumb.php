	<div class="container">
		<ul class="breadcrumb">		
			<li><a href="/"><i class="fa fa-home"></i> Главная </a></li>
			<?if(isset($this->params['breadcrumbs'])):?><?//print_r($this->params['breadcrumbs']);?>
				<?foreach($this->params['breadcrumbs'] as $bread):?>
					<li><?//=isset($bread)?$bread:''?></li>
				<?endforeach;?>				
			<?endif;?>
			
		 </ul>
	</div>