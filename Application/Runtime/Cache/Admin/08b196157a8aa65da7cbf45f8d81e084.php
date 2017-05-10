<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>添加学生</title>
		<link rel="stylesheet" type="text/css" href="/ZH/educational_administration_system/Public/css/bootstrap.min.css"/>
		<style type="text/css">
			body{
				background: url("/ZH/educational_administration_system/Public/img/bg.jpg") no-repeat;
			}
			section{
				margin:0 auto;
				width:800px;
				text-align: center;
				padding-top:100px;
			}
		</style>
	</head>
	<body>
		<section>
			<label for="name" class="label1">教师姓名:<input id="name" type="text"></label><br/><br/>
			<label for="pass" class="label2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;密码:<input id="pass" type="password"></label><br/><br/>
			<label for="" class="label3">教师专业:<select><option value="计算机">计算机</option><option value="法学">法学</option><option value="外选">外选</option></select></label><br/><br/>
			<button id="btn" class="btn btn-info">确定</button>
			<a href="/ZH/educational_administration_system/index.php/Admin/Content/index" class="btn btn-info">返回</a>
		</section>
	</body>
	<script src="/ZH/educational_administration_system/Public/js/jquery-3.1.0.min.js"></script>
	<script>
		$('#name').val("");
		$("#pass").val("");
		$("#btn").on("click",function(){
			var name=$("#name").val();
			var pass=$("#pass").val();
			var profession=$(".label3>select").val();
			$.ajax({
						'url':"/ZH/educational_administration_system/index.php/Admin/Content/add",
						dataType:"json",
						type:'POST',
						data:{
							name:name,
							pass:pass,
							zhuanye:profession,
							q:1,
						},
						async:true,
							success:function(data){
								alert(data);
								if(data=="添加教师成功"){
									$('#name').val("");
									$("#pass").val("");
								}
							}
				});
		})
	</script>
</html>