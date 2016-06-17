<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="ru">
<head>
<meta charset="utf-8"/>
</head>
<body>
<p>Имя отправителя: <?=$model->name?$model->name:'Пожелавший остаться неизвестным';?>.</p>
<p>Почта: <?=$model->email?$model->email:'Неизвестна';?>.</p>
<p>Тема письма: <?=$model->subject?$model->subject:'Не указана';?>.</p>
<p>Пишет: <?=$model->body?$model->body:'...';?></p>
</body>
</html>
