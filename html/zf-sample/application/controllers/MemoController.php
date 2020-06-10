<?php

class MemoController extends Zend_Controller_Action
{
    private $db;

    public function init()
    {
        $this->db = new Zend_Db_Adapter_Pdo_Mysql([
            'host'     => 'mysql',
            'username' => 'test',
            'password' => 'test',
            'dbname'   => 'test'
        ]);
    }

    public function indexAction()
    {
        $select = $this->db->select();
        $select->from('memo', '*');
        $this->view->memos = $this->db->fetchAll($select);
    }
   
    public function newAction()
    {

    }
    
    public function storeAction()
    {
        $this->db->insert('memo', [
            'title' => $this->getRequest()->getPost('title'),
            'body' => $this->getRequest()->getPost('body'),
        ]);

        $this->_helper->redirector('index', 'Memo');
    }

}

