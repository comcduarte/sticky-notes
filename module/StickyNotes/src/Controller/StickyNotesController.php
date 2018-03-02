<?php 
namespace StickyNotes\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use StickyNotes\Traits\AdapterTrait;
use Exception;

class StickyNotesController extends AbstractActionController
{
    use AdapterTrait;
    
    protected $_stickyNotesTable;
    
    public function indexAction()
    {
        return new ViewModel([
            'stickynotes' => $this->getStickyNotesTable()->fetchAll(),
        ]);
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
    
    public function getStickyNotesTable()
    {
        if (!$this->_stickyNotesTable) {
            throw new Exception('Unable to get StickyNotesTable');
        }
        return $this->_stickyNotesTable;
    }
    
    public function setStickyNotesTable($stickyNotesTable)
    {
        $this->_stickyNotesTable = $stickyNotesTable;
        return $this;
    }
}