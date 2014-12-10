<?php
 class Application_Model_ClassMapper
 {
 	function __construct()
 	{
 		$this->db = new Application_Model_DbTable_Class(); 
 	}

 	//根据班主任查询班级信息
 	public function findClassInfo($userid)
 	{
 		$limit = 1;
		$where = array('userid' => $userid);
		$order = 'periodsnum DESC';
		$select = $this->db->select();
		if (count($where) > 0) {
			foreach ($where as $key => $value) {
				$select->where($key.'=?',$value);
			}
		}
		if ($order) {
			$select->order($order);
		}
		if ($limit) {
			$select->limit($limit);
		}

		$arr = $this->db->fetchAll($select)->toarray();

		if (count($arr) > 0) {
			return $arr;
		}else{
			return null;
		}
 	}

 	//根据班主任查询班级信息
 	public function findClassById($classid)
 	{
 		$ab = $this->db->getAdapter();
		$where = $ab->quoteInto('classid = ?',$classid);
		$res = $this->db->fetchAll($where)->toArray();
		if ($res) {
			return $res;
		}else{
			return null;
		}
 	}

 	// //修改班主任信息
 	// public function changeInfo($userid,$classid)
 	// {
 	// 	$arr = array('userid' => $userid);
 	// 	$ab=$this->db->getAdapter();
 	// 	$where=$ab->quoteInto('classid=?',$classid);
 	// 	$res=$this->db->update($set=$arr,$where);
 	// 	return $res;
 	// }

 	//添加班级信息
 	public function addUser($username,$realname,$pw,$depid)
	{
		$arr = array('username' => $username,
		 			 'realname' => $realname,
		 			 'pw' => $pw,
		 			 'depid' => $depid);
		$res = $this->db->insert($arr);
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

 	//新一期开班初始化数据
 	public function refresh($periodsnum)
 	{
 		$period = (int)$periodsnum-1;
 		$ab = $this->db->getAdapter();
 		$where = $ab->quoteInto('periodsnum = ?',$period);
		$res = $this->db->fetchAll($where)->toArray();
		foreach ($res as $res)
		{
			$classtype = $res['classtype'];
			$userid = $res['userid'];
			$depid = $res['depid'];
			$campus = $res['campus'];

			$arr = array('classtype' => $classtype,
		 			 'periodsnum' => $periodsnum,
		 			 'userid' => $userid,
		 			 'depid' => $depid,
		 			 'campus' => $campus);
			$res = $this->db->insert($arr);
			if ($res)
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