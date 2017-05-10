<?php
namespace Teacher\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index($name){
    	//判断用户是否登陆过，通过session
        if(!isset($_SESSION['user']) && $_SESSION['user']==""){
		        	$this->redirect('Home/Index/index');
			}
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
    //处理点击上一页，下一页获取的信息
    public function infoFn(){
    	$user=$_SESSION['user'];
    	$Info=M('Info');
    	$Login=M('Login');
    	$where['reader']=$user;
    	$page=I('post.currentPage');
    	$currentPage=$page*5;
    	$count=$Info->where($where)->count();
    	$total=ceil($count/5);
    	$list=$Info->where($where)->order('id desc')->limit($currentPage,5)->select();
    	for($i=0;$i<count($list);$i++){
    		$guanli['user']=$list[$i][user];
    		$list[$i][name]=$Login->where($guanli)->getField('name');
    		$list[$i][index]=$page+1;
    		$list[$i][total]=$total;
    	}
    	$this->ajaxReturn($list);
    }
    //点击查看详情
    public function detail(){
    	$id=I('post.id');
    	$Info=M('Info');
    	$where['id']=$id;
    	$result=$Info->where($where)->find();
    	$this->ajaxReturn($result);
    }
    //点击同意按钮来查询该老师还有多少空余时间来安排课程
    public function agreeFn(){
    	$user=$_SESSION['user'];
    	$Course=M('Course');
    	$where['teacherID']=$user;
    	$list=$Course->where($where)->select();
    	$level="";
    	for($i=0;$i<count($list);$i++){
    		if($level!=""){
    			$level=$list[$i][level].",".$level;
    		}else{
    			$level=$list[$i][level];
    		}
    	}
    	$this->ajaxReturn($level);
    }
    
    //点击确定来在course表中添加信息
    public function loadFn(){
    	$user=$_SESSION['user'];
    	$id=I("post.id");
    	$str=I("post.str");
    	$name=I('post.name');
    	$level=I('post.level');
    	$Info=M("Info");
    	$where['id']=$id;
    	$result=$Info->where($where)->find();
    	$plan=explode("|",$result[content]);
    	$content=$plan[4]."班".$str." ".$plan[5]."号楼 ".$plan[6]."*";
    	$Course=M('Course');
    	$data[name]=$plan[0];
    	$data[teacher]=$name;
    	$data[score]=$plan[1];
    	$data[plan]=$content;
    	$data[count]=$plan[7];
    	$data[type]=$plan[2];
    	$data[profession]=$plan[3];
    	$data[level]=$level;
    	$data[teacherID]=$user;
    	$add=$Course->data($data)->add();
    	if($add){
    		//发送信息给管理员并删除该条信息
    		$data1[user]=$user;
    		$data1[reader]='admin';
    		$data1[title]="选课回馈";
    		$data1[content]=$name."同意了你安排的课程，上课时间为".$str;
    		$time1=time();
    		$time2=date("Y-m-d H:i:s",$time1);
    		$data1[time]=$time2;
    		$Info->data($data1)->add();
    		$Info->where('id='.$id)->delete();
    		$this->ajaxReturn("添加课程成功,并以发送课程反馈给管理员");	
    	}
    	
    }
public function refuseFn(){
	$Info=M('Info');
	$id=I('post.id');
	$user=$_SESSION['user'];
	$name=I('post.name');
	$data1[user]=$user;
    $data1[reader]='admin';
	$data1[title]="选课回馈";
	$data1[content]=$name."拒绝了你安排的课程";
	$time1=time();
	$time2=date("Y-m-d H:i:s",$time1);
	$data1[time]=$time2;
	$Info->data($data1)->add();
	$Info->where('id='.$id)->delete();
    $this->ajaxReturn("拒绝课程成功,并以发送课程反馈给管理员");	
}

	public function knowFn(){
		$id=I('post.id');
		$Info=M('Info');
		$Info->where('id='.$id)->delete();
		$this->ajaxReturn("ok");	
	}
}