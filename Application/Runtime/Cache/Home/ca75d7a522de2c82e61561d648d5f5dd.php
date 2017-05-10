<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" type="text/css" href="/ZH/educational_administration_system/Public/css/bootstrap.min.css"/>
		<style type="text/css">
			.title{
				width:760px;
				height:25px;
				background-color: #deebf7;
				font-size: 19px;
				text-align: center;
				line-height: 25px;
			}
			table{
				width:720px;
				table-layout: fixed;
				margin-top: 15px;
				margin-left: 10px;
				font-size: 12px;
			}
			th,td{
				border:1px solid #ff8c00;
				height:38px;
				text-align: center;
			}
		</style>
	</head>
	<body>
		<p class="title">学生课表查询</p>
		<table>
			<tr>
				<th colspan="2">课程/星期</th>
				<th>一</th>
				<th>二</th>
				<th>三</th>
				<th>四</th>
				<th>五</th>
				<th>六</th>
				<th>日</th>
			</tr>
			<tr>
				<td></td>
				<td>第1节</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td>第2节</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td>第3节</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td>第4节</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td>第5节</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td>第6节</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td>第7节</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td>第8节</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td>第9节</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td>第10节</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td>第11节</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td>第12节</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
		</table>
	</body>
	<script src="/ZH/educational_administration_system/Public/js/jquery-3.1.0.min.js"></script>
	<script type="text/javascript">
		var nameStr="<?php echo ($list); ?>";
		if(nameStr){
			var planStr="<?php echo ($plan); ?>";
			var levelStr="<?php echo ($level); ?>";
			var nameArr=nameStr.split(",");
			var planArr=planStr.split("|");
			var levelArr=levelStr.split("|");
			//把上课地址弄为1-305
			for(var i=0;i<planArr.length;i++){
				var f=planArr[i].lastIndexOf("-");
				var l=planArr[i].lastIndexOf("*");
				planArr[i]=planArr[i].slice(f-1,l);
			}
			for(var j=0;j<levelArr.length;j++){//设置选课程在表格哪个位置
				var arr=levelArr[j].split(",");
				if(arr.length==1){
					var colum=Math.ceil(arr[0]*2/12)+1,row=arr[0]*2%12-1;//表格第几列,表格第几行
					$("tr").eq(row).children()[colum].innerHTML=nameArr[j]+"<br/>"+planArr[j];
					$("tr").eq(row).children()[colum].setAttribute('rowspan',"2");
					$("tr").eq(Number(row)+1).children().last().remove();
				}else if(arr.length==2){
					if(Math.abs(arr[1]-arr[0])==1){
						var colum=Math.ceil(arr[0]*2/12)+1,row=arr[0]*2%12-1;//表格第几列,表格第几行
						$("tr").eq(row).children()[colum].innerHTML=nameArr[j]+"<br/>"+planArr[j];
						$("tr").eq(row).children()[colum].setAttribute('rowspan',"3");
						$("tr").eq(Number(row)+1).children().last().remove();
						$("tr").eq(Number(row)+2).children().last().remove();
					}else{
							var colum1=Math.ceil(arr[0]*2/12)+1,row1=arr[0]*2%12-1;//表格第几列,表格第几行
							$("tr").eq(row1).children()[colum1].innerHTML=nameArr[j]+"<br/>"+planArr[j];
							$("tr").eq(row1).children()[colum1].setAttribute('rowspan',"2");
							$("tr").eq(Number(row1)+1).children().last().remove();
							var colum2=Math.ceil(arr[1]*2/12)+1,row2=arr[1]*2%12-1;//表格第几列,表格第几行
							$("tr").eq(row2).children()[colum2].innerHTML=nameArr[j]+"<br/>"+planArr[j];
							$("tr").eq(row2).children()[colum2].setAttribute('rowspan',"2");
							$("tr").eq(Number(row2)+1).children().last().remove();
					}
				}
			}
		}
	</script>
</html>