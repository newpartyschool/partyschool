<?php
 class Application_Model_StuclassMapper
 {
 	function __construct()
 	{
 		$this->db = new Application_Model_DbTable_Stuclass(); 
 	}

 	//根据学号获取classid
 	public function getClassBystno($stno)
 	{
 		$ab = $this->db->getAdapter();
		$where = $ab->quoteInto('stno =?',$stno);
		$res = $this->db->fetchRow($where);
		if ($res) {
			return $res;
		}else{
			return null;
		}
 	}

 	//根据classid获取学号
 	public function getStnoByclass($classid)
 	{
 		$select = $this->db->select();
		if ($classid)
		{
			$select->orWhere('classid =?', $classid);
		}

		$arr = $this->db->fetchAll($select)->toarray();

		if (count($arr) > 0) {
			return $arr;
		}else{
			return null;
		}
 	}

 	// 存贮学员数据
	public function saveStuclass($stno,$classid)
	{
		$arr = array(
			'stno'=>$stno,
			'classid'=>$classid
			);
		$ab=$this->db->getAdapter();
		$res = $this->db->insert($arr,true);
		return $res;
	}

	//检查是否存在
	public function checkStuclass($stno,$classid)
	{
		$ab = $this->db->getAdapter();
		$where = $ab->quoteInto('stno = ?',$stno)
				 .$ab->quoteInto('AND classid = ?',$classid);
		$arr = $this->db->fetchAll($where)->toArray();
		if ($arr)
		{
			return $arr;
		}
		else
		{
			return null;
		}
		
	}

	// 删除学员信息
	public function delStuclass($stno)
	{
		if (!is_array($stno))
		{
			$stno=array($stno);
		}
		
		$ab=$this->db->getAdapter();
		foreach ($stno as $stno)
		{
			$where=$ab->quoteInto('stno IN(?)',$stno);
			$arr=$this->db->fetchAll($where)->toArray();

			$del=$this->db->delete($where);
			if ($del!='')
			{
				$info = true;
			}
			else
			{
				$info = false;
			}
		}

		return $info;
	}
		
 } 