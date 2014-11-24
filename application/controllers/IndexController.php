<?php
header("Content-Type:text/html; charset=UTF-8");
class IndexController extends Zend_Controller_Action
{
    public function init()
    {
       $user_agent = $_SERVER['HTTP_USER_AGENT'];
       if (strpos($user_agent, 'MicroMessenger') === false)
       {
         echo "<h1>请用微信客户端打开</h1>";
         exit;
       }
       else
       {
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
          
            $session = new Zend_Session_Namespace('dyuser');
            $session->userid = $info;
            $stuMapper = new Application_Model_StuMapper();
            $arr = $stuMapper->Queryusername($session->userid);//查询FromUsername是否关注
            if (!empty($arr))
            {
              $isverifi = $arr[0]['isverifi'];
              // 是否实名认证
              if ($isverifi == 1)
              {
                // 根据Fromusername查询学号、手机号
                $StuverifiMapper = new Application_Model_StuverifiMapper();
                $verifiInfo = $StuverifiMapper->Getstuverifi($session->userid);
                if ($verifiInfo)
                {
                  $this->stuid = $verifiInfo['studentid']; //学号
                  $this->phone = $verifiInfo['phone'];//手机号
                  // echo $stuid;

                  $this->isregister = 0;
                  // 判断是否已经报名
                  $partyStuMapper = new Application_Model_StudentMapper();
                  $partystu = $partyStuMapper->getStuByid($this->stuid);
                  if($partystu)
                  {
                    $this->isregister = 1;
                  }
                  else
                  {
                    // // 根据学号查询详细信息
                    // $Studentinfo = new Application_Model_StudentinfoMapper();
                    // $res = $Studentinfo->Getstudentinfo($stuid);
                    // $stu = $res['stuname'];
                    // // $sexinfo = $res['sex'];
                    // // if ($sexinfo == 1)
                    // // {
                    // //   $sex = "女";
                    // // }
                    // // else
                    // // {
                    // //   $sex = "男";
                    // // }
                    // $depart = $res['depart'];
                    // $this->class = $res['class'];
                    // $this->type = $res['type'];
                    // echo $stuid.$stuname.$sex.$depart.$class.$phone;
                  } 
                }
              }
              else
              {
                echo "<h1>亲，先去<a href='http://weixin.hfutonline.net/verifi.php?k=".$session->userid."'>实名认证</a>回来才能报名哦</h1>";
                exit;
              }
            }
            else
            {
              echo "<h1>请先关注我们的公众号：微信合工大</h1>";
              exit;
            }
          }
          else
          {
            echo "<h1>一定是打开方式不对，亲，请用微信重新打开哦</h1>";
            exit;
          }

       }
    }

    public function indexAction()
    {
    }

    public function registerAction()
    {
      $periodnum = "53";
      if ($this->isregister == 0)
      {
       if ($periodnum >= 52)//模拟最新一期时间判断是否可以报名
       {
        // 输出学院选择
        $departMapper = new Application_Model_DepartmentMapper();
        $depart = $departMapper->findAlldept();
        $this->view->depart = $depart;

        // 接受表单数据
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

          // echo "<script>alert('".$getstuid."/".$getstuname."/".$getsex."/".$getperiodsnum."/".$getdepid."/".$this->type."/".$getclasstype."/".$getphone."/".$this->stuid."');</script>";

          if (!empty($getstuid)&&!empty($getstuname)&&!empty($getsex)&&!empty($getperiodsnum)&&!empty($getcampus)&&!empty($getdepid)&&!empty($getclasstype)&&!empty($getphone)&&$getstuid == $this->stuid)
          {
            $departMapper = new Application_Model_DepartmentMapper();
            $departname = $departMapper->findDept($getdepid);
            $depart = $departname[0]['depname'];
            $major = $this->class;
            $type = $this->type;

            // 获取classid
            $ClassMapper = new Application_Model_ClassMapper();
            $classinfo = $ClassMapper->getClassid($getclasstype,$getperiodsnum,$getdepid,$getcampus);
            $classid = $classinfo[0]['classid'];

            // echo "<script>alert('".$getstuid."/".$getstuname."/".$getsex."/".$depart."/".$major."/".$type."/".$getclasstype."/".$classid."/".$getphone."/".$getcampus."');</script>";

            // 记录数据
            $partyStuMapper = new Application_Model_StudentMapper();
            $partysave = $partyStuMapper->saveStuinfo($getstuid,$getstuname,$getsex,$depart,$major,$type,$getclasstype,$classid,$getphone);
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
        //获取第几期~~
       $selectedquestionMapper = new Application_Model_SelectedquestionMapper();
       $where =1;
       $same = $selectedquestionMapper->findSelectedquestionById(2);
      foreach($same as $key=>$values) {
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
     else
     {
       echo '<script>alert("亲，你报名了没？");location.href="/index";</script>';
       exit;
     }

    }

    public function gradeAction()
    {
      if ($this->isregister == 1)
      {
        $partyStuMapper = new Application_Model_StudentMapper();
        $gradeinfo = $partyStuMapper->GetGrade($this->stuid);
        $this->view->grade = $gradeinfo['grade'];
        $this->view->partygrade = $gradeinfo['partygrade'];
      }
      else
      {
        echo '<script>alert("亲，你报名了没？");location.href="/index";</script>';
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
}