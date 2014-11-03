<?php
class Application_Model_DbKey_Student extends Zend_Db_Table_Abstract
{
    // 只做数据库的设置操作
    public function __construct($config = null)
    {
        if(!$config)
        {
            parent::__construct(Zend_Registry::get('dbstu'));
        }
    }
}