<?php
class Application_Model_StuMapper
{
	function __construct()
	{
		$this->db = new Application_Model_DbTable_Stu();
	}
	

	// 获取信息
	public function Queryusername($fromusername)
	{
		$ab = $this->db->getAdapter();
		$where=$ab->quoteInto('FromUserName = ?',$fromusername);
		$arr = $this->db->fetchAll($where)->toArray();
		if(count($arr) > 0){
			return $arr;
		}else{
			return null;
		}
	}

}