<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Garagem\Controller\Carros' => 'Garagem\Controller\CarrosController',
        ),
    ),
    'router' => array(
     'routes' => array(
         'carros' => array(
             'type'    => 'Segment',
             'options' => array(
                 'route'    => '/carros[/:action[/:id]]',
                 'defaults' => array(
                     '__NAMESPACE__' => 'Garagem\Controller',
                     'controller'    => 'Carros',
                     'action'        => 'index',
                 ),
                 'constraints' => array(
                     'action' => '(add|edit|delete)',
                     'id'     => '[0-9]+',
                 ),
             ),
         ),
     ),
 ),
    'view_manager' => array(
        'template_path_stack' => array(
            'Garagem' => __DIR__ . '/../view',
        ),
    ),
);