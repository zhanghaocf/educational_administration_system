<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index($name){
    	$this->assign('name',$name);
    	$user=$_SESSION['user'];
    	$this->assign('name',$name);
    	$Info=M('Info');
    	$Login=M('Login');
    	$where['reader']=$user;
    	$count=$Info->where($where)->count();
    	$list=$Info->where($where)->order('id desc')->limit(0,5)->select();
    	for($i=0;$i<count($list);$i++){
    		$guanli['user']=$list[$i][user];
    		$list[$i][name]=$Login->where($guanli)->getField('name');
    	}
    	//共有几页
    	$total=ceil($count/5);
    	$this->assign('total',$total);
    	$this->assign('count',$count);
    	$this->assign('list',$list);
       	$this->display();
		
    }
}