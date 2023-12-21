<?php
/*
 *   Jamshidbek Akhlidinov
 *   13 - 10 2023 17:52:55
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\modules\admin\components\menu;

use app\enums\UserRoleEnum;
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
                    'label' => translate("Fanlar"),
                    'iconType' => 'fa',
                    'icon' => 'users',
                    'url' => ['/admin/subject/index'],
                    'options' => [
                        'class' => $controller_id == 'subject' ? 'active' : ''
                    ]
                ],
                [
                    'label' => translate("Teslar"),
                    'iconType' => 'fa',
                    'icon' => 'th-large ',
                    'url' => ['/admin/test/index'],
                    'options' => [
                        'class' => $controller_id == 'test' ? 'active' : ''
                    ]
                ],
                [
                    'label' => translate("Savollar"),
                    'iconType' => 'fa',
                    'icon' => 'th-large ',
                    'url' => ['/admin/question/index'],
                    'options' => [
                        'class' => $controller_id == 'question' ? 'active' : ''
                    ]
                ],
                [
                    'label' => translate("Tanlangan testlar"),
                    'iconType' => 'fa',
                    'icon' => 'th-large ',
                    'url' => ['/admin/selected-test/index'],
                    'options' => [
                        'class' => $controller_id == 'selected-test' ? 'active' : ''
                    ]
                ],
                [
                    'label' => translate("Testlar Tarixi"),
                    'iconType' => 'fa',
                    'icon' => 'th-large ',
                    'url' => ['/admin/history-of-solution/index'],
                    'options' => [
                        'class' => $controller_id == 'history-of-solution' ? 'active' : ''
                    ]
                ],
                [
                    'label' => translate("Rbac configuration"),
                    'iconType' => 'far',
                    'icon' => 'user',
                    'url' => ['#'],
                    'visible' => user()->can(UserRoleEnum::ADMINISTRATOR),
                    'options' => [
                        'class' => $module_id == 'rbac' ? 'active' : '',
                    ],
                    'items' => [
//                        [
//                            'label' => translate("Rules"),
//                            'iconType' => 'far',
//                            'icon' => 'file-code',
//                            'url' => ['/admin/rbac/auth-rule'],
//                            'options' => [
//                                'class' => $controller_id == 'auth-rule' ? 'active' : ''
//                            ]
//                        ],
                        [
                            'label' => translate("Items"),
                            'iconType' => 'far',
                            'icon' => 'file-code',
                            'url' => ['/admin/rbac/auth-item'],
                            'options' => [
                                'class' => $controller_id == 'auth-item' ? 'active' : ''
                            ]
                        ],
                        [
                            'label' => translate("Assignment"),
                            'iconType' => 'far',
                            'icon' => 'file-code',
                            'url' => ['/admin/rbac/auth-assignment'],
                            'options' => [
                                'class' => $controller_id == 'auth-assignment' ? 'active' : ''
                            ]
                        ],
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