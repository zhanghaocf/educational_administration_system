<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<style>
			*{margin:0;padding:0}
			table{
				border:1px solid black;
				width:402px;
				font-size: 14px;
				margin-left: 180px;
				margin-top: 10px;
			}
			td{
				border:1px solid black;
			}
			.change{
				font-size: 20px;
				padding:15px;
				/*animation: change 1s linear infinite;*/
			}
			/*@keyframes change{
				from{
					color:black;
				}
				to{
					color:red;
				}
			}*/
			.red{
				color:darkred;
			}
			#attention{
				width:765px;
				margin-left: 5px;
				display: none;
			}
			.a_title{
				background-color: #deebf7;
				height:45px;
				font-size: 17px;
				font-weight: bold;
				text-align: center;
				line-height: 45px;
			}
			.xieyi{
				font-size: 16px;
				font-weight: bold;
				text-align: center;
			}
			.content{
				line-height: 30px;
				font-size: 13px;
			}
			.Abtn{
				display: inline-block;
				vertical-align: middle;
				width:130px;
				height:25px;
				font-size: 13px;
				line-height: 25px;
				text-decoration: none;
				text-align: center;
				border:1px solid transparent;
			}
			.Abtn:hover{
				border:1px solid dodgerblue;
			}
		</style>
	</head>
	<body>
		<table>
			<tr>
				<td colspan="2"></td>
			</tr>
			<tr>
				<td>选课结果处理方式</td>
				<td>先到先得</td>
			</tr>
			<tr>
				<td>本轮选课开放时间</td>
				<td>2017/2/19 8:00:00--2017/3/5 23:58:58</td>
			</tr>
			<tr>
				<td>本轮的最低学分数</td>
				<td>0</td>
			</tr>
			<tr>
				<td>你本轮选课权限</td>
				<td>既可选又可退</td>
			</tr>
			<tr>
				<td colspan="2"><a href="###" onclick="attentionFn()">开始选课</a></td>
			</tr>
			<tr>
				<td colspan="2"><a href="###">开始退课</a></td>
			</tr>
			<tr>
				<td colspan="2"><a href="###">选课结果</a></td>
			</tr>
			<tr>
				<td colspan="2" class="change">如有多位同学共用电脑选课，务请前一位同学选完课安全退出，关闭浏览器后下一位同学再打开浏览器！</td>
			</tr>
			<tr>
				<td colspan="2">第一步： 教学评估，如果已评估，这步将会跳过<br/>第二步： 判断学生学籍状态和财务欠费状况，如果财务欠费，又没有申请绿色通道，将不允许选课<br/>第三步： 学生填写希望选修的学分数，不能低于管理员设置的最低学分数，并且这个值关系到后期的选课结果<br/>第四步：列出老生必须上的必修课（不能不选），列出新生的推荐必修课（可以不选，但可能会影响以后的学习）<br/>第五步：学生选择课程<br/>第六步：修改志愿号，提交志愿</td>
			</tr>
		</table>
		<div id="attention">
			<p class="a_title">关于选课的几点注意事项</p>
			<p class="xieyi">苏州大学文正学院学分制选课协议</p>
			<p class="content">现将本选课程序的使用权授予您。但您必须作以下保证：<br/>1. 您在本选课程序中提交的所有数据，即表示您在本次选课中的选课志愿，是您个人意愿的明确表示。<br/>2. 所有的课程都要在本选课程序中选定，包括必修课、选修课、副修课、重新学习课。<br/>3. 在您使用本选课程序时，表示您已经弄清楚您所希望选修的课程的上课要求（如：教学内容、教学方向、是否需要前期准备知识等）和各种性质的课程的区别（如选修课和副修课的区别，具体区别可查看《教学手册》）。<br/>4. 第一轮、第二轮选课期间学生可以自主选择是否订购教材,课程所使用的教材有可能因为版本等问题进行更换，以最后实际发放为准。<br/>本选课程序在此作如下友情提示：<br/>

（1）跨学期上课的课程(如大学英语、微积分、体育、普通物理等)，请您一定要选对正确的学期和上课班级。<br/>

（2）选课时要避免所选课程与本专业必修(或专业选修)课程重复，同一门课程只能获得一次学分。<br/>

（3）在第二轮(补选)期间，请您浏览自己的选课结果，如果没有达到自己所需的学分您还可以在补选时进行补选。<br/>

（4）在选课的过程中，请您务必留心您所选的课程的已选人数，因为不满30人的课最终是不开的(艺术课程除外)。<br/>

（5）在第一轮(筛选模式)填志愿时，请您务必注意，只有点击［提交］后的数据，系统才是确认的。另外还有一个界面是让您安排志愿的顺序的，在该界面中请认真安排志愿的顺序，顺序号不能为0，也不能重复。<br/>

（6）如果在相应的学期和班级中找不到要重新学习的课程，请您及时与班主任和教务处联系，并在选课期间加以解决，以免影响正常毕业。<br/><br/>

至此，您肯定已经详细阅读并已理解本协议，并同意严格遵守各条款。</p>
				<a href="###" class="Abtn" style="margin-left:225px;background-color: #7aa1e6;color:white;" onclick="attentionFn1()">不接受（返回）</a>
				<a href="/ZH/educational_administration_system/index.php/Home/Content/xuankeContent" class="Abtn" style="margin-left:62px;background-color: #7aa1e6;color:white;">我接受（开始选课）</a>
		</div>
	</body>
	<script src="/ZH/educational_administration_system/Public/js/jquery-3.1.0.min.js"></script>
	<script type="text/javascript">
		var timer=setInterval(function(){
			$(".change").toggleClass("red");
		},500);
		
		function attentionFn(){
			$("table").css('display','none');
			$("#attention").css('display','block');
		}
		function attentionFn1(){
			$("table").css('display','block');
			$("#attention").css('display','none');
		}
	</script>
</html>