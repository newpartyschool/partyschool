<?php
 class Application_Model_ClassMapper
 {
 	function __construct()
 	{
 		$this->db = new Application_Model_DbTable_Class(); 
 	}

 	public function findClassInfo($teachername)
 	{
 		$ab = $this->db->getAdapter();
		$where = $ab->quoteInto('teachername = ?',$teachername);
		$res = $this->db->fetchAll($where)->toArray();
		if ($res) {
			return $res;
		}else{
			return null;
		}
 	}


 	public function changeInfo($teachername,$classid)
 	{
 		$arr = array('teachername' => $teachername);
 		$ab=$this->db->getAdapter();
 		$where=$ab->quoteInto('classid=?',$classid);
 		$res=$this->db->update($set=$arr,$where);
 		return $res;
 	}

 	// 根据学员信息查找班级ID
 	public function getClassid($classtype,$periodnum,$depid,$campus)
 	{
 		$ab = $this->db->getAdapter();
		$where = $ab->quoteInto('`classtype` = ?',$classtype)
				 .$ab->quoteInto(' AND `periodsnum` = ?',$periodnum)
				 .$ab->quoteInto(' AND `depid` = ?',$depid)
				 .$ab->quoteInto(' AND `campus` = ?',$campus);
		$arr = $this->db->fetchAll($where)->toArray();
		return $arr;
 	}


 }