<?php
/*
 *   Jamshidbek Akhlidinov
 *   13 - 10 2023 17:52:55
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\modules\admin\components\menu;

use app\widgets\MenuWidget;

class MainMenu
{
    public static function getMenu()
    {
        $controller_id = controller()->id;
        $module_id = controller()->module->id;
        return MenuWidget::widget([
            'options' => ['class' => 'sidebar-menu', 'data-widget' => 'tree'],
            'items' => [
                [
                    'label' => 'Menu Yii2',
                    'header' => true,
                    'options' => [
                        'class' => 'header'
                    ]
                ],
                [
                    'label' => translate("Users"),
                    'iconType' => 'fa',
                    'icon' => 'users',
                    'url' => ['user/index'],
                    'options' => [
                        'class' => $controller_id == 'user' ? 'active' : ''
                    ]
                ],
                [
                    'label' => translate("Specialists"),
                    'iconType' => 'fa',
                    'icon' => 'th-large ',
                    'url' => ['/specialist'],
                    'options' => [
                        'class' => $controller_id == 'specialist' ? 'active' : ''
                    ]
                ],
            ],
        ]);
    }

    public static function getDefaultMenu()
    {
        return MenuWidget::widget([
            'options' => ['class' => 'sidebar-menu', 'data-widget' => 'tree'],
            'items' => [
                ['label' => 'Menu Yii2', 'header' => true, 'options' => ['class' => 'header']],
                ['label' => 'Gii', 'iconType' => 'far', 'icon' => 'file-code', 'url' => ['/gii'], 'options' => ['class' => '']],
                ['label' => 'Debug', 'icon' => 'tachometer-alt', 'url' => ['/debug']],
                ['label' => 'Login', 'url' => ['site/login'], 'visible' => user()->isGuest],
                [
                    'label' => 'Some tools',
                    'icon' => 'share',
                    'url' => '#',
                    'items' => [
                        ['label' => 'Gii', 'iconType' => 'far', 'icon' => 'file-code', 'url' => ['/gii'],],
                        ['label' => 'Debug', 'icon' => 'tachometer-alt', 'url' => ['/debug'],],
                        [
                            'label' => 'Level One',
                            'iconType' => 'far',
                            'icon' => 'circle',
                            'url' => '#',
                            'items' => [
                                ['label' => 'Level Two', 'iconType' => 'far', 'icon' => 'dot-circle', 'url' => '#',],
                                [
                                    'label' => 'Level Two',
                                    'iconType' => 'far',
                                    'icon' => 'dot-circle',
                                    'url' => '#',
                                    'items' => [
                                        ['label' => 'Level Three', 'icon' => 'dot-circle', 'url' => '#',],
                                        ['label' => 'Level Three', 'icon' => 'dot-circle', 'url' => '#',],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ]);
    }
}