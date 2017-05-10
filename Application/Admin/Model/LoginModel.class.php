<?php
namespace Admin\Model;
use Think\Model;
class LoginModel extends Model{
	protected $_validate = array(
     array('name','require','名字必须！'), //默认情况下用正则进行验证
     array('pass','require','密码必须！')
   );
   

   
}
?>