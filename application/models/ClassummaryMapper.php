<?php
class Application_Model_ClassummaryMapper
{
	function __construct()
	{
		$this->db = new Application_Model_DbTable_Classumary();
	}
	public function dxzjForm($classid,$suzhi,$study,$taolun,$shijian)
	{
		$arr = array('classid' => $classid, 'xysz' => $suzhi, 'study' => $study, 'taolun' => $taolun, 'shijian' => $shijian );
		$ab=$this->db->getAdapter();
		$res=$this->db->insert($arr);
		return $res;
	}

}