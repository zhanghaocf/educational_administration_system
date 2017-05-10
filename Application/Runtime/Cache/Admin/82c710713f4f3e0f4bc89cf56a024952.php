<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" type="text/css" href="/ZH/educational_administration_system/Public/css/bootstrap.min.css"/>
		<style>
			body{
				background: url("/ZH/educational_administration_system/Public/img/bg.jpg") no-repeat;
				text-align: center;
			}
			section{
				width:800px;
				margin:20px auto 0;
				overflow: hidden;
			}
			.item{
				width:25%;
				float:left;
				padding:10px;
			}
			.searchS{
				border:1px solid red;
				padding:10px;
				text-align: center;
				font-weight: bold;
				cursor:pointer;
			}
			.searchS:hover{
				background-color: black;
				color:white;
			}
			#xuesheng{
				position:absolute;
				width:100vw;
				min-height:100vh;
				background: url("/ZH/educational_administration_system/Public/img/bg.jpg") no-repeat;
				left:0;
				top:0;
				display: none;
			}
			#close{
				width:50px;
				height:50px;
				background-color: white;
				border:1px solid black;
				font-size: 20px;
				text-align: center;
				line-height: 50px;
				position:absolute;
				right:0;
				top:0;
				border-radius: 50%;
				cursor: pointer;
			}
			#infoT{
				width:800px;
				margin:50px auto 0;
			}
			#infoT th,#infoT td{
				text-align: center;
				padding:5px;
				border:1px solid blue;
			}
		</style>
	</head>
	<body>
		<section>
			<!--<div class="item">
				<div class="searchS">13某某班</div>
			</div>-->
			<?php if(is_array($list)): foreach($list as $key=>$vo): ?><div class="item">
					<div class="searchS"><?php echo ($vo); ?></div>
				</div><?php endforeach; endif; ?>
		</section>
		<a href="/ZH/educational_administration_system/index.php/Admin/Content/index" class="btn btn-info">返回</a>
		<div id="xuesheng">
			<div id="close">X</div>
			<table id="infoT">
			</table>
		</div>
	</body>
	<script src="/ZH/educational_administration_system/Public/js/template-native.js"></script>
	<script src="/ZH/educational_administration_system/Public/js/jquery-3.1.0.min.js"></script>
	<script id="infoTemplate" type="text/html">
		<tr>
				<th>姓名</th>
				<th>学号</th>
				<th>专业</th>
		</tr>
		<% for(var i=0;i<data.length;i++){%>
			<tr>
				<td><%= data[i].name %></td>
				<td><%= data[i].user %></td>
				<td><%= data[i].zhuanye %></td>
			</tr>
		<%}%>
	</script>
	<script>
		$(".searchS").on('click',function(){
			var str=$(this).html();
			var str1=str.slice(2,-1);
			var str2=str.slice(0,2);
			$.ajax({
				type:"post",
				url:"/ZH/educational_administration_system/index.php/Admin/Content/searchStudent",
				data:{
					profession:str1,
					nianji:str2
				},
				async:true,
				dataType:'json',
				success:function(data){
					var json={};
					json.data=data;
					var html=template('infoTemplate',json);
					$("#infoT").html(html);
				}
			});
			$("#xuesheng").fadeIn();
		});
		$("#close").on('click',function(){
			$("#xuesheng").fadeOut();
		});
	</script>
</html>