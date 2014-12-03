<?php
class LoginController extends Zend_Controller_Action
{
	public function init()
	{

	}

	public function indexAction()
	{
        
	}

	/**
	 *  验证登录
	 * @return [type] [description]
	 */
	public function loginAction()
	{
		$username = strip_tags(trim($this->getRequest()->getParam('username')));
        $password = strip_tags(trim($this->getRequest()->getParam('password')));
        
        $UserMapper = new Application_Model_UserMapper();
        $arr = $UserMapper->checkUser($username,md5($password));
        if(!empty($arr)){
        	$deptMapper = new Application_Model_DepartmentMapper();
        	$depid = $arr[0]['department'];
        	$arrDept = $deptMapper->findDept($depid);
        	if(!empty($arrDept)){
        		$depname = $arrDept[0]['depname'];
        	}

        	$session = new Zend_Session_Namespace('user');
        	$session->userid = $arr[0]['userid'];
        	$session->username = $arr[0]['username'];
        	$session->realname = $arr[0]['realname'];
        	$session->depid = $arr[0]['depid'];
        	$session->depname = $depname;

        	if($this->getRequest()->getParam('remember') == 'on'){
        		$session->setExpirationSeconds(3600);
        	}else{
        		$session->setExpirationSeconds(1800);
        	}
            if ($session->depid == 1) {
                $this->_redirect('/admin/baseset');
            }
            else{
                $this->_redirect('/admin/dxzj');
            }
        }else{
        	$string = "<meta http-equiv='content-type' content='text/html; charset=UTF-8'><script language=\"JavaScript\">alert(\"未授权用户！\");location.href = \"/login\";</script>";
            echo $string;
            exit;
        }

	}
	// 注销
	public function logoutAction()
	{
		$type = $this->_request->getParam("type");

		if ($type == 'noalert') {
			$session = new Zend_Session_Namespace('user');
			unset($_SESSION);
			$_SESSION=array();
            session_destroy();
            $this->_redirect('/login');
            exit;
		}else{
			// $this->_helper->layout->disableLayout();
			$session = new Zend_Session_Namespace('user');
            unset($_SESSION);
            $_SESSION=array();
            session_destroy();
            $string = "<meta http-equiv='content-type' content='text/html; charset=UTF-8'><script language=\"JavaScript\">alert(\"注销成功！\");location.href = \"/login\";</script>";
            echo $string;
            exit;
		}
	}
}