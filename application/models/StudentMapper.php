<?php
class Application_Model_StudentMapper
{
	function __construct()
	{
		$this->db = new Application_Model_DbTable_Student();
	}

	// 获取学员信息
	public function getStuinfo($stno = array(), $order = null, $limit = null)
	{
		$select = $this->db->select();
		if ($stno)
		{
			$select->orWhere('stno IN(?)', $stno);
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

	// 获取优秀学员信息
	public function Showgood($stno = array())
	{
		$isgood = 1;
		$select = $this->db->select();
		$select->orWhere('stno IN(?)', $stno);
		$select->where('isgood = ?',$isgood);
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
	public function saveStuinfo($stno,$name,$sex,$depname,$major,$type,$getclasstype,$getphone,$isgood,$isgraduate)
	{
		$ab = $this->db->getAdapter();
		$where = $ab->quoteInto('stno =?',$stno);
		$result = $this->db->fetchRow($where);
		if (empty($result))
		{
			$arr = array(
						 'stno'=>$stno,
						 'name'=>$name,
						 'sex'=>$sex,
						 'depname'=>$depname,
						 'major'=>$major,
						 'type'=>$type,
						 'classname'=>$getclasstype,
						 'phonenum'=>$getphone,
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

	// 删除学员信息
	public function delStu($stno)
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

	//更新学员优秀状态
	public function changeGood($stno,$isgood)
	{
		$arr = array('isgood' => $isgood);
		$ab=$this->db->getAdapter();
		$where=$ab->quoteInto('stno=?',$stno);
		$res=$this->db->update($set=$arr,$where);
		return $res;
	}

	//更新学员结业状态
	public function changeGraduate($stno,$isgraduate)
	{
		$arr = array('isgraduate' => $isgraduate);
		$ab=$this->db->getAdapter();
		$where=$ab->quoteInto('stno=?',$stno);
		$res=$this->db->update($set=$arr,$where);
		return $res;
	}
}