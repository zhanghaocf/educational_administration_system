<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" type="text/css" href="/ZH/educational_administration_system/Public/css/bootstrap.min.css"/>
		<style>
			body{
				padding:15px;
			}
			.zhuyi{
				font-size: 18px;
			}
			.title{
				border:1px solid #a3c0e8;
				text-align: center;
				font-size: 20px;
				padding:5px;
				background-color: #f7faff;
				margin-bottom:0;
			}
			table{
				width:100%;
			}
			th{
				background-color: #cde2fc;
			}
			th,td{
				text-align: center;
				border:1px solid #bed6f6;
				padding:5px;
			}
			#dayin{
				width:30px;
				height:30px;
				position:absolute;
				right:10px;
				bottom:10px;
				cursor: pointer;
			}
		</style>
	</head>
	<body>
		<p class="zhuyi">1.下面是你获取的所有成绩，一门课程如果修读多次，将会有多条记录,对应学分合计中，也将累加多次。</p>
		<p class="zhuyi">2.您可以通过点击列的标题进行排序，也可以进行分组、筛选、查询等方式，查看自己的成绩情况。</p>
		<p class="zhuyi">3.成绩仅供参考，具体成绩以教务处发布为准。</p>
		<div id="content">
			<p class="title">学生成绩查询</p>
			<table id="gradeT">
				<tr>
					<th>课程名称</th>
					<th>总成绩</th>
					<th>平时</th>
					<th>期中</th>
					<th>实践</th>
					<th>期末</th>
					<th>指导老师</th>
				</tr>
				<!--<tr>
					<td>1</td>
					<td>1</td>
					<td>11</td>
					<td>1</td>
					<td>1</td>
					<td>1</td>
					<td><?php echo ($haha); ?></td>
				</tr>-->
				<?php if(($count == 0)): ?><tr>
						<td colspan="7">暂时没有数据</td>
					</tr>
				<?php else: ?>
					<?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr>
							<td><?php echo ($vo["coursename"]); ?></td>
							<td><?php echo ($vo["grade"]); ?></td>
							<td><?php echo ($vo["pingshi"]); ?></td>
							<td><?php echo ($vo["qizhong"]); ?></td>
							<td><?php echo ($vo["shijian"]); ?></td>
							<td><?php echo ($vo["qimo"]); ?></td>
							<td><?php echo ($vo["teacher"]); ?></td>
						</tr><?php endforeach; endif; endif; ?>
			</table>
		</div>
		<img title="打印" src="/ZH/educational_administration_system/Public/img/dayin.png" alt="" id="dayin" />
	</body>
	<script>
		document.getElementById("dayin").onclick=function(){
			window.print();
		}
	</script>
</html>