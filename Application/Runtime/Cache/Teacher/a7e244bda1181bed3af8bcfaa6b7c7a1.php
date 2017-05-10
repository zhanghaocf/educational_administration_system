<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" type="text/css" href="/ZH/educational_administration_system/Public/css/bootstrap.min.css"/>
		<style type="text/css">
			#course{
				width:1000px;
			}
			#course>p{
				height: 30px;
				font-size: 20px;
				line-height: 30px;
				background-color: #deebf7;
				text-align: center;
			}
			#courseT,#resultT{
				width:900px;
				margin-left: 50px;
				border:1px solid #2c2c2c;
			}
			#courseT td,#courseT th,#resultT td,#resultT th{
				border:1px solid #808080;
				text-align: center;
			}
			#resultT{
				margin-top:30px;
			}
			#result{
				display: none;
				text-align: center;
			}
		</style>
	</head>
	<body>
		<div id="course">
			<p>课程信息</p>
			<table id="courseT" style="border-collapse: initial;">
				<tr>
					<th>课程名字</th>
					<th>选课人数</th>
					<th>上课时间</th>
					<th></th>
				</tr>
				<!--<tr>
					<td>Java程序设计</td>
					<td>46</td>
					<td><?php echo ($user); ?></td>
					<td><a href="###">详情</a></td>
				</tr>-->
				<?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr>
						<td><?php echo ($vo["name"]); ?></td>
						<td><?php echo ($vo["count1"]); ?></td>
						<td><?php echo ($vo["plan"]); ?></td>
						<td><a href="###" class="detail" data-stuid="<?php echo ($vo["stuID"]); ?>" data-course="<?php echo ($vo["id"]); ?>">详情</a></td>
					</tr><?php endforeach; endif; ?>
			</table>
		</div>
		<div id="result">
			<table id="resultT" style="border-collapse: initial;">
				<!--<tr>
					<th>班级名称</th>
					<th>学号</th>
					<th>姓名</th>
				</tr>-->
				<!--<tr>
					<td>15计算机班</td>
					<td>1317404001</td>
					<td>张豪</td>
				</tr>-->
			</table><br/>
			<button class="btn btn-info btn-sm" onclick="backFn()">返回</button>
		</div>
	</body>
	<script src="/ZH/educational_administration_system/Public/js/jquery-3.1.0.min.js"></script>
	<script src="/ZH/educational_administration_system/Public/js/template-native.js"></script>
	<script id="resultTemplate" type="text/html">
			<tr>
					<th>班级名称</th>
					<th>学号</th>
					<th>姓名</th>
					<th>专业</th>
				</tr>
		<% for (var i = 0; i < data.length; i ++) { %>
		        <tr>
		        	<td><%=data[i].room%>班</td>
					<td><%=data[i].user%></td>
					<td><%=data[i].name%></td>
					<td><%=data[i].zhuanye%></td>
		        </tr>
		    <% } %>
	</script>
	<script type="text/javascript">
		$(".detail").on('click',function(){
//			var index=$(".detail").index($(this));
			var courseId=$(this).data('course');
			var stuid=$(this).data('stuid');
			$("#course").hide();
			$("#result").show();
			$.ajax({
						'url':"/ZH/educational_administration_system/index.php/Teacher/Content/courseDetail",
						dataType:"json",
						type:"POST",
						data:{
							courseId:courseId,
							stuid:stuid,
						},
						async:true,
							success:function(data){
								var json={};
								json.data=data;
								var html = template('resultTemplate', json);
								$("#resultT").html(html);
//								alert(data[0].room);
							}
				});
		});
		function backFn(){
			$("#course").show();
			$("#result").hide();
		}
	</script>
</html>