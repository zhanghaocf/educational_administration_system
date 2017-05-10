<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>管理页面</title>
		<link rel="stylesheet" type="text/css" href="/ZH/educational_administration_system/Public/css/bootstrap.min.css"/>
		<style type="text/css">
			*{margin:0;padding:0}
			header{
				background-color: #7aa1e6;
				height:120px;
				position:relative;
			}
			marquee{
				width:700px;
				color:white;
				font-size: 16px;
			}
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
				background: url("/ZH/educational_administration_system/Public/img/bg.jpg") no-repeat;
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
		</style>
	</head>
	<body>
		<header>
			<img src="/ZH/educational_administration_system/Public/img/toplogo.png"/><br/>
			<marquee><?php echo ($name); ?> 中午好！登录日期 2017/2/25 星期六</marquee>
			<div id="xiaoxi"><span class="glyphicon glyphicon-envelope"></span><p class="shuzi"><?php echo ($count); ?></p></div>
		</header>
		<iframe src="/ZH/educational_administration_system/index.php/Admin/Content/index" frameborder="0"></iframe>
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
					<p style="margin-top: 10px;">共有<span id="totalPage"><?php echo ($total); ?></span>页,当前第<span id="currentPage">1</span>页</p><?php endif; ?>			
			</div>
			<div id="infoDetail">
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
					<p class="infoDetailContent"><%=data.content[0]%></p>
					<a href="###" class="btn btn-info" data-id="<%=data.id%>" onclick="knowFn(this)">知道了</a>
					
	</script>
	<script type="text/javascript">
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
		$('marquee').html("<?php echo ($name); ?> "+timeFn()+"！ 登录日期 "+year+"/"+month+"/"+dat+" "+dayArr[day]);
		//子窗口大小
		$("iframe").css({
			'width':document.documentElement.clientWidth,
			'height':document.documentElement.clientHeight-$("header").height()-10
		});
		//打开消息窗口
		$("#xiaoxi").on('click',function(){
			$("#heiping").fadeIn();
		});
		//关闭消息窗口
		function closeFn(){
			$("#heiping").fadeOut();
		}
		//点击下一页
		var index=0;
//		var total=<?php echo ($total); ?>;
		function nextFn(){
			var total=$("#totalPage").html();
			index++;
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
			var total=$("#totalPage").html();
			index--;
			if(index<0){
				index=total-1;
			}
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
	</script>
</html>