<?php

namespace Tutorial;

use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [
            'tutorial' => [
                'type' => Segment::class,
                'options' => [
                    'route'    => '/tutorial',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'index',
                    ],
                ],
                'may_terminate' => true,
                'child_routes' => [
                    'sample' => [
                        'type' => Segment::class,
                        'options' => [
                            'route'    => '/sample[/:action]',
                            'constraints'    => [
                                'action' => '[a-z]+',
                            ],
                            'defaults' => [
                                'controller' => Controller\SampleController::class,
                                'action'     => 'index',
                            ],
                        ],
                    ],
                    'product' => [
                        'type' => Segment::class,
                        'options' => [
                            'route'    => '/product[/:action][/:id]',
                            'constraints'    => [
                                'action' => '[a-z]+',
                                'id'     => '[0-9]+',
                            ],
                            'defaults' => [
                                'controller' => Controller\ProductController::class,
                                'action'     => 'index',
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            //Controller\IndexController::class => InvokableFactory::class,
            Controller\SampleController::class  => InvokableFactory::class,
            Controller\ProductController::class => InvokableFactory::class,
        ],
    ],
    'view_manager' => [
        'template_map' => [
            'tutorial/index/index' => __DIR__ . '/../view/tutorial/index/index.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];
