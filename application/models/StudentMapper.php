<?php
class Application_Model_StudentMapper
{
	function __construct()
	{
		$this->db = new Application_Model_DbTable_Student();
	}

	// 获取学员信息
	public function getStuinfo($where = array(), $order = null, $limit = null)
	{
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

	//按学号查找
	public function getStuByid($stno)
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

	// 存贮学员数据
	public function saveStuinfo($stno,$name,$sex,$depname,$major,$type,$getclasstype,$classid,$getphone,$isgood,$isgraduate)
	{
		$ab = $this->db->getAdapter();
		$where = $ab->quoteInto('stno =?',$stno);
		$result = $this->db->fetchRow($where);
		if (empty($result))
		{
			$grade = 0;
			$arr = array(
						 'stno'=>$stno,
						 'name'=>$name,
						 'sex'=>$sex,
						 'depname'=>$depname,
						 'major'=>$major,
						 'type'=>$type,
						 'classname'=>$getclasstype,
						 'classid'=>$classid,
						 'phonenum'=>$getphone,
						 'grade'=>$grade,
						 'isgood'=>$isgood,
						 'isgraduate'=>$isgraduate
						);
			$ab=$this->db->getAdapter();
			$res = $this->db->insert($arr,true);
			return $res;
		}
		else
		{
			return null;
		}
	}


	// 查询成绩
	public function GetGrade($stno)
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
}