<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>添加课程</title>
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
			table{
				text-align:center;
				margin:0 auto;
			}
			table td{
				padding:10px 0 10px;
			}
			.left{
				text-align: left;
			}
			#floor{
				width:40px;
			}
		
		</style>
	</head>
	<body>
		<section>
			<table>
				<tr>
					<td><label for="name">课程名:</label></td>
					<td class="left"><input id="name" type="text"></td>
				</tr>
				<tr>
					<td><label for="score">学分:</label></td>
					<td class="left"><input id="score" type="text"><span id="scoreSpan" style='color:red;display:none'>只能输纯数字<span></td>
				</tr>
				<tr>
					<td><label for="">学习性质:</label></td>
					<td class="left"><select id="type"><option value="必修">必修</option><option value="非本专业选修">非本专业选修</option><option value="本专业选修">本专业选修</option></select></td>
				</tr>
				<tr>
					<td><label for="">专业:</label></td>
					<td class="left"><select id="profession"><option value="all">all</option><option value="计算机">计算机</option><option value="法学">法学</option></select></td>
				</tr>
				<tr>
					<td><label for="banji">安排:</label></td>
					<td class="left"><input type="text" id="banji" />班<select name="" id="floor"><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option></select>号楼<input type="text" id="room" placeholder="例如5-106" /><span id="roomSpan" style='color:red;display:none'>注意格式，例如1-203</span></td>
				</tr>
				<tr>
					<td><label for="count">可选人数:</label></td>
					<td class="left"><input type="text" id="count" /><span id="countSpan" style='color:red;display:none'>请输入纯数字</span></td>
				</tr>
				<tr>
					<td><label for="">分给老师:</label></td>
					<td class="left"><select id="teacher">
						<?php if(is_array($list)): foreach($list as $key=>$vo): ?><option value="<?php echo ($vo["user"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; ?>
					</select></td>
				</tr>
				<tr>
					<td colspan="2"><a href="###" class="btn btn-info" id="sureBtn" style="margin-right: 10px;">确定</a><a href="/ZH/educational_administration_system/index.php/Admin/Content/index" class="btn btn-info">返回</a></td>
				</tr>
			</table>
		</section>
	</body>
	<script src="/ZH/educational_administration_system/Public/js/jquery-3.1.0.min.js"></script>
	<script>
			var name1=$("#name");
			var score=$("#score");
			var type=$("#type");
			var profession=$("#profession");
			var banji=$("#banji");
			var floor=$("#floor");
			var room=$("#room");
			var count=$("#count");
			var teacher=$("#teacher");
			var scoreBol=true;
			var roomBol=true;
			var countBol=true;
			score.blur(function(){
						var reg=/^[0-9]+$|^\d+\.?\d+$/g;
						if(!(reg.test(score.val()))){
							scoreBol=false;
							$("#scoreSpan").show();
						}else{
							$("#scoreSpan").hide();
						}
			});
			room.blur(function(){
				var reg=/^\d\-\d{3}$/g;
				if(!(reg.test(room.val()))){
							roomBol=false;
							$("#roomSpan").show();
						}else{
							$("#roomSpan").hide();
						}
			});
			count.blur(function(){
						var reg=/^[0-9]+$/g;
						if(!(reg.test(count.val()))){
							countBol=false;
							$("#countSpan").show();
						}else{
							$("#countSpan").hide();
						}
			});
		$("#sureBtn").on("click",function(){
			if(name1.val()==""||score.val()==""||banji.val()==""||room.val()==""||count.val()==""){
				alert("请填写完整信息");
			}else if(scoreBol&&roomBol&&countBol){
				var data=new Date();
				var time=data.getFullYear()+"-"+data.getMonth()+"-"+data.getDate()+" "+data.getHours()+":"+data.getMinutes()+":"+data.getSeconds();
				$.ajax({
						'url':"/ZH/educational_administration_system/index.php/Admin/Content/courseInfo",
						dataType:"json",
						type:'POST',
						data:{
							reader:teacher.val(),
							title:'课程安排',
							time:time,
							content:{
								name:name1.val(),
								score:score.val(),
								type:type.val(),
								profession:profession.val(),
								banji:banji.val(),
								floor:floor.val(),
								room:room.val(),
								count:count.val(),
							}
						},
						async:true,
							success:function(data){
								alert(data);
								if(data=="发送课程通知成功"){
									name1.val("");
									score.val("");
									banji.val("");
									floor.val("");
									room.val("");
									count.val("");
								}
							}
				});
			}
		});
	</script>
</html>