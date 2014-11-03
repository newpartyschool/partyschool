<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
	protected function _initDB()
	{
	     //载入resources
	     $resources = $this->getPluginResource ( 'multidb' );
	     $resources->init();
	     //参照： Zend_Application_Resource_Multidb
	     $db_default = $resources->getDefaultDb ();
	     //设置dbtable使用的默认数据库
	     Zend_Db_Table::setDefaultAdapter($db_default);
	 
	     //加载另外一个库并存入公共寄存器
	     $dbstu = $resources->getDb("dbstu");
	     Zend_Registry::set("dbstu", $dbstu);
	 }
}