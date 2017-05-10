<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<style>
			body{
				background: url("/ZH/educational_administration_system/Public/img/bg.jpg") no-repeat;
			}
			.funcA{
				text-decoration: none;
				display: block;
				width:15vw;
				height:15vw;
				border-radius: 50%;
				font-size: 20px;
				background-color: cyan;
				opacity: 0.6;
				overflow: hidden;
			}
			.funcA>img{
				width:100%;
				height:100%;
				border-radius: 50%;
				transition:all 0.3s linear;
			}
			td{
				text-align: center;
			}
			.funcA>img:hover{
				transform: scale(1.5,1.5);
			}
		</style>
	</head>
	<body>
			<table align="center">
				<tr>
					<td><a href="/ZH/educational_administration_system/index.php/Admin/Content/addStudent" class="funcA">
						<img src="/ZH/educational_administration_system/Public/img/student.jpg"/>
					</a><span>添加学生</span></td>
					<td><a href="/ZH/educational_administration_system/index.php/Admin/Content/addTeacher" class="funcA">
						<img src="/ZH/educational_administration_system/Public/img/teacher.jpg"/>
					</a><span>添加教师</span></td>
					<td><a href="/ZH/educational_administration_system/index.php/Admin/Content/addCourse" class="funcA">
						<img src="/ZH/educational_administration_system/Public/img/course.jpg"/>
					</a><span>添加课程</span>
					</td>
					<td><a href="/ZH/educational_administration_system/index.php/Admin/Content/lookGrade" class="funcA">
						<img src="/ZH/educational_administration_system/Public/img/chengji.jpg"/>
					</a><span>查看成绩</span>
					</td>
				</tr>
				<tr>
					<td><a href="/ZH/educational_administration_system/index.php/Admin/Content/searchTeacher" class="funcA">
						<img src="/ZH/educational_administration_system/Public/img/teacher.jpg"/>
					</a><span>查看现有教师</span></td>
					<td><a href="/ZH/educational_administration_system/index.php/Admin/Content/searchClass" class="funcA">
						<img src="/ZH/educational_administration_system/Public/img/student.jpg"/>
					</a><span>查看班级学生</span></td>
					<td><a href="###" class="funcA"></a></td>
					<td><a href="/ZH/educational_administration_system/index.php/Home/System/doLogOut" target="_top" class="funcA">
						<img src="/ZH/educational_administration_system/Public/img/run.jpg"/>
					</a><span>退出系统</span></td>
				</tr>
			</table>
	</body>
	<script src="/ZH/educational_administration_system/Public/js/jquery-3.1.0.min.js"></script>
	<script type="text/javascript">
		//子窗口变化地址函数
		function changeAddress(address){
			$("iframe").attr('src',address);
		}
	</script>
</html>