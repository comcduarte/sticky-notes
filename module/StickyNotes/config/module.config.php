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
    'view_manager' => [
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];