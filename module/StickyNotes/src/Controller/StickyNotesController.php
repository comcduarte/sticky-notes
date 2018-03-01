<?php 
namespace StickyNotes\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class StickyNotesController extends AbstractActionController
{
    public function indexAction()
    {
        return new ViewModel;
    }
    
    public function addAction()
    {
        return new ViewModel;
    }
    
    public function removeAction()
    {
        return new ViewModel;
    }
    
    public function updateAction()
    {
        return new ViewModel;
    }
}