<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" type="text/css" href="/ZH/educational_administration_system/Public/css/bootstrap.min.css"/>
		<style type="text/css">
			body{
				margin-left: 20px;
				margin-top:5px;
				background-color: #deebf7;
			}
			section{
				overflow: hidden;
				width:1090px;
				border:1px solid #9a9a9a;
				border-right:none;
			}
			.left{
				width:208px;
				float:left;	
				padding-top:10px;
				text-align: center;
			}
			.label1{
				margin-left: 38px;
			}
			.label1>select{
				width:80px;
			}
			#sureBtn{
				width:70px;
				margin-left:72px;
			}
			.divList{
				width:100%;
				height:420px;
				overflow: auto;
				margin-top: 8px;
			}
			#proList{
				margin-left: 10px;
			}
			#proList>li{
				width:150px;
				height:18px;
				text-align: center;
				font-size: 13px;
				border:1px solid #9a9a9a;
				border-top:none;
			}
			#proList>li>a{
				display: block;
				width:100%;
				height:100%;
				text-decoration: none;
				font-size: 13px;
				/*text-align: center;*/
			}
			#proList>li:nth-child(2n)>a{
				background-color:white ;
			}
			#proList>li:nth-child(1){
				background-color: #7aa1e6;
				border-top:1px solid #9a9a9a;
			}
			.right{
				width:870px;
				float:left;
			}
			#mulu{
				width:100%;
				background-color: #7aa1e6;
				overflow: hidden;
				border:1px solid #003C2D;
				padding:25px;
			}
			#mulu .muluT:nth-child(2n+1){
				border:5px solid black;
				width:400px;
				float:left;
			}
			#mulu .muluT:nth-child(2n){
				border:5px solid black;
				width:400px;
				float:right;
			}
			.muluT td{
				border:1px solid black;
				padding:5px;
			}
			.muluT{
				margin-top: 15px;
				table-layout: fixed;
			}
			.label{
				float: right;
			}
			.label>input{
				vertical-align: bottom;
			}
		</style>
	</head>
	<body>
		<section>
			<div class="left">
				<label for="" class="label1">年&nbsp;&nbsp;&nbsp;级：<select><option value="0">2013</option><option value="1">2014</option><option value="2">2015</option><option value="3">2016</option></select></label><br/>
				<a href="###" id="sureBtn" class="btn btn-info btn-xs">确定</a>
				<div class="divList">
					<ul id="proList" class="list-unstyled">
						<li>专业</li>
						<li><a href="###">计算机</a></li>
						<li><a href="###">法学</a></li>
						<li><a href="###">计算机</a></li>
						<li><a href="###">计算机</a></li>
						<li><a href="###">计算机</a></li>
						<li><a href="###">计算机</a></li>
						<li><a href="###">计算机</a></li>
						<li><a href="###">计算机</a></li>
						<li><a href="###">计算机</a></li>
						<li><a href="###">计算机</a></li>
						<li><a href="###">计算机</a></li>
						<li><a href="###">计算机</a></li>
						<li><a href="###">计算机</a></li>
						<li><a href="###">计算机</a></li>
						<li><a href="###">计算机</a></li>
						<li><a href="###">计算机</a></li>
						<li><a href="###">计算机</a></li>
						<li><a href="###">计算机</a></li>
						<li><a href="###">计算机</a></li>
						<li><a href="###">计算机</a></li>
						<li><a href="###">计算机</a></li>
						<li><a href="###">计算机</a></li>
						<li><a href="###">计算机</a></li>
						<li><a href="###">计算机</a></li>
						<li><a href="###">计算机</a></li>
						<li><a href="###">计算机</a></li>
						<li><a href="###">计算机</a></li>
						<li><a href="###">计算机</a></li>
						<li><a href="###">计算机</a></li>
						<li><a href="###">计算机</a></li>
						<li><a href="###">计算机</a></li>
						<li><a href="###">计算机</a></li>
						<li><a href="###">计算机</a></li>
						<li><a href="###">计算机</a></li>
						<li><a href="###">计算机</a></li>
						<li><a href="###">计算机</a></li>
						<li><a href="###">计算机</a></li>
						<li><a href="###">计算机</a></li>
						<li><a href="###">计算机</a></li>
					</ul>
				</div>
				<p style="margin-left: 10px;margin-bottom: 30px;">
					可用选修学分:<span style="color:red">后付费，暂不限</span><br/>
					可用重修学分:<span style="color:red">后付费，暂不限</span><br/>
					可用副修学分:<span style="color:red">后付费，暂不限</span><br/>
				</p>
				<a href="###" style="font-size: 25px;">查看已选科目</a><br/>
				<a href="###" class="btn btn-info">退出</a>
			</div>
			<div class="right">
				<p>您自己的年级为:<?php echo ($nianji); ?>    专业为: <?php echo ($profession); ?></p>
				<p class="xuanze">您目前选择的年级为:<span>2013</span>    专业为:<span><?php echo ($profession); ?></span></p>
				<div id="mulu">
					<?php if(is_array($list)): foreach($list as $key=>$vo): ?><table class="muluT" style="border-collapse: initial;">
							<tr>
								<td>课程名称</td>
								<td colspan="2"><?php echo ($vo["name"]); ?></td>
								<td>
									<a href="###" data-id="<?php echo ($vo["id"]); ?>" class="selectA" onclick="clickFn(this)">未选</a>
									<label for="" class="label"><input type="checkbox" name="" id="" value="" />副修</label>
								</td>
							</tr>
							<tr>
								<td>教师姓名</td>
								<td><?php echo ($vo["teacher"]); ?></td>
								<td>学分</td>
								<td><?php echo ($vo["score"]); ?></td>
							</tr>
							<tr>
								<td style="height:70px">上课安排</td>
								<td colspan="3"><?php echo ($vo["plan"]); ?></td>
							</tr>
							<tr>
								<td>可选人数</td>
								<td><?php echo ($vo["count"]); ?></td>
								<td>已选人数</td>
								<td>不及时更新</td>
							</tr>
							<tr>
								<td>学习性质</td>
								<td><?php echo ($vo["type"]); ?></td>
								<td>是否订购教材</td>
								<td>否</td>
							</tr>
							<tr>
								<td>先修课程</td>
								<td colspan="2"></td>
								<td><a href="###">课程别称和使用教材</a></td>
							</tr>
						</table><?php endforeach; endif; ?>
					<?php if(is_array($list1)): foreach($list1 as $key=>$vo): ?><table class="muluT" style="border-collapse: initial;">
							<tr><td>课程名称</td>
								<td colspan="2"><?php echo ($vo["name"]); ?></td>
								<td>
									<a href="###" data-id="<?php echo ($vo["id"]); ?>" class="selectA" onclick="clickFn(this)">未选</a>
									<label for="" class="label"><input type="checkbox" name="" id="" value="" />副修</label>
								</td></tr>
							<tr><td>教师姓名</td>
								<td><?php echo ($vo["teacher"]); ?></td>
								<td>学分</td>
								<td><?php echo ($vo["score"]); ?></td></tr>
							<tr><td style="height:70px">上课安排</td>
								<td colspan="3"><?php echo ($vo["plan"]); ?></td></tr>
							<tr><td>可选人数</td>
								<td><?php echo ($vo["count"]); ?></td>
								<td>已选人数</td>
								<td>不及时更新</td></tr>
							<tr><td>学习性质</td>
								<td><?php echo ($vo["type"]); ?></td>
								<td>是否订购教材</td>
								<td>否</td></tr>
							<tr><td>先修课程</td>
								<td colspan="2"></td>
								<td><a href="###">课程别称和使用教材</a></td></tr>
						</table><?php endforeach; endif; ?>
				</div>
			</div>
		</section>
	</body>
	<script src="/ZH/educational_administration_system/Public/js/jquery-3.1.0.min.js"></script>
	<script type="text/javascript">
		$("#proList a").on('click',function(){
			var pro=$(this).html();
			$("#mulu").html("");
			$(".xuanze span").eq(1).html(" "+pro);
			$.ajax({
						'url':"/ZH/educational_administration_system/index.php/Home/Content/xuankeContent1",
						dataType:"json",
						type:"POST",
						data:{
							pro:pro,
						},
						async:true,
							success:function(data){
								for(var i=0;i<data.length;i++){
									$("#mulu").append($("<table class='muluT' style='border-collapse: initial;'><tr><td>课程名称</td><td colspan='2'>"+data[i].name+"</td><td><a href='###' data-id='"+data[i].id+"' class='selectA' onclick='clickFn(this)'>未选</a><label class='label'><input type='checkbox'/>副修</label></td></tr><tr><td>教师姓名</td><td>"+data[i].teacher+"</td><td>学分</td><td>"+data[i].score+"</td></tr><tr><td style='height:70px'>上课安排</td><td colspan='3'>"+data[i].plan+"</td></tr><tr><td>可选人数</td><td>"+data[i].count+"</td><td>已选人数</td><td>不及时更新</td></tr><tr><td>学习性质</td><td>"+data[i].type+"</td><td>是否订购教材</td><td>否</td></tr><tr><td>先修课程</td><td colspan='2'></td><td><a href='###'>课程别称和使用教材</a></td></tr></table>"));
								}
								var courseID=data[0].courseID;
										if(courseID){
											var courseArr=courseID.split(",");
											for(var i=0;i<courseArr.length;i++){
												for(var j=0;j<$(".selectA").length;j++){
													if($(".selectA").eq(j).data('id')==courseArr[i]){
														$(".selectA")[j].innerText="已选";
													}
												}
											}
										}
							}
				});
		});
		$("#sureBtn").on("click",function(){
			var yearArr=['2013','2014','2015','2016'];
//			alert($(".label1 select").val());
			$(".xuanze span").eq(0).html(yearArr[$(".label1 select").val()]);
		});
		//点击选课
		function clickFn(object){
			var cId=object.getAttribute('data-id');
			$.post('/ZH/educational_administration_system/index.php/Home/Content/weixuan',{'cId':cId},function(data){
				alert(data);
				if(data=="成功选课"){
					object.innerText="已选";
				}
			});
		}
		//标记已选课程
		var courseID="<?php echo ($courseID); ?>";
		if(courseID){
			var courseArr=courseID.split(",");
			for(var i=0;i<courseArr.length;i++){
				for(var j=0;j<$(".selectA").length;j++){
					if($(".selectA").eq(j).data('id')==courseArr[i]){
						$(".selectA")[j].innerText="已选";
					}
				}
			}
		}
	</script>
</html>