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
        $select = $this->db->select()->from('memo', '*');
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

    public function editAction()
    {
        $select = $this->db->select();
        $select->from('memo', '*')->where('id = ?', $this->getRequest()->getQuery('id'));
        $this->view->memo = $this->db->fetchRow($select);
    }

    public function updateAction()
    {
        $params = [
            'title' => $this->getRequest()->getPost('title'),
            'body' => $this->getRequest()->getPost('body'),
        ];

        $where = $this->db->quoteInto('id = ?' , $this->getRequest()->getPost('id'));
        $this->db->update('memo', $params, $where);
        $this->_helper->redirector('index', 'Memo');
    }

    public function deleteAction()
    {
        $this->db->delete('memo', $this->db->quoteInto('id = ?' , $this->getRequest()->getPost('id')));
        $this->_helper->redirector('index', 'Memo');;
    }
}

