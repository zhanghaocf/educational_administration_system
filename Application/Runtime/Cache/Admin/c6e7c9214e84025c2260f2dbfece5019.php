<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>查看成绩</title>
		<link rel="stylesheet" type="text/css" href="/ZH/educational_administration_system/Public/css/bootstrap.min.css"/>
		<style>
			body{
				background: url("/ZH/educational_administration_system/Public/img/bg.jpg") no-repeat;
			}
			section{
				width:1000px;
				margin:20px auto 0;
				text-align: center;
			}
			.item{
				width:23%;
				padding:5px;
				float:left;
				margin-left:1%;
				margin-right: 1%;
				margin-bottom:10px;
				text-align: center;
				font-size: 20px;
				cursor:pointer;
			}
			#big{
				width:100vw;
				height:100vh;
				/*background-color: cyan;*/
				background: url("/ZH/educational_administration_system/Public/img/bg.jpg") no-repeat;
				background-size: 100% 100%;
				position:absolute;
				top:0;
				left:0;
				transform:scale(0,0) rotate(180deg);
				transition:all 0.5s linear;
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
			#info table{
				width:1000px;
				margin:20px auto 0;
			}
			#info table th,#info table td{
					text-align: center;
					border:1px solid red;
				}
				
		</style>
	</head>
	<body>
		<section>
			<!--<div class="item"><?php echo ($count); ?></div>
			<div class="item">kid无论是离开的</div>
			<div class="item">kid无论是离开的</div>
			<div class="item">kid无论是离开的</div>
			<div class="item">kid无论是离开的</div>-->
			<?php if(($count == 0)): ?><div style="text-align: center;margin-bottom: 20px;">暂时没有数据</div>
			<?php else: ?>
				<?php if(is_array($list)): foreach($list as $key=>$vo): ?><div class="item" data-name="<?php echo ($vo["tableName"]); ?>"><?php echo ($vo["teacher"]); ?>老师--<?php echo ($vo["courseName"]); ?></div><?php endforeach; endif; endif; ?>
			<!--清除浮动-->
			<div style="clear: both;"></div>
			<a href="/ZH/educational_administration_system/index.php/Admin/Content/index" class="btn btn-info" id="btn">返回</a>
		</section>
		<div id="big">
			<div id="close">X</div>
			<div id="info"></div>
		</div>
	</body>
	<script src="/ZH/educational_administration_system/Public/js/template-native.js"></script>
	<script src="/ZH/educational_administration_system/Public/js/jquery-3.1.0.min.js"></script>
	<script id="infoTemplate" type="text/html">
		<table>
			<tr>
				<th>学号</th>
				<th>姓名</th>
				<th>平时成绩</th>
				<th>期中成绩</th>
				<th>实践成绩</th>
				<th>期末成绩</th>
				<th>专业</th>
				<th>老师</th>
				<th>课程名称</th>
				<th>总成绩</th>
			</tr>
			<% for(var i=0;i<data.length;i++){%>
				<tr>
					<td><%=data[i].user%></td>
					<td><%=data[i].name%></td>
					<td><%=data[i].pingshi%></td>
					<td><%=data[i].qizhong%></td>
					<td><%=data[i].shijian%></td>
					<td><%=data[i].qimo%></td>
					<td><%=data[i].profession%></td>
					<td><%=data[i].teacher%></td>
					<td><%=data[i].coursename%></td>
					<td><%=data[i].grade%></td>
				</tr>
			<%}%>
		</table>
	</script>
	<script>
		function rand(min,max){
			return Math.floor(Math.random(0,1)*(max-min+1)+min);
		}
		function randColor(){
			var color="rgb("+rand(0,255)+","+rand(0,255)+","+rand(0,255)+")";
			return color;
		}
		var items=document.getElementsByClassName("item");
		var big=document.getElementById("big");
		var close=document.getElementById("close");
		for(var i=0;i<items.length;i++){
			items[i].style.border="2px solid "+randColor();
			items[i].onclick=function(){
				big.style.transform="scale(1,1) rotate(0deg)";
				var tableName=this.getAttribute("data-name");
				tableName=tableName.slice(9);
				$.ajax({
					type:"post",
					url:"/ZH/educational_administration_system/index.php/Admin/Content/lookGradeDetail",
					async:true,
					dataType:'json',
					data:{
						tableName:tableName
					},
					success:function(data){
						var json={};
						json.data=data;
						var html=template('infoTemplate',json);
						$("#info").html(html);
					}
				});
			}
		}
		close.onclick=function(){
			big.style.transform="scale(0,0) rotate(180deg)";
		}
	</script>
</html>