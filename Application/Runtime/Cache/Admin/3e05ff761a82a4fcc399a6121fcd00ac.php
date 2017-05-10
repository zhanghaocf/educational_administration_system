<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<style>
			body{
				background: url("/ZH/educational_administration_system/Public/img/bg.jpg") no-repeat;
				text-align: center;
			}
			#tT{
				width:800px;
				margin:50px auto 0;
				border:1px solid #008000;
				margin-bottom: 15px;
			}
			#tT th,#tT td{
				text-align: center;
				border:1px solid #008000;
				padding-top:5px;
				padding-bottom:5px;
			}
			#btn{
				text-decoration:none;
				display:inline-block;
				width:80px;
				height:30px;
				border-radius:5px;
				background-color:dodgerblue;
				text-align: center;
				color:white;
				line-height:30px;
			}
		</style>
	</head>
	<body>
		<table id="tT">
			<tr>
				<th>姓名</th>
				<th>教师号</th>
				<th>专业</th>
			</tr>
			<!--<tr>
				<td>haha</td>
				<td>haha</td>
				<td>haha</td>
			</tr>-->
			<?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr>
					<td><?php echo ($vo["name"]); ?></td>
					<td><?php echo ($vo["user"]); ?></td>
					<td><?php echo ($vo["zhuanye"]); ?></td>
				</tr><?php endforeach; endif; ?>
		</table>
		<a href="/ZH/educational_administration_system/index.php/Admin/Content/index" id="btn">返回</a>
	</body>
</html>