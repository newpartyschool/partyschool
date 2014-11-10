<?php
class Application_Model_ClassummaryMapper
{
	function __construct()
	{
		$this->db = new Application_Model_DbTable_Classummary();
	}

	/*
	*  党校总结提交数据
	*/
	public function dxzjForm($classid,$suzhi,$study,$taolun,$shijian)
	{
		$ab = $this->db->getAdapter();
		$where = $ab->quoteInto('classid =?',$classid);
		$result = $this->db->fetchRow($where);
		if ($result)
		{
			$arr = array('xysz' => $suzhi, 'study' => $study, 'taolun' => $taolun, 'shijian' => $shijian );
			$ab=$this->db->getAdapter();
			$where=$ab->quoteInto('classid =?',$classid);
			$res = $this->db->update($set=$arr,$where);
			return $res;
		}
		else
		{
			$arr = array('classid' => $classid, 'xysz' => $suzhi, 'study' => $study, 'taolun' => $taolun, 'shijian' => $shijian );
			$ab=$this->db->getAdapter();
			$res=$this->db->insert($arr);
			return $res;
		}
		
	}

	/*
	*  党校总结读取数据
	*  
	*/
	public function dxzjdata($classid)
	{
		$ab = $this->db->getAdapter();
		$where = $ab->quoteInto('classid =?',$classid);
		$res = $this->db->fetchRow($where);
		if ($res) {
			return $res;
		}else{
			return null;
		}
	}


}