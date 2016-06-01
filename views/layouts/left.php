<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
		
		        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
					['label' => 'Меню', 'options' => ['class' => 'header']],				
					
					['label' => 'Товары', 'icon' => 'fa fa-file-code-o', 'url' => ['/items/index']],
					['label' => 'Страницы', 'icon' => 'fa fa-file-code-o', 'url' => ['/pages/index']],
					['label' => 'Блог', 'icon' => 'fa fa-file-code-o', 'url' => ['/blog/index']],
                    ['label' => 'Меню', 'icon' => 'fa fa-file-code-o', 'url' => ['/menu-link/index']],

                    ['label' => 'Коментарии', 'icon' => 'fa fa-file-code-o', 'url' => ['/comments/index']],
					['label' => 'Обратная связь', 'icon' => 'fa fa-file-code-o', 'url' => ['/feedbacks/index']],
					
					['label' => 'Заказы', 'icon' => 'fa fa-file-code-o', 'url' => ['/orders/index']],
					
					['label' => 'Бренды', 'icon' => 'fa fa-file-code-o', 'url' => ['/brands/index']],
					['label' => 'Категории', 'icon' => 'fa fa-file-code-o', 'url' => ['/categories/index']],
					['label' => 'Свойства', 'icon' => 'fa fa-file-code-o', 'url' => ['/features/index']],
					
					[
                        'label' => 'Пользователи',
                        'icon' => 'fa fa-share',
                        'url' => '#',
                        'items' => [
							['label' => 'Пользователи', 'icon' => 'fa fa-file-code-o', 'url' => ['/users/index']],
							['label' => 'Группы', 'icon' => 'fa fa-file-code-o', 'url' => ['/groups/index']],
                        ],
                    ],
					
					[
                        'label' => 'Продукты',
                        'icon' => 'fa fa-share',
                        'url' => '#',
                        'items' => [
							['label' => 'Продукты', 'icon' => 'fa fa-file-code-o', 'url' => ['/products/index']],
							['label' => 'Вариат Продукта', 'icon' => 'fa fa-file-code-o', 'url' => ['/variants/index']],
							['label' => 'Свойства Продукта', 'icon' => 'fa fa-file-code-o', 'url' => ['/options/index']],
                        ],
                    ],

					[
                        'label' => 'Настройки',
                        'icon' => 'fa fa-share',
                        'url' => '#',
                        'items' => [							
							['label' => 'Купоны', 'icon' => 'fa fa-file-code-o', 'url' => ['/coupons/index']],
							['label' => 'Валюта', 'icon' => 'fa fa-file-code-o', 'url' => ['/currencies/index']],
							['label' => 'Доставка', 'icon' => 'fa fa-file-code-o', 'url' => ['/delivery/index']],
							['label' => 'Настройки сайта', 'icon' => 'fa fa-file-code-o', 'url' => ['/settings/index']],
                        ],
                    ],
                ],
            ]
        ) ?>
		

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => 'Menu Yii2', 'options' => ['class' => 'header']],
                    ['label' => 'Gii', 'icon' => 'fa fa-file-code-o', 'url' => ['/gii']],
                    ['label' => 'Debug', 'icon' => 'fa fa-dashboard', 'url' => ['/debug']],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    [
                        'label' => 'Same tools',
                        'icon' => 'fa fa-share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Gii', 'icon' => 'fa fa-file-code-o', 'url' => ['/gii'],],
                            ['label' => 'Debug', 'icon' => 'fa fa-dashboard', 'url' => ['/debug'],],
                            [
                                'label' => 'Level One',
                                'icon' => 'fa fa-circle-o',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Level Two', 'icon' => 'fa fa-circle-o', 'url' => '#',],
                                    [
                                        'label' => 'Level Two',
                                        'icon' => 'fa fa-circle-o',
                                        'url' => '#',
                                        'items' => [
                                            ['label' => 'Level Three', 'icon' => 'fa fa-circle-o', 'url' => '#',],
                                            ['label' => 'Level Three', 'icon' => 'fa fa-circle-o', 'url' => '#',],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ]
        ) ?>

    </section>

</aside>
