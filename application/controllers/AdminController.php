
<?php

class Excel_Xml
 {
 	private $header = "<?xml version=\"1.0\" encoding=\"%s\"?\>\n<Workbook xmlns=\"urn:schemas-microsoft-com:office:spreadsheet\" xmlns:x=\"urn:schemas-microsoft-com:office:excel\" xmlns:ss=\"urn:schemas-microsoft-com:office:spreadsheet\" xmlns:html=\"http://www.w3.org/TR/REC-html40\">";
 	private $footer = "</Workbook>";
 	private $lines = array();
 	private $sEncoding;
 	private $bConvertTypes;
 	private $sWorksheetTitle;
 	public function __construct($sEncoding = 'UTF-8', $bConvertTypes = false, $sWorksheetTitle = 'Table1')
 	{
 		$this->bConvertTypes = $bConvertTypes;
 		$this->setEncoding($sEncoding);
 		$this->setWorksheetTitle($sWorksheetTitle);
 	}
 	public function setEncoding($sEncoding)
 	{
 		$this->sEncoding = $sEncoding;
 	}
 	public function setWorksheetTitle ($title)
 	{
 		$title = preg_replace ("/[\\\|:|\/|\?|\*|\[|\]]/", "", $title);
 		$title = substr ($title, 0, 31);
 		$this->sWorksheetTitle = $title;
 	}
 	private function addRow ($array)
 	{
 		$cells = "";
 		foreach ($array as $k => $v):
 			$type = 'String';
 		if ($this->bConvertTypes === true && is_numeric($v)):
 			$type = 'Number';
 		endif;
 		$v = htmlentities($v, ENT_COMPAT, $this->sEncoding);
 		$cells .= "<Cell><Data ss:Type=\"$type\">" . $v . "</Data></Cell>\n";
 		endforeach;
 		$this->lines[] = "<Row>\n" . $cells . "</Row>\n";
 	}
 	public function addArray ($array)
 	{
 		foreach ($array as $k => $v)
 			$this->addRow ($v);
 	}
 	public function generateXML ($filename = 'excel-export')
 	{
 		$filename = preg_replace('/[^aA-zZ0-9\_\-]/', '', $filename);
 		header("Content-Type: application/vnd.ms-excel; charset=" . $this->sEncoding);
 		header("Content-Disposition: inline; filename=\"" . $filename . ".xls\"");
 		echo stripslashes (sprintf($this->header, $this->sEncoding));
 		echo "\n<Worksheet ss:Name=\"" . $this->sWorksheetTitle . "\">\n<Table>\n";
 		foreach ($this->lines as $line)
 			echo $line;
 		    echo "</Table>\n</Worksheet>\n";
 		    echo $this->footer;
 	}
 }

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
	 	$session = new Zend_Session_Namespace('user');
	 	if (isset($session->depid)&&$session->depid != 1)
	 	{
	 		$teacher = $session->realname;
	 		$ClassMapper = new Application_Model_ClassMapper();
	 		$classinfo = $ClassMapper->findClassInfo($teacher);
	 		$classid = $classinfo[0]['classid'];

	 		$sz = strip_tags(trim($this->getRequest()->getParam('xy-sz')));
	 		$studycontent = strip_tags(trim($this->getRequest()->getParam('study-content')));
	 		$taoluncontent = strip_tags(trim($this->getRequest()->getParam('taolun-content')));
	 		$shijiancontent = strip_tags(trim($this->getRequest()->getParam('shijian-content')));
	 		if (!empty($sz) && !empty($studycontent) && !empty($taoluncontent) && !empty($shijiancontent))
	 		{
	 			$ClassummaryMapper = new Application_Model_ClassummaryMapper();
	 			$arr = $ClassummaryMapper->dxzjForm($classid,$sz,$studycontent,$taoluncontent,$shijiancontent);
	 			if ($arr)
	 			{
	 				echo "<script>alert('已提交');</script>";
	 			}
	 			
	 		}

	 		///学员信息输出
	 		$stuMapper = new Application_Model_StuMapper();
	 		$order = "stno DESC";
	 		$where = array('classid' => $classid);
	 		$limit = null;
	 		$arrList = $stuMapper->getStuinfo($where,$order,$limit);

	 		// $this->view->arrList = $arrList;
	 		$num=5; $page=1; //设置每一页显示学生信息数目 //设置第一页显示
	 		$paginator_studentinfo = new Zend_Paginator(new Zend_Paginator_Adapter_Array($arrList)); //调用分页
	 		$paginator_studentinfo->setItemCountPerPage($num); //设置每一页显示的学生信息数目
	 		$paginator_studentinfo->setCurrentPageNumber($page); //设置第一页显示
	 		$paginator_studentinfo->setCurrentPageNumber($this->_getParam('page')); //从url获取需要显示的页码
	 		$this->view->paginator_studentinfo = $paginator_studentinfo;

	 	}
	 	else
	 	{
	 		echo "<script>alert('无权访问');location.href='/login'</script>";
	 		exit;
	 	}
	 }
	 /**
	  * 个人信息修改控制
	  * @return [type] [description]
	  */
	 public function percenterAction()
	 {
	 	$session = new Zend_Session_Namespace('user');
	 	if (isset($session->depid) && $session->depid != 1)
	 	{
	 		$realname = strip_tags(trim($this->getRequest()->getParam('realname')));
	 		$newpwd = strip_tags(trim($this->getRequest()->getParam('newpwd')));
	 		$repwd = strip_tags(trim($this->getRequest()->getParam('repwd')));

	 		$teacher = $session->realname;
	 		$ClassMapper = new Application_Model_ClassMapper();
	 		$classinfo = $ClassMapper->findClassInfo($teacher);
	 		$classid = $classinfo[0]['classid'];

	 		if (!empty($newpwd) || !empty($realname))
	 		{
	 			if ($newpwd == $repwd)
	 			{
	 				$session = new Zend_Session_Namespace('user');
	 				$userid = $session->userid;
	 				$UserMapper = new Application_Model_UserMapper();
	 				$arr = $UserMapper->modifyUserInfo($realname,$userid,md5($newpwd));
	 				$ClassMapper = new Application_Model_ClassMapper();
	 				$res = $ClassMapper->changeInfo($realname,$classid);
	 				if ($arr)
	 				{
	 					echo "<script>alert('修改成功,请重新登录');location.href='/login/logout';</script>";
	 				}
	 			}
	 			else
	 			{
	 				echo "<script>alert('两次密码不一样，请重新输入');</script>";
	 			}
	 		}
	 	}
	 	else
	 	{
	 		echo "<script>alert('无权访问，请登录确认');location.href='/login'</script>";
	 		exit;
	 	}
	 }

	 /**
	 *班主任页面导出excel
	 * @return [type] [description]
	 */
	 public function xlsAction()
	 {
	 	// require_once 'excel.class.php';
	 	$xls = new Excel_Xml('UTF-8',false,'测试');
	 	$data = array(
	 		1 => array('学院','校区','期数','学员素质','学习情况','讨论情况','实践活动情况'),
	 		2 => array('管理学院','屯溪路校区','第1期','来自党校总结','党校总结学习情况','党校总结讨论情况','党校总结实践情况'),
	 		3 => array('姓名','学号','年级','手机号','是否优秀','是否毕业','分数'),
	 		4 => array('测试1','2013211121','本科','11111111111','非优秀','未毕业','82'),	
	 		5 => array('测试2','2013222113','本科','11111111111','优秀','未毕业','89'),
	 		6 => array('测试1','2013211121','本科','11111111111','非优秀','未毕业','81'),
	 		7 => array('测试1','2013214431','本科','11111111111','非优秀','未毕业','80'),
	 		8 => array('测试1','2013214621','本科','11111111111','非优秀','未毕业','90')
	 		);
	 	$xls->addArray($data);
	 	$xls->generateXML('2013210154');
	 }

	 /**
	  * 超级管理员“基本设置”控制
	  * @return [type] [description]
	  */

	 public function basesetAction()
	 {
	 	$session = new Zend_Session_Namespace('user');
	 	if ($session->depid == 1)
	 	{
		 	if(!empty($_POST["periodnum"])&!empty($_POST["enrollstart"])&!empty($_POST["enrollend"])&!empty($_POST["sum_start"])&!empty($_POST["sum_end"])&!empty($_POST["able_test_start"])&!empty($_POST["able_test_end"]))
		 	{
		 		$periodnum = $_POST["periodnum"];
		 		$enrollstart = $_POST["enrollstart"];
		 		$enrollend = $_POST["enrollend"];
		 		$sum_start = $_POST["sum_start"];
		 		$sum_end = $_POST["sum_end"];
		 		$sum_end = $_POST["sum_end"];
		 		$able_test_start = $_POST["able_test_start"];
		 		$able_test_end = $_POST["able_test_end"];

		 		$periodsetMapper = new Application_Model_PeriodsetMapper();
		 		$arr = $periodsetMapper->checkPeriods($periodnum);
		 		if(!empty($arr))
		 		{
		 			$periodsetMapper = new Application_Model_PeriodsetMapper();
		 			$arr = $periodsetMapper->deletePeriods($periodnum);
		 		}
		 		$periodsetMapper = new Application_Model_PeriodsetMapper();
		 		$result = $periodsetMapper->addPeriods($periodnum,$enrollstart,$able_test_start,$sum_start,$enrollend,$able_test_end,$sum_end);
		 		if (!$result)
		 		{

		 		}
		 		else
		 		{
		 			echo "<script>alert('设置成功');</script>";
		 		}
		 	}
		 	else
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

		 		if (!empty($_POST["periodnum"])|!empty($_POST["enrollstart"])|!empty($_POST["enrollend"])|!empty($_POST["sum_start"])|!empty($_POST["sum_end"])|!empty($_POST["able_test_start"])|!empty($_POST["able_test_end"]))
		 		{
		 			echo "<script>alert('有选项未填写，设置失败');</script>";
		 		}
		 	}

			$this->view->periodnum=$periodnum;
		 	$this->view->enrollstart=$enrollstart;
		 	$this->view->enrollend=$enrollend;
		 	$this->view->sum_start=$sum_start;
		 	$this->view->sum_end=$sum_end;
		 	$this->view->able_test_start=$able_test_start;
		 	$this->view->able_test_end=$able_test_end;
		}
		else
		{
			echo "<script>alert('无权访问');location.href='/login';</script>";
		 	exit;
		}
	 }


	 /**
	  * 超级管理员“学员信息”控制
	  * @return [type] [description]
	  */
	 public function xyinfoAction()
	 {
	 	$session = new Zend_Session_Namespace('user');
	 	if (isset($session->depid) && $session->depid == 1)
	 	{

	 	}
	 	else
	 	{
	 		echo "<script>alert('无权访问');location.href='/login';</script>";
	 		exit;
	 	}
	 }
	 /**
	  * 超级管理员“题目设置”控制
	  * @return [type] [description]
	  */
	 public function questionsetAction()
	 {
	 	$session = new Zend_Session_Namespace('user');
	 	if (isset($session->depid) && $session->depid == 1)
	 	{
	 		if(!empty($_GET["periodnum"])&!empty($_GET["testtime"])&!empty($_GET["timunum"]))
	 		{
	 			$periodnum = $_GET["periodnum"];
	 			$testtime = $_GET["testtime"];
	 			$timunum = $_GET["timunum"];

	 			$selectedquestionMapper = new Application_Model_SelectedquestionMapper();
	 			$same = $selectedquestionMapper->findSelectedquestionById($periodnum);

        	    if (!$same)
        	    {
        			$periodsetMapper = new Application_Model_PeriodsetMapper();
					$result = $periodsetMapper->updatePeriodset($periodnum,$testtime);

			        $queupdateMapper = new Application_Model_QueupdateMapper();
			        $where = array();
			        $order = rand(1,4);
			        $limit = $timunum;
			        
					$arrList = $queupdateMapper->findQuestionFenYe($where,$order,$limit);

			        foreach ($arrList as $value)
			        {
			        	$qeid = $value['qeid'];
				 		$info = $selectedquestionMapper->addSelectedquestion($periodnum,$qeid);
				 		
				 	}
				 	if (!$arrList)
				 	{
			        	 echo "<script>alert('未抽取成功');</script>";
					}
					else
					{
						echo "<script>alert('抽取题目成功');</script>";
					}
				}
				else
				{
					foreach (array_reverse($same )as $key=>$values)
					{
			        	$qeid = $values['qeid'];
			        	$queupdateMapper = new Application_Model_QueupdateMapper();
				 		$arr= $queupdateMapper->findQueupdateById($qeid);
				 		$arrList[]=$arr[0];
			        }
			    }
			}
			else
			{
				$arrList=array();
				$periodnum = '';
        		$testtime = '';
        		$timunum = '';
        	}
		        $this->view->periodnum=$periodnum;
		        $this->view->testtime=$testtime;
		        $this->view->timunum=$timunum;

		        $num=5; $page=1; //设置每一页显示的文章数目 //设置第一页显示
		        $paginator_choose = new Zend_Paginator(new Zend_Paginator_Adapter_Array($arrList)); //调用分页
		        $paginator_choose->setItemCountPerPage($num); //设置每一页显示的文章数目
		        $paginator_choose->setCurrentPageNumber($page); //设置第一页显示
		        $paginator_choose->setCurrentPageNumber($this->_getParam('page')); //从url获取需要显示的页码

		        $this->view->paginator_choose = $paginator_choose;

		}
		else
		{
	 		echo "<script>alert('无权访问');location.href='/login';</script>";
	 		exit;
	 	}

	 }
	 /**
	  * 超级管理员 “修改题库”控制
	  * @return [type] [description]
	  */
	 public function queupdateAction()
	 {
	 	$session = new Zend_Session_Namespace('user');
	 	if (isset($session->depid) && $session->depid == 1)
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
	 	else
	 	{
	 		echo "<script>alert('无权访问');location.href='/login';</script>";
	 		exit;
	 	}
	 }


	/**
	* 删除题目
	*/
	public function deletequestionAction()
	{
		$session = new Zend_Session_Namespace('user');
	 	if (isset($session->depid) && $session->depid == 1)
	 	{
	 		$qeid=$this->getRequest()->getParam('qeid');

	 		$QueupdateMapper = new Application_Model_QueupdateMapper();
	 		$info = $QueupdateMapper->deleteQuestion($qeid);
	 		$this->view->info = $info;
	 		$this->_redirect("/admin/queupdate");
	 	}
	 	else
	 	{
	 		echo "<script>alert('无权访问');location.href='/login';</script>";
	 		exit;
	 	}
		

	}

	/**
	*删除资讯
	*/
	public function deletezxAction()
	{
		$session = new Zend_Session_Namespace('user');
	 	if (isset($session->depid) && $session->depid == 1)
	 	{
	 		$id=$this->getRequest()->getParam('id');

	 		//$QueupdateMapper = new Application_Model_QueupdateMapper();
			$articleMapper = new Application_Model_ArticleMapper();
	 		$info = $articleMapper->deleteZx($id);
	 		$this->view->info = $info;
	 		$this->_redirect("/admin/learninfo");
	 	}
	 	else
	 	{
	 		echo "<script>alert('无权访问');location.href='/login';</script>";
	 		exit;
	 	}
	}

	/**
	* 查找题目
	*/
	public function findquestionAction()
	{
		$session = new Zend_Session_Namespace('user');
	 	if (isset($session->depid) && $session->depid == 1)
	 	{
	 		$qeid=$this->getRequest()->getParam('qeid');
	 		$QueupdateMapper = new Application_Model_QueupdateMapper();
	 		$info = $QueupdateMapper->findQueupdateById($qeid);
	 		$info = $info[0];

	 		echo(json_encode($info));
	 		exit();
	 	}
	 	else
	 	{
	 		echo "<script>alert('无权访问');location.href='/login';</script>";
	 		exit;
	 	}
	}

	 	
	/**
	* 添加题目
	*/
	public function xxAction()
	{
		$session = new Zend_Session_Namespace('user');
	 	if (isset($session->depid) && $session->depid == 1)
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
	 	else
	 	{
	 		echo "<script>alert('无权访问');location.href='/login';</script>";
	 		exit;
	 	}
		
	}

	/**
	* 更新题目
	*/

	public function editquestionAction()
	{
		$session = new Zend_Session_Namespace('user');
	 	if (isset($session->depid) && $session->depid == 1)
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
	 	else
	 	{
	 		echo "<script>alert('无权访问');location.href='/login';</script>";
	 		exit;
	 	}

	}

	 /**
	  * 超级管理员 “学习资讯”控制
	  * @return [type] [description]
	  */
	 public function learninfoAction()
	 {
	 	$session = new Zend_Session_Namespace('user');
	 	if (isset($session->depid) && $session->depid == 1)
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
	 	else
	 	{
	 		echo "<script>alert('无权访问');location.href='/login';</script>";
	 		exit;
	 	}

	 }

	/**
	* 添加资讯
	*/
	 public function addzxAction()
	 {
	 	$session = new Zend_Session_Namespace('user');
	 	if (isset($session->depid) && $session->depid == 1)
	 	{
	 		$title = strip_tags(trim($this->getRequest()->getParam('zxtitle')));
	 		$content = strip_tags(trim($this->getRequest()->getParam('zxcontent')));
	 		$zxtitle = '';
	 		$zxcontent = '';
	 		if(!empty($title))
	 		{
	 			$zxtitle = $title;
	 			if(!empty($content))
	 			{
	 				$zxcontent = $content;
	 				$articleMapper = new Application_Model_ArticleMapper();
	 				$result = $articleMapper->addArticles($zxtitle,$zxcontent,$publisedtime,$imgurl);
	 				$this->_redirect("/admin/learninfo");
	 			}
	 		}
	 	}
	 	else
	 	{
	 		echo "<script>alert('无权访问');location.href='/login';</script>";
	 		exit;
	 	}
	 	

	 }



	 public function addarticleAction()
	 {
	 	$session = new Zend_Session_Namespace('user');
	 	if (isset($session->depid) && $session->depid == 1)
	 	{
	 		$title = $_POST['zxtitle'];
	 		$content = $_POST['zxcontent'];

	 		$articleMapper = new Application_Model_ArticleMapper();
	 		$result = $articleMapper->addArticles($title,$content,$publisedtime,$imgurl);

	 		$this->_redirect("/admin/learninfo");
	 	}
	 	else
	 	{
	 		echo "<script>alert('无权访问,重新登录');location.href='/login';</script>";
	 		exit;
	 	}

	 }

	 public function editzxAction()
	 {
	 	$session = new Zend_Session_Namespace('user');
	 	if (isset($session->depid) && $session->depid == 1)
	 	{
	 		$id = $this->_request->getParam('id');
	 		if(!empty($id))
	 		{
	 			$articleMapper = new Application_Model_ArticleMapper();
	 			$result = $articleMapper->findArticleById($id);
	 			//$title =$result['title'];
	 			//$content =$result['content'];
	 			//print_r($result);
	 			//exit();

	 			$this->view->result = $result;
	 		}
	 	}
	 	else
	 	{
	 		echo "<script>alert('无权访问');location.href='/login';</script>";
	 		exit;
	 	}
	 	//$id = $_GET['id'];
	 	//$id=4;	

	 }

	 public function editarticleAction()
	 {
	 	$session = new Zend_Session_Namespace('user');
	 	if (isset($session->depid) && $session->depid == 1)
	 	{
	 		$id = $_POST['zxid'];
	 		$title = $_POST['zxtitle'];
	 		$content = $_POST['zxcontent'];

	 		$articleMapper = new Application_Model_ArticleMapper();
	 		$result = $articleMapper->updateArticles($id,$title,$content);

	 		$this->_redirect("/admin/learninfo");
	 	}
	 	else
	 	{
	 		echo "<script>alert('无权访问');location.href='/login';</script>";
	 		exit;
	 	}
	 }
}