<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" type="text/css" href="/ZH/educational_administration_system/Public/css/bootstrap.min.css"/>
		<style>
			#top{
				width:800px;
				margin:0 auto;
				padding-top:30px;
				/*display: none;*/
			}
			#courseList{
				width:400px;
			}
			#middle{
				width:800px;
				margin:0 auto;
				/*display: none;*/
			}
			#bili>p{
				background-color: #ccc;
				padding:10px;
				margin:0;
			}
			#bili>ul{
				background-color: lightblue;
				width:800px;
				margin:0 auto;
			}
			#bili>ul>li{
				width:20%;
				padding:10px;
				color:gray;
			}
			#bili{
				margin-top:30px;
			}
			.gai1{
				width:100px;
			}
			#gradeDiv th,#gradeDiv td{
				text-align: center;
				border:1px solid black;
				width:100px;
			}
			.title{
				border:1px solid black;
				text-align: center;
				font-size: 20px;
				margin:15px 0 -1px;
			}
			#saveBtn{
				margin-top: 10px;
				/*display: none;*/
			}
			#baiping{
				width:100vw;
				height:100vh;
				position:absolute;
				left:0;
				top:0;
				display: none;
				z-index: 3;
			}
		</style>
	</head>
	<body>
		<div id="top">
			<h1>请选择一门课程录入成绩</h1>
			<ul id="courseList" class="list-unstyled list-inline">
				<?php if(is_array($list)): foreach($list as $key=>$vo): ?><li><a href="###" class="course" data-stuid="<?php echo ($vo["stuID"]); ?>" data-courseid="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></a></li><?php endforeach; endif; ?>
			</ul>
		</div>
		<div id="middle">
			<div id="bili">
				<p>期末考试的成绩比率如下</p>
				<ul class="list-unstyled list-inline">
					<li>平时:<span id="pingshi">10</span></li>
					<li>期中:<span id="qizhong">0</span></li>
					<li>期末:<span id="qimo">60</span></li>
					<li>实验(践):<span id="shijian">30</span></li>
				</ul>
			</div>
			<div id="gradeDiv">
				
			</div>	
			
		</div>
		<div id="baiping"></div>
	</body>
	<script src="/ZH/educational_administration_system/Public/js/template-native.js"></script>
	<script src="/ZH/educational_administration_system/Public/js/jquery-3.1.0.min.js"></script>
	<script id="gradeDivTemplate" type="text/html">
			<p class="title"><%=data[0].teacher%>老师 <%=data[0].coursename%> 学生考试成绩</p>
				<table>
					<tr>
						<th>学号</th>
						<th>姓名</th>
						<th>平时*</th>
						<th>期中*</th>
						<th>实践*</th>
						<th>期末*</th>
						<th>专业</th>
						<th>总评成绩</th>
					</tr>
					<%for(var i=0;i<data.length;i++){%>
						<tr>
							<td><%=data[i].user%></td>
							<td><%=data[i].name%></td>
							<td class="gai"><input type="text" data-courseId="<%=data[i].courseId%>" data-id="<%=data[i].id%>" data-v="pingshi" class="gai1 pingshi" value="<%=data[i].pingshi%>" onchange="luruFn(this)"/></td>
							<td class="gai"><input type="text" data-courseId="<%=data[i].courseId%>" data-id="<%=data[i].id%>" data-v="qizhong" class="gai1 qizhong" value="<%=data[i].qizhong%>" onchange="luruFn(this)"/></td>
							<td class="gai"><input type="text" data-courseId="<%=data[i].courseId%>" data-id="<%=data[i].id%>" data-v="shijian" class="gai1 shijian" value="<%=data[i].shijian%>" onchange="luruFn(this)"/></td>
							<td class="gai"><input type="text" data-courseId="<%=data[i].courseId%>" data-id="<%=data[i].id%>" data-v="qimo" class="gai1 qimo" value="<%=data[i].qimo%>" onchange="luruFn(this)"/></td>
							<td><%=data[i].profession%></td>
							<td class="final" data-id="<%=data[i].id%>"><%=data[i].grade%></td>
						</tr>
					<%}%>
				</table>
				
	</script>
	<script type="text/javascript">
		var courses=$(".course");
		courses.on("click",function(){
			var stuid=$(this).data("stuid");
			var courseid=$(this).data("courseid");
			if(stuid){
				$.ajax({
					type:"post",
					url:"/ZH/educational_administration_system/index.php/Teacher/Content/gradeDetail",
					async:true,
					dataType:"json",
					data:{
						stuid:stuid,
						courseid:courseid
					},
					success:function(data){
//						console.log(data);
						var json={};
						json.data=data;
						var html=template('gradeDivTemplate',json);
						$("#gradeDiv").html(html);
					}
				});
			}else{
				alert("该课程还未开始，不能录入成绩");
			}
		});
		
		//给文本框录入成绩
		var bili1=$("#pingshi").html()/100;
		var bili2=$("#qizhong").html()/100;
		var bili3=$("#shijian").html()/100;
		var bili4=$("#qimo").html()/100;
		
		function luruFn(obj){
			var id=obj.getAttribute("data-id");
			var ziduan=obj.getAttribute("data-v");
			var courseId=obj.getAttribute("data-courseId");
			var value1=obj.value;
			var obj=$(obj);
			var reg=/^[0-9]$|^[1-9][0-9]$|^100$/g;
			if(reg.test(obj.val())){
				var pingshi=(obj.parent().parent())[0].getElementsByClassName("pingshi")[0].value||0;
				var qizhong=(obj.parent().parent())[0].getElementsByClassName("qizhong")[0].value||0;
				var shijian=(obj.parent().parent())[0].getElementsByClassName("shijian")[0].value||0;
				var qimo=(obj.parent().parent())[0].getElementsByClassName("qimo")[0].value||0;
				var result=(obj.parent().parent())[0].getElementsByClassName("final")[0];
				result.innerHTML=Math.round(pingshi*bili1+qizhong*bili2+shijian*bili3+qimo*bili4);
				$.ajax({
					type:"post",
					url:"/ZH/educational_administration_system/index.php/Teacher/Content/addGrade",
					async:true,
					data:{
						id:id,
						ziduan:ziduan,
						value1:value1,
						courseId:courseId,
						value2:result.innerHTML
					}
					
				});
			}else{
				alert("请输入0到100纯数字");
			}
		}

	</script>
</html>