<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>文正院教务子系统</title>
		<link rel="stylesheet" type="text/css" href="/ZH/educational_administration_system/Public/css/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="/ZH/educational_administration_system/Public/css/stu_system.css"/>
	</head>
	<body>
		<header>
			<img src="/ZH/educational_administration_system/Public/img/toplogo.png"/><br/>
			<marquee>张豪 中午好！登录日期 2017/2/25 星期六</marquee>
		</header>
		<section>
			<div class="nav">
				<ul id="personInfo">
					<li><a href="###">个人信息<img class="downJiao zhuan" src="/ZH/educational_administration_system/Public/img/f103.png" alt="" /></a>
						<ul class="liList">
							<li><a href="###"><span class="glyphicon glyphicon-pencil"> 学籍信息</a></li>
							<li><a href="###"><span class="glyphicon glyphicon-pencil"> 修改学籍</a></li>
							<li><a href="###"><span class="glyphicon glyphicon-pencil"> 异动信息</a></li>
							<li><a href="###"><span class="glyphicon glyphicon-pencil"> 奖惩信息</a></li>
							<li><a href="###"><span class="glyphicon glyphicon-pencil"> 行为学分</a></li>
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
					<li><a href="###">等级考试报名系统<img class="downJiao zhuan" src="/ZH/educational_administration_system/Public/img/f103.png" alt="" /></a>
						<ul class="liList">
							<li><a href="###"><span class="glyphicon glyphicon-pencil"> 等级考试报名（含改选）</a></li>
							<li><a href="###"><span class="glyphicon glyphicon-pencil"> 等级考试报名退选</a></li>
							<li><a href="###"><span class="glyphicon glyphicon-pencil"> 等级考试报名查询</a></li>
							<li><a href="###"><span class="glyphicon glyphicon-pencil"> 等级考试成绩</a></li>
							<li><a href="###"><span class="glyphicon glyphicon-pencil"> 历史等级考试报名查询</a></li>
						</ul>
					</li>
					<li><a href="###">自主报名系统<img class="downJiao zhuan" src="/ZH/educational_administration_system/Public/img/f103.png" alt="" /></a>
						<ul class="liList">
							<li><a href="###"><span class="glyphicon glyphicon-pencil"> 自主报名</a></li>
							<li><a href="###"><span class="glyphicon glyphicon-pencil"> 报名历史记录查询</a></li>
						</ul>
					</li>
					<li><a href="###">成绩和学分<img class="downJiao zhuan" src="/ZH/educational_administration_system/Public/img/f103.png" alt="" /></a>
						<ul class="liList">
							<li><a href="###"><span class="glyphicon glyphicon-pencil"> 成绩浏览</a></li>
							<li><a href="###"  onclick="changeAddress('/ZH/educational_administration_system/index.php/Home/Content/all_exam')"><span class="glyphicon glyphicon-pencil"> 所有成绩</a></li>
							<li><a href="###" onclick="changeAddress('/ZH/educational_administration_system/index.php/Home/Content/final_exam')"><span class="glyphicon glyphicon-pencil"> 期末成绩</a></li>
							<li><a href="###"><span class="glyphicon glyphicon-pencil"> 过程化考试成绩</a></li>
							<li><a href="###"><span class="glyphicon glyphicon-pencil"> 学分互认</a></li>
							<li><a href="###"><span class="glyphicon glyphicon-pencil"> 教学进程（测试中）</a></li>
						</ul>
					</li>
					<li><a href="###">选课结果检查<img class="downJiao zhuan" src="/ZH/educational_administration_system/Public/img/f103.png" alt="" /></a>
						<ul class="liList">
							<li><a href="###"><span class="glyphicon glyphicon-pencil"> 结果核对</a></li>
						</ul>
					</li>
					<li><a href="###">网上选课（含选课结果）<img class="downJiao zhuan" src="/ZH/educational_administration_system/Public/img/f103.png" alt="" /></a>
						<ul class="liList">
							<li><a href="###" onclick="changeAddress('/ZH/educational_administration_system/index.php/Home/Content/xuanke')"><span class="glyphicon glyphicon-pencil"> 网上选课（含选课结果）</a></li>
							<li><a href="###"><span class="glyphicon glyphicon-pencil"> 打印补选单</a></li>
							<li><a href="###"><span class="glyphicon glyphicon-pencil"> 打印退选单</a></li>
						</ul>
					</li>
					<li><a href="###">考试<img class="downJiao zhuan" src="/ZH/educational_administration_system/Public/img/f103.png" alt="" /></a>
						<ul class="liList">
							<li><a href="###"><span class="glyphicon glyphicon-pencil"> 本学期考试安排</a></li>
							<li><a href="###"><span class="glyphicon glyphicon-pencil"> 毕业班插班考试</a></li>
						</ul>
					</li>
					<li><a href="###">教材信息<img class="downJiao zhuan" src="/ZH/educational_administration_system/Public/img/f103.png" alt="" /></a>
						<ul class="liList">
							<li><a href="###"><span class="glyphicon glyphicon-pencil"> 所用教材浏览</a></li>
						</ul>
					</li>
					<li><a href="###">系统相关<img class="downJiao zhuan" src="/ZH/educational_administration_system/Public/img/f103.png" alt="" /></a>
						<ul class="liList">
							<li><a href="###"><span class="glyphicon glyphicon-pencil"> 显示默认信息</a></li>
							<li><a href="/ZH/educational_administration_system/index.php/Home/System/doLogOut"><span class="glyphicon glyphicon-pencil"> 退出系统</a></li>
						</ul>
					</li>
					<li><a href="###">毕业离校<img class="downJiao zhuan" src="/ZH/educational_administration_system/Public/img/f103.png" alt="" /></a>
						<ul class="liList">
							<li><a href="###"><span class="glyphicon glyphicon-pencil"> 毕业离校时间选择</a></li>
						</ul>
					</li>
				</ul>
			</div>
			<iframe src="/ZH/educational_administration_system/index.php/Home/Content/all_exam" width="" height=""></iframe>
		</section>
	</body>
	<script src="/ZH/educational_administration_system/Public/js/jquery-3.1.0.min.js"></script>
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
		$('marquee').html("<?php echo ($name); ?> "+timeFn()+"！ 登录日期 "+year+"/"+month+"/"+dat+" "+dayArr[day]);
	
	//右窗口变化地址函数
	function changeAddress(address){
		$("iframe").attr('src',address);
	}
	</script>
</html>