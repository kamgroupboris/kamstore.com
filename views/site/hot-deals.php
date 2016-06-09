<?
	use yii\widgets\ListView;
	use yii\data\ActiveDataProvider;
	use app\models\Products;
?>
<div class="module so-deals">
    	<h3 class="modtitle"><span>Новинки</span></h3>
            <div id="so_deals_9474802841465210850" class="so-deal modcontent products-list grid clearfix preset00-5 preset01-4 preset02-3 preset03-2 preset04-1 button-type1 style2">


            <?

                $dataProvider = new ActiveDataProvider([
                    'query' => Products::find()->orderBy('created')->limit(10),
                    'pagination' => false,
                ]);


                    echo ListView::widget([
                        'dataProvider' => $dataProvider,
                        'summary' => false,

                        'options' => [
                            'tag'=>'div',
                            'class' => 'extraslider-inner product-layout'
                        ],
                        'itemOptions' => [
                           'tag'=>false,
                        ],
                        'itemView' => 'product-thumb',
                    ]);

        ?>
		

    </div>
    <script type="text/javascript">
        //<![CDATA[
        jQuery(document).ready(function ($) {
            ;
            (function (element) {
                var $element = $(element),
                        $extraslider = $('.extraslider-inner', $element),
                        _delay = 500,
                        _duration = 800,
                        _effect = 'none';

                $extraslider.on('initialized.owl.carousel2', function () {
                    var $item_active = $('.owl2-item.active', $element);
                    if ($item_active.length > 1 && _effect != 'none') {
                        _getAnimate($item_active);
                    }
                    else {
                        var $item = $('.owl2-item', $element);
                        $item.css({'opacity': 1, 'filter': 'alpha(opacity = 100)'});
                    }
                    
                                            $('.owl2-controls', $element).insertBefore($extraslider);
						$('.owl2-dots', $element).insertAfter($('.owl2-prev', $element));
                    
            });

        $extraslider.owlCarousel2({
        margin: 25,
        slideBy: 4,
        autoplay: false,
        autoplayHoverPause: false,
        autoplayTimeout: 5000,
        autoplaySpeed: 1000,
        startPosition: 0,
        mouseDrag: false,
        touchDrag: false,
        autoWidth: false,
        responsive: {
            0: 	{ items: 1 } ,
            480: { items: 2 },
            768: { items: 3 },
            992: { items: 4 },
            1200: {items: 5}
        },
        dotClass: 'owl2-dot',
            dotsClass: 'owl2-dots',
        dots: false,
        dotsSpeed: 500,
        nav: true,
        loop: true,
        navSpeed: 500,
        navText: ['&#171;', '&#187;'],
        navClass: ['owl2-prev', 'owl2-next']

        });

        $extraslider.on('translate.owl.carousel2', function (e) {
            var $item_active = $('.owl2-item.active', $element);
            _UngetAnimate($item_active);
            _getAnimate($item_active);
        });

        $extraslider.on('translated.owl.carousel2', function (e) {
            var $item_active = $('.owl2-item.active', $element);
            var $item = $('.owl2-item', $element);

            _UngetAnimate($item);

            if ($item_active.length > 1 && _effect != 'none') {
                _getAnimate($item_active);
            } else {
                $item.css({'opacity': 1, 'filter': 'alpha(opacity = 100)'});
            }
        });

        function _getAnimate($el) {
            if (_effect == 'none') return;
            //if ($.browser.msie && parseInt($.browser.version, 10) <= 9) return;
            $extraslider.removeClass('extra-animate');
            $el.each(function (i) {
                var $_el = $(this);
                $(this).css({
                    '-webkit-animation': _effect + ' ' + _duration + "ms ease both",
                    '-moz-animation': _effect + ' ' + _duration + "ms ease both",
                    '-o-animation': _effect + ' ' + _duration + "ms ease both",
                    'animation': _effect + ' ' + _duration + "ms ease both",
                    '-webkit-animation-delay': +i * _delay + 'ms',
                    '-moz-animation-delay': +i * _delay + 'ms',
                    '-o-animation-delay': +i * _delay + 'ms',
                    'animation-delay': +i * _delay + 'ms',
                    'opacity': 1
                }).animate({
                    opacity: 1
                });

                if (i == $el.size() - 1) {
                    $extraslider.addClass("extra-animate");
                }
            });
        }

        function _UngetAnimate($el) {
            $el.each(function (i) {
                $(this).css({
                    'animation': '',
                    '-webkit-animation': '',
                    '-moz-animation': '',
                    '-o-animation': '',
                    'opacity': 1
                });
            });
        }
        data = new Date(2013, 10, 26, 12, 00, 00);
        function CountDown(date, id) {
            dateNow = new Date();
            amount = date.getTime() - dateNow.getTime();
            if (amount < 0 && $('#' + id).length) {
                $('.' + id).html("Now!");
            } else {
                days = 0;
                hours = 0;
                mins = 0;
                secs = 0;
                out = "";
                amount = Math.floor(amount / 1000);
                days = Math.floor(amount / 86400);
                amount = amount % 86400;
                hours = Math.floor(amount / 3600);
                amount = amount % 3600;
                mins = Math.floor(amount / 60);
                amount = amount % 60;
                secs = Math.floor(amount);
                if (days != 0) {
                    out += "<div class='time-item time-day'>" + "<div class='num-time'>" + days + "</div>" + " <div class='name-time'>" + ((days == 1) ? "Day" : "Days") + "</div>" + "</div> ";
                }
				if(days == 0 && hours != 0)
				{
					 out += "<div class='time-item time-hour' style='width:33.33%'>" + "<div class='num-time'>" + hours + "</div>" + " <div class='name-time'>" + ((hours == 1) ? "Hour" : "Hours") + "</div>" + "</div> ";
				}else if (hours != 0) {
                    out += "<div class='time-item time-hour'>" + "<div class='num-time'>" + hours + "</div>" + " <div class='name-time'>" + ((hours == 1) ? "Hour" : "Hours") + "</div>" + "</div> ";
                }
				if(days == 0 && hours != 0)
				{
					out += "<div class='time-item time-min' style='width:33.33%'>" + "<div class='num-time'>" + mins + "</div>" + " <div class='name-time'>" + ((mins == 1) ? "Min" : "Mins") + "</div>" + "</div> ";
					out += "<div class='time-item time-sec' style='width:33.33%'>" + "<div class='num-time'>" + secs + "</div>" + " <div class='name-time'>" + ((secs == 1) ? "Sec" : "Secs") + "</div>" + "</div> ";
					out = out.substr(0, out.length - 2);
				}else if(days == 0 && hours == 0)
				{
					out += "<div class='time-item time-min' style='width:50%'>" + "<div class='num-time'>" + mins + "</div>" + " <div class='name-time'>" + ((mins == 1) ? "Min" : "Mins") + "</div>" + "</div> ";
					out += "<div class='time-item time-sec' style='width:50%'>" + "<div class='num-time'>" + secs + "</div>" + " <div class='name-time'>" + ((secs == 1) ? "Sec" : "Secs") + "</div>" + "</div> ";
					out = out.substr(0, out.length - 2);
				}else{
					out += "<div class='time-item time-min'>" + "<div class='num-time'>" + mins + "</div>" + " <div class='name-time'>" + ((mins == 1) ? "Min" : "Mins") + "</div>" + "</div> ";
					out += "<div class='time-item time-sec'>" + "<div class='num-time'>" + secs + "</div>" + " <div class='name-time'>" + ((secs == 1) ? "Sec" : "Secs") + "</div>" + "</div> ";
					out = out.substr(0, out.length - 2);
				}
                
                $('.' + id).html(out);

                //setTimeout(function () {
                  //  CountDown(date, id);
                //}, 1000);
            }
        }
        if (listdeal1.length > 0) {
            for (var i = 0; i < listdeal1.length; i++) {
                var arr = listdeal1[i].split("|");
                if (arr[1].length) {
                    var data = new Date(arr[1]);
                    CountDown(data, arr[0]);
                }
            }
        }
        })('#so_deals_9474802841465210850');
        });
        //]]>
    </script>
    </div>