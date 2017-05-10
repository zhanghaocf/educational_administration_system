<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" type="text/css" href="/ZH/educational_administration_system/Public/css/bootstrap.min.css"/>
		<style>
			body{
				background:url("/ZH/educational_administration_system/Public/img/bg.jpg") no-repeat;
			}
			section{
				width:800px;
				margin:0 auto;
				padding-top:50px;
				text-align: center;
			}
			h3{
				margin-bottom: 30px;
			}
			section input{
				width:150px;
				height:30px;
				margin-left: 15px;
			}
		</style>
	</head>
	<body>
		<section>
			<h3>修改密码</h3>
			<label for="oldPass">&nbsp;原密码:<input type="password" id="oldPass" /></label><br/><span id="oldInfo" style="color:red;display: none;">你输入的原密码不对，请重新输入！</span><br/>
			<label for="newPass">&nbsp;新密码:<input type="password" id="newPass" /></label><br/><span id="newInfo" style="color:red;display: none;">新密码不能与原密码一致，请重新输入</span><br/>
			<label for="repeatPass">重复密码:<input style="margin-left: 10px;" type="password" id="repeatPass" /></label><br/><span id="repeatInfo" style="color:red;display: none;">请与新密码一致！</span><br/>
			<a href="###" class="btn btn-info" id="btn">确定</a>
		</section>
	</body>
	<script src="/ZH/educational_administration_system/Public/js/jquery-3.1.0.min.js"></script>
	<script>
		var oldBol=true;
		var newBol=true;
		var repeatBol=true;
		var oldPass=$("#oldPass");
		var newPass=$("#newPass");
		var repeatPass=$("#repeatPass");
		oldPass.blur(function(){
			if(oldPass.val()){
				$.ajax({
					type:"post",
					url:"/ZH/educational_administration_system/index.php/Home/Content/yanOldPass",
					data:{
						pass:oldPass.val(),
					},
					async:true,
					success:function(data){
						if(data){
							oldBol=true;
							$("#oldInfo").hide();
						}else{
							oldBol=false;
							$("#oldInfo").show();
						}
					}
				});
			}
		});
		newPass.blur(function(){
			if(newPass.val()==oldPass.val()){
				$("#newInfo").show();
				newBol=false;
			}else{
				$("#newInfo").hide();
				newBol=true;
			}
		});
		repeatPass.blur(function(){
			if(repeatPass.val()==newPass.val()){
				$("#repeatInfo").hide();
				repeatBol=true;
			}else{
				$("#repeatInfo").show();
				repeatBol=false;
			}
		});
		$("#btn").on('click',function(){
			if(oldPass.val()==""||newPass.val()==""||repeatPass.val()==""){
				alert("请填写完整表单内容");
			}else if(oldBol&&newBol&&repeatBol){
				$.ajax({
					type:"post",
					url:"/ZH/educational_administration_system/index.php/Home/Content/xgPass",
					data:{
						pass:newPass.val(),
					},
					async:true,
					success:function(data){
						if(data){
							alert('密码修改成功');
						}
					}
				});
			}
		});
	</script>
</html>