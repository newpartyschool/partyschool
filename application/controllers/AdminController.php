
<?php

class AdminController extends Zend_Controller_Action
{
	 public function init()
	 {

	 }
	 /**
	  * 党校总结控制
	  * @return [type] [description]
	  */
	 public function dxzjAction()
	 {

	 }
	 /**
	  * 修改密码控制
	  * @return [type] [description]
	  */
	 public function percenterAction()
	 {

	 }
	 /**
	  * 超级管理员“基本设置”控制
	  * @return [type] [description]
	  */
	 public function basesetAction()
	 {

	 }
	 /**
	  * 超级管理员“学员信息”控制
	  * @return [type] [description]
	  */
	 public function xyinfoAction()
	 {

	 }
	 /**
	  * 超级管理员“题目设置”控制
	  * @return [type] [description]
	  */
	 public function questionsetAction()
	 {
	 	        // action body
        //创建一个表模型

        // $questionsetMapper = new Application_Model_QuestionsetMapper();
        // $order = "";
        // $arrList = $questionsetMapper->findAllQuestionset($order);
        // $this->view->arrList = $arrList;

        $questionsetMapper = new Application_Model_QuestionsetMapper();
        $where = array();
        $order = null;
        $limit = 10;
        $num=5; $page=1; //设置每一页显示的文章数目 //设置第一页显示
        $arrList = $questionsetMapper->findQuestionFenYe($where,$order,$limit);

        $paginator_choose = new Zend_Paginator(new Zend_Paginator_Adapter_Array($arrList)); //调用分页
        $paginator_choose->setItemCountPerPage($num); //设置每一页显示的文章数目
        $paginator_choose->setCurrentPageNumber($page); //设置第一页显示
        $paginator_choose->setCurrentPageNumber($this->_getParam('page')); //从url获取需要显示的页码
        $this->view->paginator_choose = $paginator_choose;
        //$this->view->arrList = $arrList;

	 }
	 /**
	  * 超级管理员 “修改题库”控制
	  * @return [type] [description]
	  */
	 public function queupdateAction()
	 {
	 	$queupdateMapper = new Application_Model_QueupdateMapper();
	 	$num=5; $page=1; //设置每一页显示的文章数目 //设置第一页显示
        $order = "";
        $arrList = $queupdateMapper->findAllQueupdate($order);
        $paginator_all = new Zend_Paginator(new Zend_Paginator_Adapter_Array($arrList)); //调用分页
        $paginator_all->setItemCountPerPage($num); //设置每一页显示的文章数目
        $paginator_all->setCurrentPageNumber($page); //设置第一页显示
        $paginator_all->setCurrentPageNumber($this->_getParam('page')); //从url获取需要显示的页码
        $this->view->paginator_all = $paginator_all;
        //$this->view->arrList = $arrList;

	 }


	 	/**
	* 删除题目
	*/
	public function deletequestionAction()
	{
		$qeid=$this->getRequest()->getParam('qeid');
		
		$QueupdateMapper = new Application_Model_QueupdateMapper();
		$info = $QueupdateMapper->deleteQuestion($qeid);
		$this->view->info = $info;
		
		$this->_redirect("/admin/queupdate");//admin?info=$info

	}


	 	/**
	* 查找题目
	*/
	public function findquestionAction()
	{

		$qeid=$this->getRequest()->getParam('qeid');
		//$qeid=7;
		$QueupdateMapper = new Application_Model_QueupdateMapper();
		$info = $QueupdateMapper->findQueupdateById($qeid);
		$info = $info[0];
		
		echo(json_encode($info));

		exit();


	}


	public function xxAction()
	{


		$qetitle = $_POST['timu'];
		$ansA = $_POST['ansA'];
		$ansB = $_POST['ansB'];
		$ansC = $_POST['ansC'];
		$ansD = $_POST['ansD'];
		$ansY = $_POST['rightAns'];

		$queupdateMapper = new Application_Model_QueupdateMapper();
		$result = $queupdateMapper->addQuestion($qetitle,$ansA,$ansB,$ansC,$ansD,$ansY);


		echo $result;
		exit();


	}

		public function editquestionAction()
	{

		$qeid = $_POST['qeid'];
		$qetitle = $_POST['timu'];
		$ansA = $_POST['ansA'];
		$ansB = $_POST['ansB'];
		$ansC = $_POST['ansC'];
		$ansD = $_POST['ansD'];
		$ansY = $_POST['rightAns'];
		$queupdateMapper = new Application_Model_QueupdateMapper();
		$result = $queupdateMapper->editQuestion($qeid,$qetitle,$ansA,$ansB,$ansC,$ansD,$ansY);
		echo $result;
		exit();



	}





	 /**
	  * 超级管理员 “学习资讯”控制
	  * @return [type] [description]
	  */
	 public function learninfoAction()
	 {

       $articleMapper = new Application_Model_ArticleMapper();
       $order = "publisedtime DESC";
       $where = array();
       $limit = 8;
       $arrList = $articleMapper->getArticles($where,$order,$limit);
      // $this->view->arrList = $arrList;
       $num=5; $page=1; //设置每一页显示的文章数目 //设置第一页显示
       $paginator_learninfo = new Zend_Paginator(new Zend_Paginator_Adapter_Array($arrList)); //调用分页
       $paginator_learninfo->setItemCountPerPage($num); //设置每一页显示的文章数目
       $paginator_learninfo->setCurrentPageNumber($page); //设置第一页显示
       $paginator_learninfo->setCurrentPageNumber($this->_getParam('page')); //从url获取需要显示的页码
       $this->view->paginator_learninfo = $paginator_learninfo;

	 	

	 }

	 public function addzxAction()
	 {
/*	 	$title = $_POST['wz-title'];
		$content = $_POST['article-content'];
		$publisedtime="2014-10-5";
		$imgurl="";


		$articleMapper = new Application_Model_ArticleMapper();
		$result = $articleMapper->addArticles($title,$content,$publisedtime,$imgurl);


		return $result;*/


	 }


}