<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'market-index-controller' => 'Market\Controller\IndexController',
            'market-view-controller' => 'Market\Controller\ViewController',
        ),
        'factories' => array(
            'market-post-controller' => 'Market\Factory\PostControllerFactory',
        ),
        'aliases' => array(
            'alt' => 'market-view-controller',
        ),
    ),
    'router' => array(
        'routes' => array(
            'home' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/',
                    'defaults' => array(
                        'controller'    => 'market-index-controller',
                        'action'        => 'index',
                    ),
                ),
            ),
            'market' => array(
                'type'    => 'Segment',
                'options' => array(
                    'route'    => '/market[/]',
                    'defaults' => array(
                        'controller'    => 'market-index-controller',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'view' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => 'view[/]',
                            'defaults' => array(
                                'controller'    => 'market-view-controller',
                                'action'        => 'index',
                            ),
                        ),
                        'may_terminate' => true,
                        'child_routes' => array(
                            'main' => array(
                                'type'    => 'Segment',
                                'options' => array(
                                    'route'    => 'main[/][:category]',
                                    'defaults' => array(
                                        'action' => 'index',
                                    ),
                                ),
                            ),
                            'item' => array(
                                'type'    => 'Segment',
                                'options' => array(
                                    'route'    => 'item[/][:itemId]',
                                    'defaults' => array(
                                        'action' => 'item',
                                    ),
                                    'constraints' => array(
                                        'itemId' => '[0-9]*'
                                    ),
                                ),
                            ),
                        ),
                    ),
                    'post' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => 'post[/]',
                            'defaults' => array(
                                'controller'    => 'market-post-controller',
                                'action'        => 'index',
                            ),
                        ),
                    ),
                ),
            ),
            /*'market' => array(
                'type'    => 'Literal',
                'options' => array(
                    // Change this to something specific to your module
                    'route'    => '/market',
                    'defaults' => array(
                        // Change this value to reflect the namespace in which
                        // the controllers for your module are found
                        //'__NAMESPACE__' => 'Market\Controller',
                        'controller'    => 'market-index-controller',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    // This route is a sane default when developing a module;
                    // as you solidify the routes for your module, however,
                    // you may want to remove it and replace it with more
                    // specific routes.
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:controller[/:action]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),*/
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'Market' => __DIR__ . '/../view',
        ),
    ),
);
