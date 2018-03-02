<?php 
namespace StickyNotes\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use StickyNotes\Traits\AdapterTrait;
use Exception;
use StickyNotes\Model\Entity\StickyNote;

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
        $request =$this->getRequest();
        $response = $this->getResponse();
        
        if ($request->isPost()) {
            $new_note = new StickyNote();
            if (!$note_id = $this->getStickyNotesTable()->saveStickyNote($new_note)) {
                $response->setContent(\Zend\Json\Json::encode(array('response' => false)));
            } else {
                $response->setContent(\Zend\Json\Json::encode(array('response' => true, 'new_note_id' => $note_id)));
            }
        }
        return $response;
    }
    
    public function removeAction()
    {
        $request = $this->getRequest();
        $response = $this->getResponse();
        if ($request->isPost()) {
            $post_data = $request->getPost();
            $note_id = $post_data['id'];
            if (!$this->getStickyNotesTable()->removeStickyNote($note_id)) {
                $response->setContent(\Zend\Json\Json::encode(array('response' => false)));
            } else {
                $response->setContent(\Zend\Json\Json::encode(array('response' => true)));
            }
        }
        return $response;
    }
    
    public function updateAction()
    {
        $request = $this->getRequest();
        $response = $this->getResponse();
        if ($request->isPost()) {
            $post_data = $request->getPost();
            $note_id = $post_data['id'];
            $note_content = $post_data['content'];
            $stickynote = $this->getStickyNotesTable()->getStickyNote($note_id);
            $stickynote->setNote($note_content);
            if (!$this->getStickyNotesTable()->saveStickyNote($stickynote)) {
                $response->setContent(\Zend\Json\Json::encode(array('response' => false)));
            } else {
                $response->setContent(\Zend\Json\Json::encode(array('response' => true)));
            }
        }
        return $response;
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