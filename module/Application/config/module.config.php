<?php

namespace Application;

use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [
            'home' => [
                'type' => Literal::class,
                'options' => [
                    'route'    => '/',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'tutorial' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/tutorial[/:action]',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\IndexController::class => InvokableFactory::class,
        ],
    ],
    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => [
            'layout/layout'        => __DIR__ . '/../view/layout/layout.phtml',
            'tutorial/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404'            => __DIR__ . '/../view/error/404.phtml',
            'error/index'          => __DIR__ . '/../view/error/index.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
    'navigation' => [
        'top_navigation' => [
            'tutorial'      => [
                'label'     => 'Tutorial',
                'route'     => 'tutorial',
                'wrapClass' => 'nav-item',
                'class'     => 'nav-link',
            ],
            'blog' => [
                'label'     => 'Blog',
                'route'     => 'blog',
                'wrapClass' => 'nav-item',
                'class'     => 'nav-link',
            ],
            'admin' => [
                'label'     => 'Admin',
                'route'     => 'admin',
                'wrapClass' => 'nav-item',
                'class'     => 'nav-link',
            ],
        ],
    ],
];
