<?php
class Application_Model_PeriodsetMapper
{
	function __construct()
	{
		$this->db = new Application_Model_DbTable_Periodset();
	}
	
	/**
	 * 检测该期设置是否存在
	 * @param  [type] $username [description]
	 * @param  [type] $pw       [description]
	 * @return [type]           [description]
	 */
	public function checkPeriods($periodnum)
	{
		$ab = $this->db->getAdapter();
		$where = $ab->quoteInto('periodnum = ?',$periodnum);
		$arr = $this->db->fetchAll($where)->toArray();
		// if(count($arr) > 0){
		// 	return $arr;
		// }else{
		// 	return null;
		// }	
		return $arr;
	}
	
	public function addPeriods($periodnum,$enrollstart,$able_test_start,$sum_start,$enrollend,$able_test_end,$sum_end)
	{

		$arr = array(
			             'periodnum'=>$periodnum,
						 'enrollstart'=>$enrollstart,
						 'able_test_start'=>$able_test_start,
						 'sum_start'=>$sum_start,
						 'enrollend'=>$enrollend,
						 'able_test_end'=>$able_test_end,
						 'sum_end'=>$sum_end,
						 'testtime'=>''


						);
			$ab=$this->db->getAdapter();
			$res = $this->db->insert($arr,true);
			//echo $res;
			
			return $res;
		
	}


	/**
		* 添加测试时间
		*/
		public function updatePeriodset($periodnum,$testtime)
		{

			$arr = array(

						 'periodnum'=>$periodnum,
						 'testtime'=>$testtime

						);
			$ab=$this->db->getAdapter();
			$where=$ab->quoteInto('periodnum=?',$periodnum);
			$res = $this->db->update($set=$arr,$where);
			
			return $res;
		}

	/**
		* 删除期数记录
		*/
		public function deletePeriods($periodnum)
		{
			if (!is_array($periodnum))
				$periodnum=array($periodnum);

			$ab=$this->db->getAdapter();

			foreach ($periodnum as $periodnum) {
				$where=$ab->quoteInto('periodnum=?',$periodnum);
				$arr=$this->db->fetchAll($where)->toArray();


				//进行问题的删除
				$del=$this->db->delete($where);
				if ($del!='') {
					$info="已成功删除！";
				}  else {
					$info="删除失败，请重新删除！";
				}
			}
			
			return $info;
		}

		//查询最新一期期数
		public function findPeriod()
		{
			$limit = 1;
			$select = $this->db->select();
			$select -> order('enrollstart DESC');
			$select -> limit($limit);
			$res = $this->db->fetchAll($select)->toArray();
			return $res;
		}

}