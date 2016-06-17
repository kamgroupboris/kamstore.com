<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="ru">
<head>
<meta charset="utf-8"/>
</head>
<body>
<p>Вас просит перезвонить: <?=isset($model->name)?$model->name:'Пожелавший остаться неизвестным';?>,</p>
<p>по номеру: <?=isset($model->phone)?$model->phone:'';?></p>
<?=isset($model->usluga)?'<p> Заказывает: '.$model->usluga.'</p>':'';?>
<p><?=isset($model->comment)?$model->comment:'';?></p>
<p><?=isset($model->email)?$model->email:'';?></p>
</body>
</html>
