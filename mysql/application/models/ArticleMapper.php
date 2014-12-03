<?php
class Application_Model_ArticleMapper
{
	function __construct()
	{
		$this->db = new Application_Model_DbTable_Article();
	}
	
	/**
	 * 根据id查找文章
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function findArticleById($id=null)
	{
		$ab = $this->db->getAdapter();
		$where = $ab->quoteInto('id =?',$id);
		$res = $this->db->fetchRow($where)->toarray();
		if ($res) {
			return $res;
		}else{
			return null;
		}
	}

	/**
	 * 查找文章列表
	 * @param  array  $where [where限制条件array]
	 * @param  [type] $order [排序]
	 * @param  [type] $limit [篇数限制条件]
	 * @return [type]        [返回文章对象]
	 */
	public function getArticles($where = array(), $order = null, $limit = null)
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

	public function addArticles($title,$content)
	{
		$arr = array(
						 'title'=>$title,
						 //'ansA'=>md5($Password),
						 'content'	=>$content,
						 'publisedtime'=>time(),
						 'imgurl'	=>''

						);
			$ab=$this->db->getAdapter();
			$res = $this->db->insert($arr,true);
			//echo $res;
			
			return $res;
		
	}

		public function updateArticles($id,$title,$content)
	{
		$arr = array(
						 'title'=>$title,
						 //'ansA'=>md5($Password),
						 'content'	=>$content,
						 'publisedtime'=>'',
						 'imgurl'	=>''

						);
			$ab=$this->db->getAdapter();
			$where=$ab->quoteInto('id=?',$id);
			$res = $this->db->update($set=$arr,$where);
			//$res = $this->db->insert($arr,true);
			//echo $res;
			
			return $res;
		
	}

	public function deleteZx($id)
	{
		if (!is_array($id))
				$id=array($id);

			$ab=$this->db->getAdapter();

			foreach ($id as $id) {
				$where=$ab->quoteInto('id=?',$id);
				$arr=$this->db->fetchAll($where)->toArray();


				//进行问题的删除
				$del=$this->db->delete($where);
				if ($del!='') {
					$info="该资讯已成功删除！";
				}  else {
					$info="删除资讯失败，请重新删除！";
				}
			}
			
			return $info;
	}
}