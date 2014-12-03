<?php
class Application_Model_StuverifiMapper
{
	function __construct()
	{
		$this->db = new Application_Model_DbTable_Stuverifi();
	}

	// 获取学员信息
	public function Getstuverifi($Fromusername)
	{
		$ab = $this->db->getAdapter();
		$where = $ab->quoteInto('FromUserName =?',$Fromusername);
		$res = $this->db->fetchRow($where);
		if ($res) {
			return $res;
		}else{
			return null;
		}
	}

}