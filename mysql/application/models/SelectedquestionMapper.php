<?php
class Application_Model_SelectedquestionMapper
{
	function __construct()
	{
		$this->db = new Application_Model_DbTable_Selectedquestion();
	}
	/**
	 * 添加随机抽取的题目
	 * @param  [type] $order [description]
	 * @return [type]        [description]
	 */
	public function addSelectedquestion($periodnum,$qeid)
	{

		$arr = array(
					 'periodsnum'=> $periodnum,
					 'qeid'	=> $qeid

					);
		$ab=$this->db->getAdapter();
		$res = $this->db->insert($arr);
		
		return $res;
	}

			/**
	 * 查找所有抽取题目
	 * @param  [type] $order [description]
	 * @return [type]        [description]
	 */
	public function findAllSelectedquestion($where)
	{
		$ab = $this->db->getAdapter();
		$where = $ab->quoteInto('periodsnum =?',$periodnum);
		//$where = null;
		$res = $this->db->fetchAll($where)->toArray();

		return $res;
	}

	/**
	 * 根据periodnum查找题目，如果在该期已抽取过，则不再抽取
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function findSelectedquestionById($periodnum)
	{
		$ab = $this->db->getAdapter();
		$where = $ab->quoteInto('periodsnum =?',$periodnum);
		$res = $this->db->fetchAll($where)->toArray();
		if ($res) {
			return $res;
		}else{
			return null;
		}

	}




}

