<?php
namespace StickyNotes\Controller\Factory;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use StickyNotes\Controller\StickyNotesController;

class StickyNotesControllerFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param null|array $options
     * @return StickyNotesController
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new StickyNotesController();
    }
}