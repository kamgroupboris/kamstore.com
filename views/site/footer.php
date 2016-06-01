<?
		use yii\bootstrap\Modal;
		use yii\helpers\Html;
		use yii\bootstrap\ActiveForm;
		use yii\captcha\Captcha;
		use app\models\ContactForm;
		use app\models\Newsletter;
		use yii\widgets\MaskedInput;
		use app\models\Callback;
		use app\models\AnalysSite;
		use app\models\WriteUs;

		use yii\bootstrap\Nav;
		use yii\bootstrap\NavBar;
		use app\models\Menu;
?>
<footer>
	<div class="container">
		<div class="h  mtt20">
			<P class="tt5">О КОМПАНИИ</P>
			<ul class="mtt30 tt3">

			<li>
					<a href="">Новости компании</a>
					<a href="">Вакансии</a>
					<a href="">Пресс-релизы</a>
					<a href="">Контактная информация</a>
					<a href="">Адреса магазинов</a>
					<a href="">Арендодателям</a>
					<a href="">Юридическая информация</a>
				</li>
				<ul class="social">
					<a href="" class=""><li class="li1 mr5"></li></a>
					<a href="" class=""><li class="li2 mr5"></li></a>
					<a href="" class=""><li class="li3 mr5"></li></a>
					<a href="" class=""><li class="li4 mr5"></li></a>
					<a href="" class=""><li class="li5 mr5"></li></a>
					<a href=""><li class="li6"></li></a>
				</ul>
			</ul>
		</div>
		<div class="h  mtt20">
			<P class="tt5">ПОМОЩЬ</P>
			<ul class="mtt30 tt3">
				<li>
					<a href="">Как сделать заказ на сайте</a>
					<a href="">Оплата</a>
					<a href="">Доставка</a>
					<a href="">Получение в магазине</a>
					<a href="">Возврат и обмен</a>
					<a href="">Правила работы</a>
					<a href="">Обратная связь</a>
				</li>
			</ul>
		</div>
		<div class=" h  mtt20">
			<P class="tt5">УСЛУГИ И СЕРВИС</P>
			<ul class="mtt30 tt3">
				<li>
					<a href="">Покупка в кредит</a>
					<a href="">Бонусная программа</a>
					<a href="">Настройка и установка</a>
					<a href="">Подарочные карты</a>
					<a href="">Программа Сервис+</a>
					<a href="">Страхование техники</a>
					<a href="">Программа Технотренд</a>
					<a href="">Гарантийное обслуживание</a>
					<a href="">Адреса сервисных центров</a>
				</li>
			</ul>
		</div>
		<div class="h  mtt20 param">
			<P class="tt5">ЕСТЬ ВОПРОСЫ? ЗВОНИТЕ</P>
			<p class="param2"><a style="color: #000" href="tel:8 (495) 236-65-65">8 (495) <b style="color: #00ae5d">236-65-65</b></a><br><b class="param3">Многоканальный</b></p>
			<p class="param2"><a style="color: #000" href="tel:8 (800) 555-55-55">8 (800) <b style="color: #00ae5d">555-55-55</b></a><br><b class="param3">Звонок по России бесплатный</b></p>
			<img src="../img/yandex_market.png" alt="">
		</div>
	</div>
</footer>
<?
$this->registerJs("
       $(window).load(function(){
            $('body').mCustomScrollbar({
                theme:'dark-thin'
            });
        });
    ");
?>