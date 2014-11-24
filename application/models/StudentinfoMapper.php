<?php
class Application_Model_StudentinfoMapper
{
	function __construct()
	{
		$this->db = new Application_Model_DbTable_Studentinfo();
	}

	// 获取学员信息
	public function Getstudentinfo($stuid)
	{
		$ab = $this->db->getAdapter();
		$where = $ab->quoteInto('stuid =?',$stuid);
		$res = $this->db->fetchRow($where);
		if ($res) {
			return $res;
		}else{
			return null;
		}
	}

}