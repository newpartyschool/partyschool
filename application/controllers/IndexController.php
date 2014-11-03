<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
       $user_agent = $_SERVER['HTTP_USER_AGENT'];
       if (strpos($user_agent, 'MicroMessenger') === false)
       {
         echo "<center><h1>请用微信客户端打开</h1></center>";
         exit;
       }
       else
       {

       }
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

