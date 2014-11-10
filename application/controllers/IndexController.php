<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
       // $user_agent = $_SERVER['HTTP_USER_AGENT'];
       // if (strpos($user_agent, 'MicroMessenger') === false)
       // {
       //   echo "<center><h1>请用微信客户端打开</h1></center>";
       //   exit;
       // }
       // else
       // { 

       // }
    }

    public function indexAction()
    {
        
    }

    public function registerAction()
    {

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
        //获取第几期~~
       $selectedquestionMapper = new Application_Model_SelectedquestionMapper();
       $where =2;
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
       $this->view->paginator_choose = $paginator_choose;

    }

    public function gradeAction()
    {

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

