<?php
class Application_Model_StuMapper
{
	function __construct()
	{
		$this->db = new Application_Model_DbTable_Stu();
	}

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

}