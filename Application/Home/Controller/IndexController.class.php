<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
       $this->display();
    }
    public function yanzheng(){
    	$config =    array(
		    'fontSize'    =>    35,    // 验证码字体大小
		    'length'      =>    5,     // 验证码位数
		    'fontttf' => '5.ttf',
		    'codeSet' => '0123456789' 
		);
		$Verify =     new \Think\Verify($config);
		$Verify->entry();
    }
    
    public function check_verify($code){
		    $verify = new \Think\Verify();
		    return $verify->check($code);
		  }
		  
	public function login(){
		$user=I('post.user');
		$pass=I('post.pass');
		$code=I('post.code');
		$result=$this->check_verify($code);
		if($result){
			$login=M('Login');
			$where['user']=$user;
			$where['pass']=$pass;
			$data = $login->where($where)->find();
			if($data){
				//判断权限
				if($data[q]==0){
					$_SESSION['user']=$user;
					$_SESSION['q']=$data[q];
					$_SESSION['nianji']="20".substr($user,0,2);
					$_SESSION['profession']=$data[zhuanye];
					$str="/Home/System/stu_system/name/".$data[name];
					echo $str;
				}else if($data[q]==1){
					$_SESSION['q']=$data[q];
					$_SESSION['user']=$user;
					$str="/Teacher/Index/index/name/".$data[name];
					echo $str;
				}else if($data[q]==2){
					$_SESSION['user']=$user;
					$str="/Admin/Index/index/name/".$data[name];
					echo $str;
				}
			}else{
				echo "1";
			}
		}else{
			echo false;
		}
	}
}