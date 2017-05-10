<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>文正院教务子系统</title>
		<link rel="stylesheet" type="text/css" href="/ZH/educational_administration_system/Public/css/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="/ZH/educational_administration_system/Public/css/stu_system.css"/>
		<style type="text/css">
			header>div{
				position:absolute;
				left:800px;
				top:50%;
				cursor: pointer;
			}
			header>div>span{
				transform: scale(2,2);
			}
			.shuzi{
				position: absolute;
				right:-15px;
				top:-15px;
				width:20px;
				height:20px;
				background-color: red;
				color:white;
				border-radius: 50%;
				text-align: center;
				line-height: 20px;
			}
			#heiping{
				position:absolute;
				top:0;
				left:0;
				background-color:rgba(0,0,0,0.5);
				width:100vw;
				height:100vh;
			}
			#info{
				text-align: center;
				position:absolute;
				width:50vw;
				height:50vh;
				background-color:white;
				left:50%;
				top:50%;
				transform: translate(-50%,-50%);
			}
			#info table{
				width:90%;
				margin:60px auto 10px;
				border:1px solid #2c2c2c;
			}
			#info table td,th{
				text-align: center;
				border:1px solid #2c2c2c;
				padding-top:5px;
				padding-bottom: 5px;
			}
			#close{
				position:absolute;
				right:10px;
				top:10px;
				cursor: pointer;
			}
			#pre{
				margin-right:50px;
			}
			#infoDetail{
				width:500px;
				height:370px;
				background-color:white;
				position:absolute;
				left:50%;
				top:50%;
				transform:translate(-50%,-50%);
				text-align: center;
				padding-top:30px;
				display:none;
			}
			.infoDetailTime{
				text-align: right;
				font-size:14px;
				margin-right:30px;
			}
			.infoDetailContent{
				width:80%;
				height:180px;
				background-color: black;
				color:white;
				margin:0 auto;
				text-align: left;
				padding-top:10px;
				padding-bottom:10px;
				text-indent: 2em;
				margin-bottom:10px;
			}
			.infoDetailTable{
				width:80%;
				background-color: black;
				color:white;
				margin-bottom:10px;
			}
			#agreeCourse{
				width:500px;
				height:500px;
				background-color: white;
				position:absolute;
				left:50%;
				top:50%;
				transform: translate(-50%,-50%);
				text-align: center;
			}
			#agreeCourse>a{
				position:absolute;
				left:50%;
				transform: translateX(-50%);
				bottom:20px;
			}
			#agreeCourse{
				display: none;
			}
		</style>
	</head>
	<body>
		<header>
			<img src="/ZH/educational_administration_system/Public/img/toplogo.png"/><br/>
			<marquee>张豪 中午好！登录日期 2017/2/25 星期六</marquee>
			<div id="xiaoxi"><span class="glyphicon glyphicon-envelope"></span><p class="shuzi"><?php echo ($count); ?></p></div>
		</header>
		<section>
			<div class="nav">
				<ul id="personInfo">
					<li><a href="###">个人信息<img class="downJiao zhuan" src="/ZH/educational_administration_system/Public/img/f103.png" alt="" /></a>
						<ul class="liList">
							<li><a href="###" onclick="changeAddress('/ZH/educational_administration_system/index.php/Teacher/Content/courseSelection')"><span class="glyphicon glyphicon-pencil"> 选课情况</a></li>
							<li><a href="###"  onclick="changeAddress('/ZH/educational_administration_system/index.php/Home/Content/xPass')"><span class="glyphicon glyphicon-pencil"> 密码修改</a></li>
						</ul>
					</li>
					<li><a href="###">教学计划和上课课表<img class="downJiao zhuan" src="/ZH/educational_administration_system/Public/img/f103.png" alt="" /></a>
						<ul class="liList">
							<li><a href="###"><span class="glyphicon glyphicon-pencil"> 教学计划</a></li>
							<li><a href="###" onclick="changeAddress('/ZH/educational_administration_system/index.php/Home/Content/schedule')"><span class="glyphicon glyphicon-pencil"> 上课课表</a></li>
							<li><a href="###"><span class="glyphicon glyphicon-pencil"> 教学评估</a></li>
						</ul>
					</li>
					<li><a href="###">成绩录入<img class="downJiao zhuan" src="/ZH/educational_administration_system/Public/img/f103.png" alt="" /></a>
						<ul class="liList">
							<li><a href="###" onclick="changeAddress('/ZH/educational_administration_system/index.php/Teacher/Content/grade')"><span class="glyphicon glyphicon-pencil"> 成绩录入</a></li>
						</ul>
					</li>
					<li><a href="###">系统相关<img class="downJiao zhuan" src="/ZH/educational_administration_system/Public/img/f103.png" alt="" /></a>
						<ul class="liList">
							<li><a href="###"><span class="glyphicon glyphicon-pencil"> 显示默认信息</a></li>
							<li><a href="/ZH/educational_administration_system/index.php/Home/System/doLogOut"><span class="glyphicon glyphicon-pencil"> 退出系统</a></li>
						</ul>
					</li>
				</ul>
			</div>
			<iframe src="" width="" height=""></iframe>
		</section>
		<div id="heiping" style="display:none">
			<div id="info">
				<?php if(($count == 0)): ?><img id="close" src="/ZH/educational_administration_system/Public/img/cha.png" alt=""  style="top:-60px"  onclick="closeFn()"/>
					<img style="width:100%;height:100%" src="/ZH/educational_administration_system/Public/img/nonews.png" alt="" />
				<?php else: ?>
					<img id="close" src="/ZH/educational_administration_system/Public/img/cha.png" alt="" onclick="closeFn()" />
					<table>
						<tr>
							<th>时间</th>
							<th>来自</th>
							<th>标题</th>
							<th>详情</th>
						</tr>
						<?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr>
								<td><?php echo ($vo["time"]); ?></td>
								<td><?php echo ($vo["name"]); ?></td>
								<td><?php echo ($vo["title"]); ?></td>
								<td><a href="###" data-id='<?php echo ($vo["id"]); ?>' onclick="detailFn(this)">详情</a></td>
							</tr><?php endforeach; endif; ?>
						<!--<tr>
							<td>2017-03-15 16:00</td>
							<td>管理员</td>
							<td>课程安排</td>
							<td><a href="###">详情</a></td>
						</tr>
						<tr>
							<td>2017-03-15 16:00</td>
							<td>管理员</td>
							<td>课程安排</td>
							<td><a href="###">详情</a></td>
						</tr>
						<tr>
							<td>2017-03-15 16:00</td>
							<td>管理员</td>
							<td>课程安排</td>
							<td><a href="###">详情</a></td>
						</tr>
						<tr>
							<td>2017-03-15 16:00</td>
							<td>管理员</td>
							<td>课程安排</td>
							<td><a href="###">详情</a></td>
						</tr>
						<tr>
							<td>2017-03-15 16:00</td>
							<td>管理员</td>
							<td>课程安排</td>
							<td><a href="###">详情</a></td>
						</tr>-->
					</table>
					<a id="pre" href="###" class="btn btn-info btn-sm" onclick="preFn()">上一页</a>
					<a id="next" href="###" class="btn btn-info btn-sm" onclick="nextFn()">下一页</a>
					<p style="margin-top: 10px;">共有<span  id="totalPage"><?php echo ($total); ?></span>页,当前第<span id="currentPage">1</span>页</p><?php endif; ?>			
			</div>
			<div id="infoDetail">
			</div>
			<div id="agreeCourse">
				
			</div>
		</div>
	</body>
	<script src="/ZH/educational_administration_system/Public/js/template-native.js"></script>
	<script src="/ZH/educational_administration_system/Public/js/jquery-3.1.0.min.js"></script>
	<script id="infoTemplate" type="text/html">
		<%if(data.length==0){%>
			<img id="close" src="/ZH/educational_administration_system/Public/img/cha.png" alt=""  style="top:-60px"  onclick="closeFn()"/>
					<img style="width:100%;height:100%" src="/ZH/educational_administration_system/Public/img/nonews.png" alt="" />
		<%}else{%>
			<img id="close" src="/ZH/educational_administration_system/Public/img/cha.png" alt="" onclick="closeFn()" />
				<table>
					<tr>
						<th>时间</th>
						<th>来自</th>
						<th>标题</th>
						<th>详情</th>
					</tr>
					<% for(var i=0;i<data.length;i++){%>
						<tr>
							<td><%=data[i].time%></td>
							<td><%=data[i].name%></td>
							<td><%=data[i].title%></td>
							<td><a href="###" data-id='<%=data[i].id%>' onclick="detailFn(this)">详情</a></td>
						</tr>
					<%}%>
				</table>
				<a id="pre" href="###" class="btn btn-info btn-sm" onclick="preFn()">上一页</a>
					<a id="next" href="###" class="btn btn-info btn-sm" onclick="nextFn()">下一页</a>
					<p style="margin-top: 10px;">共有<span id="totalPage"><%=data[0].total%></span>页,当前第<%=data[0].index%>页</p>
				<%} %>
	</script>
	<script id="infoDetailTemplate" type="text/html">
				<h2><%=data.title%></h2>
				<p class="infoDetailTime"><%=data.time%></p>
				<% if(data.content.length==1){%>
					<p class="infoDetailContent"><%=data.content[0]%></p>
					<a href="###" class="btn btn-info" data-id="<%=data.id%>" onclick="knowFn(this)">知道了</a>
				<%}else{%>
					<table class="infoDetailTable" align="center">
						<tr>
							<td>课程名称</td>
							<td><%=data.content[0]%></td>
						</tr>
						<tr>
							<td>学分</td>
							<td><%=data.content[1]%></td>
						</tr>
						<tr>
							<td>学习性质</td>
							<td><%=data.content[2]%></td>
						</tr>
						<tr>
							<td>专业</td>
							<td><%=data.content[3]%></td>
						</tr>
						<tr>
							<td>班级名称</td>
							<td><%=data.content[4]%></td>
						</tr>
						<tr>
							<td>楼号</td>
							<td><%=data.content[5]%></td>
						</tr>
						<tr>
							<td>教室</td>
							<td><%=data.content[6]%></td>
						</tr>
						<tr>
							<td>可选人数</td>
							<td><%=data.content[7]%></td>
						</tr>
					</table>
					<a href="###" class="btn btn-info" data-id="<%=data.id%>" onclick="agreeFn(this)">同意</a>
					<a href="###" class="btn btn-info" data-id="<%=data.id%>" onclick="refuseFn(this)">拒绝</a>	
				<%}%>
	</script>
	<script id="agreeCourseTemplate" type="text/html">
			<h2>你还有的空余时间</h2>
				<%for(var i=0;i<weekArr.length;i+=3){%>
					<input class="shijian" data-level="<%=keyong[i]%>" style="margin-bottom:10px" type="checkbox" name="shijian" value="<%=weekArr[i]%>"/><%=weekArr[i]%>
					<input class="shijian" data-level="<%=keyong[i+1]%>" type="checkbox" name="shijian" value="<%=weekArr[i+1]%>"/><%=weekArr[i+1]%>
					<input class="shijian" data-level="<%=keyong[i+2]%>" type="checkbox" name="shijian" value="<%=weekArr[i+2]%>"/><%=weekArr[i+2]%><br/>
				<%}%>
				<a href="###" class="btn btn-info" data-id="<%=id%>" onclick="loadFn(this)" >确定</a>
	</script>
	<script>
		$("iframe").css('width',$("section").width()-$(".nav").width());
		document.onkeyup=function(){
//			alert($("section").width()-$(".nav").width());
			$("iframe").css('width',$("section").width()-$(".nav").width());
		}
		$("#personInfo>li>a").on("click",function(){
			var index=$("#personInfo>li").index($(this).parent());
			$(".liList").eq(index).slideToggle();
			$(".downJiao").eq(index).toggleClass('zhuan');
		});
		
		//设置marquee内容
		var time1Arr=['早上好','中午好','下午好','晚上好'];
		var dayArr=['星期天','星期一','星期二','星期三','星期四','星期五','星期六'];
		var date=new Date();
		var hours=date.getHours();
		var day=date.getDay();
		var year=date.getFullYear();
		var month=date.getMonth()+1;
		var dat=date.getDate();
		function timeFn(){
			if(hours>=0&&hours<12){
				return time1Arr[0]
			}else if(hours==12){
				return time1Arr[1];
			}else if(hours>12&&hours<18){
				return time1Arr[2];
			}else{
				return time1Arr[3];
			}
		}
		$('marquee').html("<?php echo ($name); ?>老师 "+timeFn()+"！ 登录日期 "+year+"/"+month+"/"+dat+" "+dayArr[day]);
	
	//右窗口变化地址函数
	function changeAddress(address){
		$("iframe").attr('src',address);
	}
		//点击下一页
		var index=0;
//		var total=<?php echo ($total); ?>;
		function nextFn(){
			index++;
			var total=$("#totalPage").html();
			if(index>=total){
				index=0;
			}
			
			$.ajax({
				type:"POST",
				url:"/ZH/educational_administration_system/index.php/Teacher/Index/infoFn",
				async:true,
				dataType:"json",
				data:{
							currentPage:index,
						},
				success:function(data){
					var json={};
					json.data=data;
					var html=template('infoTemplate',json);
					$("#info").html(html);
				}
			});
		}
		function preFn(){
			index--;
			var total=$("#totalPage").html();
			if(index<0){
				index=total-1;
			}
//			alert(index);
			$("#currentPage").html(Number(index)+1);
			$.ajax({
				type:"POST",
				url:"/ZH/educational_administration_system/index.php/Teacher/Index/infoFn",
				async:true,
				dataType:"json",
				data:{
							currentPage:index,
						},
				success:function(data){
					var json={};
					json.data=data;
					var html=template('infoTemplate',json);
					$("#info").html(html);
//					alert(data);
				}
			});
		}
		//打开消息窗口
		$("#xiaoxi").on('click',function(){
			$("#heiping").fadeIn();
		});
		//关闭消息窗口
		function closeFn(){
			$("#heiping").fadeOut();
		}
		
		//点击详情函数
		function detailFn(obj){
			var id=obj.getAttribute('data-id');
			$.ajax({
				type:"post",
				url:"/ZH/educational_administration_system/index.php/Teacher/Index/detail",
				async:true,
				data:{
					id:id
				},
				success:function(data){
					data.content=data.content.split("|");
					var json={};
					json.data=data;
					var html=template('infoDetailTemplate',json);
					$("#infoDetail").html(html);
					$("#info").hide();
					$("#infoDetail").show();
				}
			});
		}
		//点击同意
		function agreeFn(obj){
			var id=obj.getAttribute("data-id");
			$.ajax({
				type:"post",
				url:"/ZH/educational_administration_system/index.php/Teacher/Index/agreeFn",
				async:true,
				success:function(data){
					$("#infoDetail").hide();
					$("#agreeCourse").show();
					data=data.split(",");
					var keyong=[];
					for(var i=1;i<=30;i++){
						for(var j=0;j<data.length;j++){
							if(i==data[j]){
								break;
							}
						}
						if(j==data.length){
							keyong.push(i);
						}
					}
					//把等级转化为星期几
					var weekArr=[];
					var week=['星期一','星期二','星期三','星期四','星期五'];
					for(var k=0;k<keyong.length;k++){
						var index=(keyong[k]*2-1)%12;
						var index1=Math.floor((keyong[k]*2-1)/12);
						var str=week[index1]+" 第"+(index)+"-"+(index+1)+"节";
						weekArr.push(str);
					}
					var json={};
					json.weekArr=weekArr;
					json.keyong=keyong;
					json.id=id;
					var html=template('agreeCourseTemplate',json);
					$("#agreeCourse").html(html);
				}
			});
		}
		//点击拒绝按钮
		function refuseFn(obj){
			var id=obj.getAttribute("data-id");
			var name="<?php echo ($name); ?>";
			$.ajax({
				type:"post",
				url:"/ZH/educational_administration_system/index.php/Teacher/Index/refuseFn",
				async:true,
				data:{
					id:id,
					name:name
				},
				success:function(data){
					alert(data);
					if(data=="拒绝课程成功,并以发送课程反馈给管理员"){
							$("#heiping").hide();
							$("#infoDetail").hide();
							$("#info").show();
							$.ajax({
								type:"POST",
								url:"/ZH/educational_administration_system/index.php/Teacher/Index/infoFn",
								async:true,
								dataType:"json",
								data:{
											currentPage:0,
										},
								success:function(data){
									var json={};
									json.data=data;
									var html=template('infoTemplate',json);
									$("#info").html(html);
								}
							});
							var shuzi=$(".shuzi").html();
							$(".shuzi").html(shuzi-1);
						}
				}
			});
		}
		//点击知道了按钮
		function knowFn(obj){
			var id=obj.getAttribute("data-id");
			$.ajax({
				type:"post",
				url:"/ZH/educational_administration_system/index.php/Teacher/Index/knowFn",
				async:true,
				data:{
					id:id
				},
				success:function(data){
					if(data=="ok"){
						$("#heiping").hide();
						$("#info").show();
						$("#infoDetail").hide();
						$.ajax({
								type:"POST",
								url:"/ZH/educational_administration_system/index.php/Teacher/Index/infoFn",
								async:true,
								dataType:"json",
								data:{
											currentPage:0,
										},
								success:function(data){
									var json={};
									json.data=data;
									var html=template('infoTemplate',json);
									$("#info").html(html);
								}
							});
							var shuzi=$(".shuzi").html();
							$(".shuzi").html(shuzi-1);
					}
				}
			});
		}
		//点击确定按钮上传数据到课程表并且删除该信息数据
		function loadFn(obj){
			var infoId=obj.getAttribute("data-id");
			var checkBoxs=document.getElementsByClassName("shijian");
			var str="";
			var level="";
			var name="<?php echo ($name); ?>";
			for(var i=0;i<checkBoxs.length;i++){
				if(checkBoxs[i].checked){
					str=str+" "+checkBoxs[i].value;
					if(level==""){
						level=checkBoxs[i].getAttribute("data-level");
					}else{
						level=level+","+checkBoxs[i].getAttribute("data-level");
					}
				}
			}
			if(str==""){
				alert("请选择上课时间");
			}else{
				$.ajax({
					type:"post",
					url:"/ZH/educational_administration_system/index.php/Teacher/Index/loadFn",
					async:true,
					data:{
						id:infoId,
						str:str,
						name:name,
						level:level
					},
					success:function(data){
						alert(data);
						if(data=="添加课程成功,并以发送课程反馈给管理员"){
							$("#heiping").hide();
							$("#info").show();
							$("#infoDetail").hide();
							$("#agreeCourse").hide();
							$.ajax({
								type:"POST",
								url:"/ZH/educational_administration_system/index.php/Teacher/Index/infoFn",
								async:true,
								dataType:"json",
								data:{
											currentPage:0,
										},
								success:function(data){
									var json={};
									json.data=data;
									var html=template('infoTemplate',json);
									$("#info").html(html);
								}
							});
							var shuzi=$(".shuzi").html();
							$(".shuzi").html(shuzi-1);
						}
					}
				});
			}
		}
	</script>
</html>