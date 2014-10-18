
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

	 	$periodnum ='';
	 	$enrollstart='';
	 	$enrollend= '';
	 	$sum_start ='';
	 	$sum_end='';
	 	$able_test_start='';
	 	$able_test_end ='';
		if(!empty($_POST["periodnum"]))
		{
		    $periodnum = $_POST["periodnum"];
		}
		if(!empty($_POST["enrollstart"]))
		{
		    $enrollstart = $_POST["enrollstart"];
		}
		if(!empty($_POST["enrollend"]))
		{
		    $enrollend = $_POST["enrollend"];
		}
		if(!empty($_POST["sum_start"]))
		{
		    $sum_start = $_POST["sum_start"];
		}
		if(!empty($_POST["sum_end"]))
		{
		    $sum_end = $_POST["sum_end"];
		}
		if(!empty($_POST["able_test_start"]))
		{
		    $able_test_start = $_POST["able_test_start"];
		}
		if(!empty($_POST["able_test_end"]))
		{
		    $able_test_end = $_POST["able_test_end"];
		}


	 	$this->view->periodnum=$periodnum;
	 	$this->view->enrollstart=$enrollstart;
	 	$this->view->enrollend=$enrollend;
	 	$this->view->sum_start=$sum_start;
	 	$this->view->sum_end=$sum_end;
	 	$this->view->able_test_start=$able_test_start;
	 	$this->view->able_test_end=$able_test_end;

	 	$periodsetMapper = new Application_Model_PeriodsetMapper();
		$arr = $periodsetMapper->checkPeriods($periodnum);
		if(!empty($arr)){
			$periodsetMapper = new Application_Model_PeriodsetMapper();
			$arr = $periodsetMapper->deletePeriods($periodnum);	
					
		}
		$periodsetMapper = new Application_Model_PeriodsetMapper();
		$result = $periodsetMapper->addPeriods($periodnum,$enrollstart,$able_test_start,$sum_start,$enrollend,$able_test_end,$sum_end);
		if (!$result){

		}else{
			echo "<script>alert('设置成功');</script>";

		}
	


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
	 	$periodnum = '';
	 	$testtime = '';
	 	$timunum = '10';

	 	if(!empty($_POST["periodnum"]))
		{
		    $periodnum = $_POST["periodnum"];
		}

		if(!empty($_POST["testtime"]))
		{
		    $testtime = $_POST["testtime"];
		}

		if(!empty($_POST["timunum"]))
		{
		    $timunum = $_POST["timunum"];
		}

	 	$this->view->periodnum=$periodnum;
	 	$this->view->testtime=$testtime;
	 	$this->view->timunum=$timunum;

		$periodsetMapper = new Application_Model_PeriodsetMapper();
		$result = $periodsetMapper->updatePeriodset($periodnum,$testtime);

        $queupdateMapper = new Application_Model_QueupdateMapper();
        $where = array();
        $order = rand(1,4);
        $limit = $timunum;
        $num=5; $page=1; //设置每一页显示的文章数目 //设置第一页显示
        $arrList = $queupdateMapper->findQuestionFenYe($where,$order,$limit);
        foreach ($arrList as $value) {
        	$qeid = $value['qeid'];
        	$selectedquestionMapper = new Application_Model_SelectedquestionMapper();
	 		$info = $selectedquestionMapper->addSelectedquestion($periodnum,$qeid);
        }

        $paginator_choose = new Zend_Paginator(new Zend_Paginator_Adapter_Array($arrList)); //调用分页
        $paginator_choose->setItemCountPerPage($num); //设置每一页显示的文章数目
        $paginator_choose->setCurrentPageNumber($page); //设置第一页显示
        $paginator_choose->setCurrentPageNumber($this->_getParam('page')); //从url获取需要显示的页码
        $this->view->paginator_choose = $paginator_choose;


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
       $limit = null;
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
		//$publisedtime="2014-10-5";
		//$imgurl="";


		$articleMapper = new Application_Model_ArticleMapper();
		$result = $articleMapper->addArticles($title,$content,$publisedtime,$imgurl);


		return $result;*/


	 }

	 	 public function addarticleAction()
	 {
	 	
	 	$title = $_POST['zxtitle'];
		$content = $_POST['zxcontent'];

		$articleMapper = new Application_Model_ArticleMapper();
		$result = $articleMapper->addArticles($title,$content,$publisedtime,$imgurl);

		$this->_redirect("/admin/learninfo");


	 }

	 public function editzxAction()
	 {
	 	//$id = $_GET['id'];
	 	
	 	//$id=4;
	 	$id = $this->_request->getParam('id');
      if(!empty($id)){
	 	$articleMapper = new Application_Model_ArticleMapper();
		$result = $articleMapper->findArticleById($id);
		//$title =$result['title'];
		//$content =$result['content'];
		//print_r($result);
		//exit();
		$this->view->result = $result;
	}






	 }

	 	 public function editarticleAction()
	 {
	 	$id = $_POST['zxid'];
	 	$title = $_POST['zxtitle'];
		$content = $_POST['zxcontent'];

		$articleMapper = new Application_Model_ArticleMapper();
		$result = $articleMapper->updateArticles($id,$title,$content);

		$this->_redirect("/admin/learninfo");


	 }


}