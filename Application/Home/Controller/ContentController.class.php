<?php
namespace Home\Controller;
use Think\Controller;
class ContentController extends Controller {
	//所有成绩页面
	public function all_exam(){
		$user=$_SESSION[user];
		$Login=M('Login');
		$where['user']=$user;
		$result=$Login->where($where)->find();
		$gradeId=$result['gradeid'];
		$gradeIdArr=explode(',',$gradeId);
		$exam=array();
		if($gradeId){
			for($i=0;$i<count($gradeIdArr);$i++){
				$Grade=M('Grade'.$gradeIdArr[$i]);
				$where1['user']=$user;
				$list=$Grade->where($where1)->find();
				$exam[]=$list;
			}
		}
		$this->assign('list',$exam);
		$this->assign('count',count($exam));
		$this->display();
	}
	//期末成绩页面
    public function final_exam(){
    	$this->display();
    }
    //网上选课页面
    public function xuanke(){
    	$this->display();
    }
    public function xuankeContent(){
    	$nianji=$_SESSION[nianji];
    	$user=$_SESSION[user];
    	$profession=$_SESSION[profession];
    	$Course=M('Course');
    	$list = $Course->where('profession="'.$profession.'"')->select();
    	$list1=$Course->where('profession="all"')->select();
    	$Login=M('Login');
    	$where['user']=$user;
    	$courseID=$Login->where($where)->getField("courseID");
    	$this->assign('list',$list);
    	$this->assign('list1',$list1);
    	$this->assign('courseID',$courseID);
    	$this->assign('nianji',$nianji);
    	$this->assign('profession',$profession);
    	$this->display();
    }
    public function xuankeContent1(){
    	$profession=I('post.pro');
    	$user=$_SESSION[user];
    	$Course=M('Course');
    	$list = $Course->where('profession="'.$profession.'"')->select();
    	$list1=$Course->where('profession="all"')->select();
    	for($j=0;$j<count($list1);$j++){
    		$list[]=$list1[$j];
    	}
    	$Login=M('Login');
    	$where['user']=$user;
    	$courseID=$Login->where($where)->getField("courseID");
    	for($i=0;$i<count($list);$i++){
    		$list[$i][courseID]=$courseID;
    	}
    	$this->ajaxReturn($list);
    }
    //点击未选
    public function weixuan(){
    	$bol1=true;
    	$bol=true;
    	$user=$_SESSION[user];
    	$cId=I('post.cId');
    	$Course=M('Course');
    	$where['id']=$cId;
    	$level=$Course->where($where)->getField('level');
    	$Login=M('Login');
    	$cIdStr=$Login->where('user='.$user)->getField('courseID');
    	$courseL=$Login->where('user='.$user)->getField('courseL');
    	if($cIdStr==null){
    		$cIdStr=$cId;
    	}else{
    		$arr1=explode(",",$cIdStr);
    		for($i=0;$i<count($arr1);$i++){
    			if($arr1[$i]==$cId){
    				$bol=false;
    				break;
    			}
    		}
    		if($bol){
    			$cIdStr=$cIdStr.",".$cId;
    		}else{
    			echo "本课程已选";
    		}
    	}
    	if($bol){
    		if($courseL==null){
    			$courseL=$level;
		    	}else{
		    		$arr2=explode(",",$courseL);
		    		$arr3=explode(",",$level);
		    		for($i=0;$i<count($arr3);$i++){
		    			for($j=0;$j<count($arr2);$j++){
		    				if($arr3[$i]==$arr2[$j]){
		    					$bol1=false;
		    					break;
		    				}
		    			}
		    		}
		    		if($bol1){
		    			$courseL=$courseL.",".$level;
		    		}else{
		    			echo "本课程时间冲突";
		    		}
		    	}
    	}
    	if($bol&&$bol1){
	    	$data['courseID']=$cIdStr;
	    	$data['courseL']=$courseL;
	    	$result=$Login->where('user='.$user)->save($data);
	    	if($result){
	    		echo "成功选课";
	    	}else{
	    		echo "选课失败";
	    	}
	    }
    }
    
    //上课课表页面
    public function schedule(){
    	$user=$_SESSION[user];
    	$q=$_SESSION[q];
    	if($q==0){
	    	$Login=M('Login');
	    	$where['user']=$user;
	    	$courseID=$Login->where($where)->getField("courseID");
	    	$Course=M('Course');
	    	$listStr="";
	    	$listStr1="";
	    	$listStr2="";
	    	if(!($courseID==null)){
	    		$arr=explode(",",$courseID);
	    		for($i=0;$i<count($arr);$i++){
	    			$data['id']=$arr[$i];
	    			$list1=$Course->where($data)->getField('name');
	    			$list2=$Course->where($data)->getField('plan');
	    			$list3=$Course->where($data)->getField('level');
	    			if($listStr==""){
	    				$listStr=$list1;
	    			}else{
	    				$listStr=$listStr.",".$list1;
	    			}
	    			if($listStr1==""){
	    				$listStr1=$list2;
	    			}else{
	    				$listStr1=$listStr1."|".$list2;
	    			}
	    			if($listStr2==""){
	    				$listStr2=$list3;
	    			}else{
	    				$listStr2=$listStr2."|".$list3;
	    			}
	    		}
	    	}
	    }else if($q==1){
	    	$Course=M('Course');
	    	$where['teacherID']=$user;
	    	$result=$Course->where($where)->select();
	    	$listStr="";
	    	$listStr1="";
	    	$listStr2="";
	    	if($result){
	    		for($i=0;$i<count($result);$i++){
	    			$list1=$result[$i][name];
	    			$list2=$result[$i][plan];
	    			$list3=$result[$i][level];
	    			if($listStr==""){
	    				$listStr=$list1;
	    			}else{
	    				$listStr=$listStr.",".$list1;
	    			}
	    			if($listStr1==""){
	    				$listStr1=$list2;
	    			}else{
	    				$listStr1=$listStr1."|".$list2;
	    			}
	    			if($listStr2==""){
	    				$listStr2=$list3;
	    			}else{
	    				$listStr2=$listStr2."|".$list3;
	    			}
	    		}
	    	}
	    }
    	$this->assign('list',$listStr);
    	$this->assign('plan',$listStr1);
    	$this->assign('level',$listStr2);
    	$this->display();
    }
    //修改密码页面
    public function xPass(){
//  	$user=$_SESSION[user];
//  	$Login=M('Login');
    	$this->display();
    }
    //验证原密码是否对得
    public function yanOldPass(){
    	$user=$_SESSION[user];
    	$pass=I('post.pass');
    	$Login=M('Login');
    	$where['user']=$user;
    	$where['pass']=$pass;
    	$result=$Login->where($where)->find();
    	if($result){
    		$this->ajaxReturn(true);
    	}else{
    		$this->ajaxReturn(false);
    	}
    }
    //修改密码
    public function xgPass(){
    	$user=$_SESSION[user];
    	$pass=I('post.pass');
    	$data['pass']=$pass;
    	$where['user']=$user;
    	$Login=M('Login');
    	$result=$Login->where($where)->save($data);
    	if($result){
    		$this->ajaxReturn(true);
    	}else{
    		$this->ajaxReturn(false);
    	}
    }
}