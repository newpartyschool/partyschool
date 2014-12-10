<?php

class AdminController extends Zend_Controller_Action
{
	 public function init()
	 {
	 	// 获取最新期数数据
	 	$Periodset = new Application_Model_PeriodsetMapper();
	 	$periodsetnum = $Periodset->findPeriod();
	 	$this->view->periodnum = $periodsetnum[0]['periodnum'];
	 	$this->periodstart = $periodsetnum[0]['enrollstart'];
	 	$this->periodend = $periodsetnum[0]['enrollend'];
	 	$this->teststart = $periodsetnum[0]['able_test_start'];
	 	$this->testend = $periodsetnum[0]['able_test_end'];
	 	$this->sum_start = $periodsetnum[0]['sum_start'];
	 	$this->sum_end = $periodsetnum[0]['sum_end'];
	 }

	 /**
	  * 党校总结控制
	  * @return [type] [description]
	  */
	 public function dxzjAction()
	 {
	 	$session = new Zend_Session_Namespace('user');
	 	$this->view->realname = $session->realname;
	 	if (isset($session->depid)&&$session->depid != 1)
	 	{
	 		// 获取班级数据
	 		$userid = $session->userid;
	 		$ClassMapper = new Application_Model_ClassMapper();
	 		$classinfo = $ClassMapper->findClassInfo($userid);
	 		if ($classinfo)
	 		{
	 			$this->view->classid = $classid = $classinfo[0]['classid'];
	 			$this->view->periodsnum =$classinfo[0]['periodsnum'];
	 			$this->view->campus = $classinfo[0]['campus'];
	 			$this->view->depid = $classinfo[0]['depid'];
	 			$this->view->classtype =$classinfo[0]['classtype'];

	 			//查询学院信息
	 			$DepartmentMapper = new Application_Model_DepartmentMapper();
	 			$depInfo = $DepartmentMapper->findDept($this->view->depid);
	 			$this->view->depname = $depInfo[0]['depname'];

	 			///学员信息输出
	 			$StuclassMapper = new Application_Model_StuclassMapper();
	 			$stuclass = $StuclassMapper->getStnoByclass($classid);
	 			$stno = array();
	 			$stno = $stuclass;
	 			$StudentMapper = new Application_Model_StudentMapper();
	 			$order = "stno DESC";
	 			
	 			$limit = null;
	 			if (!empty($stno))
	 			{
	 				$arrList = $StudentMapper->getStuinfo($stno,$order,$limit);
	 				if ($arrList)
	 				{
	 					$num=5; $page=1; //设置每一页显示学生信息数目 //设置第一页显示
	 					$paginator_studentinfo = new Zend_Paginator(new Zend_Paginator_Adapter_Array($arrList)); //调用分页
	 					$paginator_studentinfo->setItemCountPerPage($num); //设置每一页显示的学生信息数目
	 					$paginator_studentinfo->setCurrentPageNumber($page); //设置第一页显示
	 					$paginator_studentinfo->setCurrentPageNumber($this->_getParam('page')); //从url获取需要显示的页码
	 					$this->view->paginator_studentinfo = $paginator_studentinfo;
	 				}

	 				//获取班级优秀学员
	 				$goodstudent = $StudentMapper->Showgood($stno);
	 				$this->view->goodstuName = $goodstudent;
	 			}
	 			
	 			// 获取党校总结数据
	 			$ClassummaryMapper = new Application_Model_ClassummaryMapper();
	 			$dxInfo  = $ClassummaryMapper->dxzjdata($this->view->classid);
	 			$this->view->xysz    = $dxInfo['xysz'];
	 			$this->view->study   = $dxInfo['study'];
	 			$this->view->taolun  = $dxInfo['taolun'];
	 			$this->view->shijian = $dxInfo['shijian'];

	 			if (isset($_POST['xy-sz']))
	 			{
	 				//判断是否在总结时间内
	 				if (date("Y-m-d") <= $this->sum_end && date("Y-m-d") >= $this->sum_start)
	 				{
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
	 							echo "<script>alert('已提交');location.href='/admin/dxzj';</script>";
	 						}
	 					}
	 				}
	 				elseif (date("Y-m-d") > $this->sum_end)
	 				{
	 					echo "<script>alert('总结时间已经过了哦');</script>";
	 				}
	 				elseif (date("Y-m-d") < $this->sum_start)
	 				{
	 					echo "<script>alert('总结时间还没到哦');</script>";
	 				}
	 			}
	 		}
	 	}
	 	else
	 	{
	 		echo "<script>alert('无权访问');location.href='/login'</script>";
	 		exit;
	 	}
	 }

	 /**
	  * 班主任添加学员
	  * @return [type] [description]
	  */

	 public function addstuAction()
	 {
	 	$session = new Zend_Session_Namespace('user');
	 	if (isset($session->depid) && $session->depid != 1)
	 	{
	 		$stuNo = strip_tags(trim($this->getRequest()->getParam('stuNo')));
	 		$stuName = strip_tags(trim($this->getRequest()->getParam('stuName')));
	 		$stuTel = strip_tags(trim($this->getRequest()->getParam('stuTel')));
	 		$stuGender = strip_tags(trim($this->getRequest()->getParam('stuGender')));
	 		$isGood = strip_tags(trim($this->getRequest()->getParam('isGood')));
	 		$isGradute = strip_tags(trim($this->getRequest()->getParam('isGradute')));
	 		if ($_POST)
	 		{

	 		 if (!empty($stuNo) && !empty($stuName) && !empty($stuTel) && !empty($stuGender) && !empty($isGood) && !empty($isGradute))
	 		 {
	 		 	// 获取班级数据
	 		 	
	 		 	if (isset($session->userid))
	 		 	{
	 		 		$userid = $session->userid;
	 		 		$ClassMapper = new Application_Model_ClassMapper();
	 		 		$classinfo = $ClassMapper->findClassInfo($userid);
	 		 		if ($classinfo)
	 		 		{
	 		 		    // 获取班级数据
	 		 			$classid = $classid = $classinfo[0]['classid'];
	 		 			$periodsnum =$classinfo[0]['periodsnum'];
	 		 			$campus = $classinfo[0]['campus'];
	 		 			$depid = $classinfo[0]['depid'];
	 		 			$classtype =$classinfo[0]['classtype'];

	 		 			$StuclassMapper = new Application_Model_StuclassMapper();
	 		 			$arr = $StuclassMapper->checkStuclass($stuNo,$classid);
	 		 			if ($arr)
	 		 			{
	 		 				$msg = 0;//已存在该学生
	 		 			}
	 		 			else
	 		 			{
	 		 				$StudentinfoMapper = new Application_Model_StudentinfoMapper();
	 		 				$res = $StudentinfoMapper->Getstudentinfo($stuNo);
	 		 				if (empty($res))
	 		 				{
	 		 					$msg = 1;//学号不存在
	 		 				}
	 		 				else
	 		 				{
	 		 					//查询学院信息
	 		 					$DepartmentMapper = new Application_Model_DepartmentMapper();
	 		 					$depInfo = $DepartmentMapper->findDept($depid);
	 		 					$depname = $depInfo[0]['depname'];

	 		 					//获取$type $major
	 		 					$major = $res['class'];
	 		 					$type = $res['type'];
	 		 					// score表课程名字
	 		 					$courseid = 1;
	 		 					if ($classtype == '党员班')
	 		 					{
	 		 						$courseid = 2;
	 		 					}
	 		 					// $msg = 3;

	 		 					// 后台添加数据
	 		 					$StudentMapper = new Application_Model_StudentMapper();
	 		 					$student = $StudentMapper->saveStuinfo($stuNo,$stuName,$stuGender,$depname,$major,$type,$classtype,$stuTel,$isGood,$isGradute);
	 		 					$StuclassMapper = new Application_Model_StuclassMapper();
	 		 					$savestuclass = $StuclassMapper->saveStuclass($stuNo,$classid);
	 		 					$ScoreMapper =new Application_Model_ScoreMapper();
	 		 					$score =$ScoreMapper->addScore($stuNo,$courseid);

	 		 					if ($student && $savestuclass && $score)
	 		 					{
	 		 						$msg = 2;//添加成功
	 		 					}
	 		 					else
	 		 					{
	 		 						$msg = 3;//学号存在但添加不成功
	 		 					}
	 		 				}
	 		 			}
	 		 		}
	 		 		else
	 		 		{
	 		 			$msg = 5;//没有此班级
	 		 		}
	 		 	}
	 		 	else
	 		 	{
	 		 		$msg = 6;//session已注销，重新登录
	 		 	}
	 		 }
	 		 else
	 		 {
	 		 	$msg = 4;//提交数据不全
	 		 }
	 		 $this->view->result = $msg;//返回状态参数
	 		}
	 	}
	 }

	 /**
	  * 删除学员控制
	  * @return [type] [description]
	  */
	 public function delstuAction()
	 {
	 	$session = new Zend_Session_Namespace('user');
	 	if (isset($session->depid))
	 	{
	 		if ($_POST)
	 		{
	 			$studel = $_POST['del'];
	 			if (!empty($studel))
	 			{
	 				$StudentMapper = new Application_Model_StudentMapper();
	 				$delStu = $StudentMapper->delStu($studel);
	 				$StuclassMapper = new Application_Model_StuclassMapper();
	 				$delStu = $StuclassMapper->delStuclass($studel);
	 				$ScoreMapper =new Application_Model_ScoreMapper();
	 				$delStu =$ScoreMapper->delScore($studel);
	 				if ($delStu)
	 				{
	 					$this->view->delmsg = '1';//返回删除成功状态
	 				}
	 				else
	 				{
	 					$this->view->delmsg = '2';//返回删除失败状态
	 				}
	 			}
	 			else
	 			{
	 				$this->view->delmsg = '0';//返回提交数据不全
	 			}
	 		}
	 	}
	 }

	 /**
	  * 修改学员状态控制
	  * @return [type] [description]
	  */
	 public function changestatusAction()
	 {
	 	$session = new Zend_Session_Namespace('user');
	 	if (isset($session->depid))
	 	{
	 		if ($_POST)
	 		{
	 			$stno = strip_tags(trim($_POST['stno']));

	 			//判断修改结业状态还是优秀状态
	 			if (isset($_POST['isgraduate']))
	 			{
	 				$isgraduate = strip_tags(trim($_POST['isgraduate']));	
	 			}
	 			if (isset($_POST['isgood']))
	 			{
	 				$isgood = strip_tags(trim($_POST['isgood']));
	 			}

	 			$StudentMapper = new Application_Model_StudentMapper();
	 			if (!empty($stno) && !empty($isgraduate))
	 			{
	 				if ($isgraduate == '已结业')
	 				{
	 					$isgraduate = 0;//现状态为已结业则isgraduate改为0
	 				}
	 				else
	 				{
	 					$isgraduate = 1;//现状态为未结业则isgraduate改为1
	 				}
	 				//修改状态
	 				$graduateInfo = $StudentMapper->changeGraduate($stno,$isgraduate);
	 				if ($graduateInfo)
	 				{
	 				    $this->view->statusmsg = '1';//修改结业状态成功
	 				}
	 				else
	 				{
	 					$this->view->statusmsg = '10';//结业状态修改失败
	 				}
	 			}
	 			elseif (!empty($stno) && !empty($isgood))
	 			{
	 				if ($isgood == '优&nbsp;&nbsp;&nbsp;秀')
	 				{
	 					$isgood = 0;//如果现状态为已结业则isgood改为0
	 				}
	 				else
	 				{
	 					$isgood = 1;//如果现状态为未结业则isgood改为1
	 				}
	 				//修改优秀状态
	 				$goodInfo = $StudentMapper->changeGood($stno,$isgood);
	 				if ($goodInfo)
	 				{
	 				    $this->view->statusmsg = '2';//修改优秀状态成功
	 				}
	 				else
	 				{
	 					$this->view->statusmsg = '20';//修改优秀状态失败
	 				}
	 			}
	 			else
	 			{
	 				$this->view->statusmsg = '0';
	 			}
	 		}
	 	}
	 }

	 /**
	  * 获取优秀学员
	  * @return [type] [description]
	  */
	 public function showgoodAction()
	 {
	 	if (isset($_POST['stno']))
	 	{
	 		$stno = strip_tags(trim($_POST['stno']));
	 		if(!empty($stno))
	 		{
	 		   //由学号获取所在clssid
	 		   $StuclassMapper = new Application_Model_StuclassMapper();
	 		   $getStuinfo = $StuclassMapper->getClassBystno($stno);
	 		   if ($getStuinfo)
	 		   {
	 		   	  $classid = $getStuinfo['classid'];

	 		   	  $StuclassMapper = new Application_Model_StuclassMapper();
	 		   	  $stuclass = $StuclassMapper->getStnoByclass($classid);
	 		   	  $stno = array();
	 		   	  $stno = $stuclass;

	 		   	  //获取班级优秀学员
	 		   	  $StudentMapper = new Application_Model_StudentMapper();
	 		   	  $goodstudent = $StudentMapper->Showgood($stno);
	 		   	  $goodstuName = $goodstudent;
	 		   	  if ($goodstuName)
	 		   	  {
	 		   	  	foreach ($goodstuName as $stu)
	 		   	  	{
	 		   	  		echo $stu['name'].'&nbsp;&nbsp;';
	 		   	  	}
	 		   	  }
	 		   	  else
	 		   	  {
	 		   	  	echo "&nbsp;";
	 		   	  }
	 		   }
	 		}
	 	}
	 }

	 /**
	  * 班主任个人信息修改控制
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

	 		$userid = $session->userid;
	 		$ClassMapper = new Application_Model_ClassMapper();
	 		$classinfo = $ClassMapper->findClassInfo($userid);
	 		$classid = $classinfo[0]['classid'];
	 		$this->view->periodsnum = $classinfo[0]['periodsnum'];

	 		if (!empty($newpwd) || !empty($realname))
	 		{
	 			if ($newpwd == $repwd)
	 			{
	 				$session = new Zend_Session_Namespace('user');
	 				$userid = $session->userid;
	 				$UserMapper = new Application_Model_UserMapper();
	 				$arr = $UserMapper->modifyUserInfo($realname,$userid,md5($newpwd));
	 				if ($arr)
	 				{
	 					echo "<script>alert('修改成功');</script>";
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
	 	$session = new Zend_Session_Namespace('user');
	 	$this->realname = $session->realname;
	 	if (isset($session->depid)&&$session->depid != 1)
	 	{
	 		// 获取班级数据
	 		$teacher = $session->userid;
	 		$ClassMapper = new Application_Model_ClassMapper();
	 		$classinfo = $ClassMapper->findClassInfo($teacher);
	 		$classid = $classid = $classinfo[0]['classid'];
	 		$campus = $classinfo[0]['campus'];
	 		$depid = $classinfo[0]['depid'];
	 		$classtype =$classinfo[0]['classtype'];

	 		//查询学院名称
	 		$DepartmentMapper = new Application_Model_DepartmentMapper();
	 		$depInfo = $DepartmentMapper->findDept($depid);
	 		$depname = $depInfo[0]['depname'];

	 		//按照最新报名时间查询期数
	 		$periodsetMapper = new Application_Model_PeriodsetMapper();
	 		$periodnum = $periodsetMapper->findPeriod();
	 		$periodnum = $periodnum[0]['periodnum'];

	 		//获取班级总结数据
	 		$ClassummaryMapper = new Application_Model_ClassummaryMapper();
	 		$dxInfo  = $ClassummaryMapper->dxzjdata($classid);
	 		$xysz    = $dxInfo['xysz'];
	 		$study   = $dxInfo['study'];
	 		$taolun  = $dxInfo['taolun'];
	 		$shijian = $dxInfo['shijian'];

	 		$xls = new Application_Model_ExcelXml('UTF-8',false,'党校总结');
	 		$data = array(
	 		1 => array('期数','学院','校区','学员素质','学习情况','讨论情况','实践活动情况'),
	 		2 => array('第'.$periodnum.'期',$depname,$campus,$xysz,$study,$taolun,$shijian),
	 		3 => array('姓名','学号','年级','手机号','是否优秀','是否毕业','分数'),
	 		4 => array('测试1','2013211121','本科','11111111111','非优秀','未毕业','82'),	
	 		5 => array('测试2','2013222113','本科','11111111111','优秀','未毕业','89'),
	 		6 => array('测试1','2013211121','本科','11111111111','非优秀','未毕业','81'),
	 		7 => array('测试1','2013214431','本科','11111111111','非优秀','未毕业','80'),
	 		8 => array('测试1','2013214621','本科','11111111111','非优秀','未毕业','90')
	 		);

	 		if (!empty($data))
	 		{
	 			$xls->addArray($data);
	 			// $xlsname = "第".$periodnum."期".$depname."党校总结基本信息汇总";
	 			$xls->generateXML(date('Ymd'));
	 		}
	 		else
	 		{
	 			exit;
	 		}
	 		
	 	}
	 	else
	 	{
	 		echo "<script>alert('无权限访问');location.href='/login';</script>";
	 		exit;
	 	}
	 	// require_once 'excel.class.php';
	 	
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

		 		if ($result)
		 		{
		 		    //初始化user表
		 			$UserMapper = new Application_Model_UserMapper();
		 			$recover = $UserMapper->recover();

		 			if($recover)
		 			{
		 			    //更新class表
		 				$ClassMapper = new Application_Model_ClassMapper();
		 				$refresh = $ClassMapper->refresh($periodnum);
		 				if ($refresh)
		 				{
		 					echo "<script>alert('设置成功');</script>";
		 				}
		 			}
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
	 		// 输出学院选择
            $departMapper = new Application_Model_DepartmentMapper();
            $depart = $departMapper->findAlldept();
            $this->view->depart = $depart;
            $this->view->alert = "可按上面条件查询各班级情况";
            if (isset($_GET['periodnum'])&&isset($_GET['xiaoqu'])&&isset($_GET['xueyuan'])&&isset($_GET['banji']))
            {
            	$periodnum = strip_tags(trim($_GET['periodnum']));
            	$campus = strip_tags(trim($_GET['xiaoqu']));
            	$depid = strip_tags(trim($_GET['xueyuan']));
            	$classtype = strip_tags(trim($_GET['banji']));
            	if (!empty($periodnum) && !empty($campus) && !empty($depid) && !empty($classtype))
            	{
            		$departMapper = new Application_Model_DepartmentMapper();
            		$depart = $departMapper->findDept($depid);
            		$depname = $depart[0]['depname'];

            		//查询班级ID
            		$campus = $campus."校区";
            		$ClassMapper = new Application_Model_ClassMapper();
            		$classinfo = $ClassMapper->getClassid($classtype,$periodnum,$depid,$campus);
            		if ($classinfo)
            		{
            			$classid = $classinfo[0]['classid'];
            			// $this->view->classteacher = $classinfo[0]['teachername'];

            			// 获取党校总结数据
            			$ClassummaryMapper = new Application_Model_ClassummaryMapper();
            			$dxInfo  = $ClassummaryMapper->dxzjdata($classid);
            			$this->view->xysz    = $dxInfo['xysz'];
            			$this->view->study   = $dxInfo['study'];
            			$this->view->taolun  = $dxInfo['taolun'];
            			$this->view->shijian = $dxInfo['shijian'];

            			$StuclassMapper = new Application_Model_StuclassMapper();
            			$stuclass = $StuclassMapper->getStnoByclass($classid);
            			$stno = array();
            			$stno = $stuclass;
            			$StudentMapper = new Application_Model_StudentMapper();
            			$order = "stno DESC";
            			$limit = null;
            			if (!empty($stno))
            			{
            				$arrList = $StudentMapper->getStuinfo($stno,$order,$limit);
            				if ($arrList)
            				{
            					$num=5; $page=1; //设置每一页显示学生信息数目 //设置第一页显示
            					$paginator_studentinfo = new Zend_Paginator(new Zend_Paginator_Adapter_Array($arrList)); //调用分页
            					$paginator_studentinfo->setItemCountPerPage($num); //设置每一页显示的学生信息数目
            					$paginator_studentinfo->setCurrentPageNumber($page); //设置第一页显示
            					$paginator_studentinfo->setCurrentPageNumber($this->_getParam('page')); //从url获取需要显示的页码
            					$this->view->paginator_studentinfo = $paginator_studentinfo;
            					$this->view->alert = "第".$periodnum."期&nbsp;".$campus."&nbsp;".$depname."&nbsp;".$classtype.'<span style="display:inline-block;width:360px;"></span>双击可修改成绩';

            					//获取班级优秀学员
            					$goodstudent = $StudentMapper->Showgood($stno);
            					$this->view->goodstuName = $goodstudent;
            				}
            				else
            				{
            					$this->view->alert = "您查找的班级为：第".$periodnum."期&nbsp;".$campus."&nbsp;".$depname."&nbsp;".$classtype."<br>该班级暂无数据";
            				}
            		    }
            		    else
            		    {
            		    	$this->view->alert = "您查找的班级为：第".$periodnum."期&nbsp;".$campus."&nbsp;".$depname."&nbsp;".$classtype."<br>该班级暂无数据";
            		    }
            		}
            		else
            		{
            			$this->view->alert = "您查找的班级为：第".$periodnum."期&nbsp;".$campus."&nbsp;".$depname."&nbsp;".$classtype."<br>请检查查询条件，我们没有找到这个班级的信息";
            		}
            	}
            }
	 	}
	 	else
	 	{
	 		echo "<script>alert('无权访问');location.href='/login';</script>";
	 		exit;
	 	}
	 }

	 /**
	  * 超级管理员修改学员成绩控制
	  * @return [type] [description]
	  */
	 public function changescoreAction()
	 {
	 	if (isset($_POST['stno'])&&isset($_POST['score']))
	 	{
            $stno = strip_tags(trim($_POST['stno']));
            $score = strip_tags(trim($_POST['score']));
            $ScoreMapper = new Application_Model_ScoreMapper();
            $stuScore = $ScoreMapper->changeScore($stno,$score);
            if ($stuScore)
            {
            	$this->view->msg = 1;
            }
            else
            {
            	$this->view->msg = 10;
            }
        }
        else
        {
        	$this->view->msg = 0;
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
	 		if (isset($_POST['timu'])&&isset($_POST['ansA'])&&isset($_POST['ansB'])&&isset($_POST['ansC'])&&isset($_POST['ansD'])&&isset($_POST['rightAns']))
	 		{
	 			$qetitle = $_POST['timu'];
	 			$ansA = '（A）'.trim($_POST['ansA']);
	 			$ansB = '（B）'.trim($_POST['ansB']);
	 			$ansC = '（C）'.trim($_POST['ansC']);
	 			$ansD = '（D）'.trim($_POST['ansD']);
	 			$ansY = '（'.trim($_POST['rightAns']).'）';

	 			$queupdateMapper = new Application_Model_QueupdateMapper();
	 			$result = $queupdateMapper->addQuestion($qetitle,$ansA,$ansB,$ansC,$ansD,$ansY);
	 			echo $result;
	 			exit();
	 		}
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