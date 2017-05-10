<?php
namespace Home\Controller;
use Think\Controller;
class SystemController extends Controller {
    public function stu_system($name){
    	
		 //判断用户是否登陆过，通过session
        if(!isset($_SESSION['user']) && $_SESSION['user']==""){
		        	$this->redirect('Index/index');
			}
			$this->assign('name',$name);
    	$this->display();
    }
    public function doLogOut(){
    	$_SESSION=array();
	    	if(isset($_COOKIE[session_name()])){
	    		setCookie(session_name,'',time()-1,'/');
	    	}
	    	session_destroy();
	    	$this->redirect('Index/index');
	    }
    }
