<?php

class MemoControllerController extends Zend_Controller_Action
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
        // 行を挿入します。
        // $result = $db->insert($table, $params);

        $select = $this->db->select();
        $select->from('memo', '*');
        $this->view->memos = $this->db->fetchAll($select);
    }
   
    


}

