<?php
namespace Admin\Controller;
use Think\Controller;
class ContentController extends Controller {
    public function index(){
       $this->display();
    }
    public function addStudent(){
    	$this->display();
    }
    public function addTeacher(){
    	$this->display();
    }
    public function add(){
    	$Login=D("Login");
    	$result=$Login->create();
    	if (!$result){ // 指定新增数据
		     // 如果创建失败 表示验证没有通过 输出错误提示信息
		     $this->ajaxReturn($Login->getError());
		}else{
		     // 验证通过 可以进行其他数据操作
		     $q=I('post.q');
		     if($q==0){//添加学生
			     $name=I('post.name');
			     $pass=I('post.pass');
			     $zhuanye=I('post.zhuanye');
			     $nianji=I('post.nianji');
			     $nianji1=$nianji+4;
			     switch($zhuanye){
			     	case '计算机':$nianji2=4040;break;
			     	case '法学':$nianji2=4039;break;
			     	default:break;
			     }
			     $nianji=$nianji.$nianji1.$nianji2;
			     $map['user']=array('like',$nianji.'%');
			     $count=$Login->where($map)->count()+1;
			     if(count($count)==1){
			     	$count='0'.$count;
			     }
			     $nianji=$nianji.$count;
			     $where['user']=$nianji;
			     $where['pass']=$pass;
			     $where['q']=$q;
			     $where['name']=$name;
			     $where['zhuanye']=$zhuanye;
			     $addResult=$Login->data($where)->add();
			     if($addResult){
			     	 $this->ajaxReturn("添加学生成功");
			     }
		    }else if($q==1){
		    	$name=I('post.name');
		    	$pass=I('post.pass');
		    	$zhuanye=I('post.zhuanye');
		    	$map['user']=array('like','040%');
			     $count=$Login->where($map)->count()+1;
			     if(count($count)==1){
			     	$count='00'.$count;
			     }else if(count($count)==2){
			     	$count="0".$count;
			     }
			     $user="040".$count;
			     $data['user']=$user;
			     $data['pass']=$pass;
			     $data['q']=$q;
			     $data['name']=$name;
			     $data['zhuanye']=$zhuanye;
			     $addResult=$Login->data($data)->add();
			     if($addResult){
			     	$this->ajaxReturn("添加教师成功");
			     }
		    }
		}
//  	$this->ajaxReturn($name);
    }
    public function addCourse(){
    	$Login=M('Login');
    	$map['user']=array('like','040%');
    	$list=$Login->where($map)->select();
    	$this->assign('list',$list);
    	$this->display();
    }
    public function courseInfo(){
    	$user=$_SESSION['user'];
    	$title=I('post.title');
    	$reader=I('post.reader');
    	$content1=I('post.content');
    	$content=$content1[name]."|".$content1[score]."|".$content1[type]."|".$content1[profession]."|".$content1[banji]."|".$content1[floor]."|".$content1[room]."|".$content1[count];
    	$time=I('post.time');
    	$Info=M('Info');
    	$data['user']=$user;
    	$data['title']=$title;
    	$data['reader']=$reader;
    	$data['content']=$content;
    	$data['time']=$time;
    	$resultAdd=$Info->data($data)->add();
    	if($resultAdd){
    		$this->ajaxReturn("发送课程通知成功");	
    	}
    }
    //查看成绩
    public function lookGrade(){
    	$biao=M();
    	$databaseName="education";
    	$result1=$biao->query("SELECT * FROM information_schema.tables WHERE table_schema = '{$databaseName}' AND table_name LIKE 'edu_grade%'");
    	$tableName=array();
    	for($i=0;$i<count($result1);$i++){
    		$biao1=M();
    		$result=$biao1->query("SELECT * FROM ".$result1[$i]['table_name']);
    		$arr=array();
    		$arr['teacher']=$result[0]['teacher'];
    		$arr['courseName']=$result[0]['coursename'];
    		$arr['tableName']=$result1[$i]['table_name'];
    		$tableName[]=$arr;
    	}
    	$this->assign('list',$tableName);
    	$this->assign('count',count($tableName));
    	$this->display();
    }
    public function lookGradeDetail(){
    	$tableName=I('post.tableName');
    	$Grade=M('Grade'.$tableName);
    	$result=$Grade->select();
    	$this->ajaxReturn($result);
    }
    //查看现有老师
    public function searchTeacher(){
    	$Login=M('Login');
    	$where['q']=1;
    	$result=$Login->where($where)->order('user desc')->select();
    	$this->assign('list',$result);
    	$this->display();
    }
     //查看现有学生班级
    public function searchClass(){
    	$Login=M('Login');
    	$where['q']=0;
    	$result=$Login->where($where)->select();
    	$arr=array();
    	for($i=0;$i<count($result);$i++){
    		$str=substr($result[$i]['user'],0,2);
    		$str1=$str.$result[$i]['zhuanye'].'班';
    		//把相同班级归类同一个数组不在新增
    		if(in_array($str1,$arr)){
    			continue;
    		}else{
    			$arr[]=$str1;
    		}
    	}
    	$this->assign('list',$arr);
    	$this->display();
    }
    //查看每个班级的学生
    public function searchStudent(){
    	$zhuanye=I('post.profession');
    	$nianji=I('post.nianji');
    	$nianji1=$nianji+4;
    	switch($zhuanye){
			     	case '计算机':$nianji2=4040;break;
			     	case '法学':$nianji2=4039;break;
			     	default:break;
			     }
		$nianji3=$nianji.$nianji1.$nianji2;
		$Login=M('Login');
		$map['user']=array('like',$nianji3.'%');
		$list=$Login->where($map)->select();
		$this->ajaxReturn($list);
    }
}