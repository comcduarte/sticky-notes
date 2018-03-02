<?php 
namespace StickyNotes;

use Zend\Router\Http\Literal;

return [
    'router' => [
        'routes' => [
            'stickynotes' => [
                'type' => Literal::class,
                'options' => [
                    'route' => '/stickynotes',
                    'defaults' => [
                        'controller' => Controller\StickyNotesController::class,
                        'action' => 'index',
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\StickyNotesController::class => Controller\Factory\StickyNotesControllerFactory::class,
        ],
    ],
    'service_manager' => [
        'services' => [
            'model-primary-adapter-config' => [
                'driver' => 'PDO',
                'dsn' => 'mysql:host=it-webdb01.midnet.cityofmiddletown.com;dbname=sticky-notes',
                'username' => 'sticky-notes-usr',
                'password' => 'sticky-notes-password',
            ],
        ],
    ],
    'view_manager' => [
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];