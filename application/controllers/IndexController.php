<?php
header("Content-Type:text/html; charset=UTF-8");
class IndexController extends Zend_Controller_Action
{
    public function init()
    {
       // $user_agent = $_SERVER['HTTP_USER_AGENT'];//判断是否由微信客户端打开
       // if (strpos($user_agent, 'MicroMessenger') === false)
       // {
       //   echo "<h1>一定是打开方式不对，亲，请用微信客户端打开哦</h1>";
       //   exit;
       // } 
       // else
       // {
          // 接受微信用户FromUserName或者从session调用
          $session = new Zend_Session_Namespace('dyuser');
          if (isset($_GET['k']) && !empty(trim($_GET['k'])) || isset($session->userid))
          {
            if(!empty($_GET['k']))
            {
              $info = trim($_GET['k']);
            }
            else
            {
              $info = $session->userid;
            }

            // 获取最新期数数据
            $Periodset = new Application_Model_PeriodsetMapper();
            $periodsetnum = $Periodset->findPeriod();
            $this->view->periodnum = $periodsetnum[0]['periodnum'];
            $this->periodstart = $periodsetnum[0]['enrollstart'];
            $this->periodend = $periodsetnum[0]['enrollend'];
            $this->teststart = $periodsetnum[0]['able_test_start'];
            $this->testend = $periodsetnum[0]['able_test_end'];

            // 设置实名认证和报名初始状态
            $this->isverifiinfo = 0;
            $this->isregister = 0;

            $session = new Zend_Session_Namespace('dyuser');
            $session->userid = $info;

            // 根据Fromusername查询学号、手机号
            $StuverifiMapper = new Application_Model_StuverifiMapper();
            $verifiInfo = $StuverifiMapper->Getstuverifi($session->userid);
            if ($verifiInfo)
            {
              $this->isverifiinfo = 1;//完成实名认证状态为1
              $this->stuid = $verifiInfo['studentid']; //学号
              $this->phone = $verifiInfo['phone'];//手机号

              // 判断是否已经报名
              $partyStuMapper = new Application_Model_StudentMapper();
              $partystu = $partyStuMapper->getStuByid($this->stuid);
              if($partystu)
              {
                $this->isregister = 1;//已完成党校报名状态为1
              }
            }
          }
          else
          {
            echo "<h1>一定是打开方式不对，正确的姿势：关注微信合工大，点击掌上党校哦</h1>";
            exit;
          }

       // } 
    }

    public function indexAction()
    {
    }

    public function registerAction()
    {
      if ($this->isverifiinfo == 0)
      {
        $this->_redirect('/index/statuserror');
      }
      else
      {
        if ($this->isregister == 0)
        {
          //判断是否在报名日期内
          if ($this->periodstart <= date('Y-m-d') && date('Y-m-d') <= $this->periodend)
          {
            // 输出学院选择
            $departMapper = new Application_Model_DepartmentMapper();
            $depart = $departMapper->findAlldept();
            $this->view->depart = $depart;

            if ($_POST)
            {
              // 根据学号查询详细信息
              $Studentinfo = new Application_Model_StudentinfoMapper();
              $res = $Studentinfo->Getstudentinfo($this->stuid);
              $stu = $res['stuname'];
              $depart = $res['depart'];
              $this->class = $res['class'];
              $this->type = $res['type'];

              $getstuid = strip_tags(trim($this->getRequest()->getParam('stuid')));
              $getstuname = strip_tags(trim($this->getRequest()->getParam('stuname')));
              $getsex = strip_tags(trim($this->getRequest()->getParam('sex')));
              $getperiodsnum = strip_tags(trim($this->getRequest()->getParam('periodsnum')));
              $getcampus = strip_tags(trim($this->getRequest()->getParam('campus')));
              $getdepid = strip_tags(trim($this->getRequest()->getParam('depid')));
              $getclasstype = strip_tags(trim($this->getRequest()->getParam('classtype')));
              $getphone = strip_tags(trim($this->getRequest()->getParam('phone')));

              if (!empty($getstuid)&&!empty($getstuname)&&!empty($getsex)&&!empty($getperiodsnum)&&!empty($getcampus)&&!empty($getdepid)&&!empty($getclasstype)&&!empty($getphone)&&$getstuid == $this->stuid)
              {
                $departMapper = new Application_Model_DepartmentMapper();
                $departname = $departMapper->findDept($getdepid);
                $depart = $departname[0]['depname'];
                $major = $this->class;
                $type = $this->type;

                // 获取classid
                $ClassMapper = new Application_Model_ClassMapper();
                $classinfo = $ClassMapper->getClassid($getclasstype,$this->view->periodnum,$getdepid,$getcampus);
                $classid = $classinfo[0]['classid'];
                $isgood = 0;
                $isgraduate = 0;

                // 记录数据
                $partyStuMapper = new Application_Model_StudentMapper();
                $partysave = $partyStuMapper->saveStuinfo($getstuid,$getstuname,$getsex,$depart,$major,$type,$getclasstype,$getphone,$isgood,$isgraduate);
                $StuclassMapper = new Application_Model_StuclassMapper();
                $partysave = $StuclassMapper->saveStuclass($getstuid,$classid);
                if($partysave)
                {
                  echo "<script>alert('报名成功，现在去学习吧');location.href='/index';</script>";
                }
                else
                {
                  echo "<script>alert('一定是报名方式不对，让我们重新来过吧')</script>";
                }
              }
              else
              {
                echo "<script>alert('注册信息填写有误');</script>";
              }
            }
          }
          else
          {
            $this->_redirect("index/registration");
          }
        }
        else
        {
          echo "<script>alert('亲，你报过名了吧，去学习吧！');location.href='/index';</script>";
          exit;
        }
      }
    }
    
    public function registrationAction()
    {
        
    }

    public function listsAction()
    {
       $articleMapper = new Application_Model_ArticleMapper();
       $order = "publisedtime DESC";
       $where = array();
       $limit = 10;
       $arrList = $articleMapper->getArticles($where,$order,$limit);
       $this->view->arrList = $arrList;
    }

    public function testAction()
    {
      if ($this->isregister == 1)//判断是否报名
      {
       $selectedquestionMapper = new Application_Model_SelectedquestionMapper();
       $where = $this->view->periodnum;
       $same = $selectedquestionMapper->findSelectedquestionById($where);
       if ($same)
       {
         foreach($same as $key=>$values)
         {
           $qeid = $values['qeid'];
           $queupdateMapper = new Application_Model_QueupdateMapper();
           $arr= $queupdateMapper->findQueupdateById($qeid);
           $arrList[]=$arr[0];
         }

         $num=1; $page=1; //设置每一页显示的文章数目 //设置第一页显示
         $paginator_choose = new Zend_Paginator(new Zend_Paginator_Adapter_Array($arrList)); //调用分页
         $paginator_choose->setItemCountPerPage($num); //设置每一页显示的文章数目
         $paginator_choose->setCurrentPageNumber($page); //设置第一页显示
         $paginator_choose->setCurrentPageNumber($this->_getParam('page')); //从url获取需要显示的页码
         $this->view->pages = $this->_getParam('page');//根据page输出题号
         if($this->view->pages == "")
         {
          $this->view->pages = 1;
         }
         $this->view->paginator_choose = $paginator_choose;
       }
      }
      else
      {
        $this->_redirect('/index/statuserror');
        exit;
      }
    }

    public function gradeAction()
    {
      if ($this->isregister == 1)
      {
        if (date("Y-m-d") > $this->testend)
        {
          $ScoreMapper = new Application_Model_ScoreMapper();
          $gradeinfo = $ScoreMapper->GetGrade($this->stuid);
          $this->view->testgrade = $gradeinfo['testscore'];
          $this->view->totalgrade = $gradeinfo['totalscore'];
        }
        else
        {
          $this->_redirect('index/warning');
        }
        
      }
      else
      {
        $this->_redirect('/index/statuserror');
        exit;
      }
    }

    public function articleAction()
    {
      $id = $this->_request->getParam('id');
      if(!empty($id)){
        $articleMapper = new Application_Model_ArticleMapper();
        $article = $articleMapper->findArticleById($id);
        $this->view->article = $article;
      }
    }

    public function warningAction()
    {
        
    }

    public function statuserrorAction()
    {
    }
}