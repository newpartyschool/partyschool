<?php
class Application_Model_ScoreMapper
{
	function __construct()
	{
		$this->db = new Application_Model_DbTable_Score();
	}

	//添加学员信息
 	public function addScore($stno,$courseid)
	{
		$arr = array('stno' => $stno,
		 			 'courseid' => $courseid,
		 			 'testscore' => null,
		 			 'totalscore' => null);
		$res = $this->db->insert($arr);
		return $res;
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

	//更新成绩
	public function changeScore($stno,$score)
	{
		$arr = array('totalscore' => $score);
		$ab=$this->db->getAdapter();
		$where=$ab->quoteInto('stno=?',$stno);
		$res=$this->db->update($set=$arr,$where);
		return $res;
	}

	//删除学员信息
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
}