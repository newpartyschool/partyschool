<?php
class Application_Model_SelectedquestionMapper
{
	function __construct()
	{
		$this->db = new Application_Model_DbTable_Selectedquestion();
	}
	
		public function addSelectedquestion($periodnum,$qeid)
		{

			$arr = array(
						 'periodnum'=>$periodnum,
						 'qeid'	=>$qeid

						);
			$ab=$this->db->getAdapter();
			$res = $this->db->insert($arr,true);
			
			return $res;
		}





}

