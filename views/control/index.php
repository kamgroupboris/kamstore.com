<?php
/* @var $this yii\web\View */
?>
<h1>Панел администрирования</h1>

<p>
	<code>
		<?
		 $dir    = $_SERVER['DOCUMENT_ROOT'].'/../controllers';
		
		$files = scandir($dir);
		
		print('<pre>');
		print_r($files);
		
		foreach($files as $f){
			$patch = str_replace('Controller.php','',$f);
			echo "['label' => '".$patch."', 'icon' => 'fa fa-file-code-o', 'url' => ['/".strtolower($patch)."']],"."\n";
		}

		?>
	</code>
</p>

	
	
	
