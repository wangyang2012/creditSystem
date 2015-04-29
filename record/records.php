<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="zh-CN" xml:lang="zh-CN" xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>银行小额信贷管理系统</title>
	<script>
		function changeLevel(level, clientId) {
// 			var duration = document.getElementsByName("input"+i).value;
// 			alert("id="+id+"  i=" + i + "    value="+value;
			window.location = "./action/changeLevel.php?id="+id+"&level="+level;
		}
	</script> 
</head>
<body>
	<h1>不良记录管理 - 不良记录评分</h1>

	<a href="after.html">返回上一页</a>
	<br />
	<br />
	
	<h4>每条记录有五个信用等级，一级最好，五级最差。评级之后如果客户此前等级更加， 客户等级会更新。只有一级和二级的客户才有资格贷款。</h4>
	<table border="1">
		<thead>
			<th>客户姓名</th>
			<th>客户类型</th>
			<th>不良记录</th>
			<th>信用等级</th>
			<th>新信用等级</th>
		</thead>
		<tbody>
				<?php
				$db = mysql_connect ( 'localhost', 'root', '' );
				mysql_select_db ( 'creditsystem', $db );
				$sql = 'select client.client_id, client_name, client_type, client.level as clientLevel, note from client join record on client.client_id = record.client_id';
				$req = mysql_query ( $sql ) or die ( 'Erreur SQL: <br/>' . mysql_error () );
				$i = 0;
				while ( $data = mysql_fetch_assoc ( $req ) ) {
					if ($data['client_type'] == '1') {
						$clientType = "个人客户";
					} else if ($data['client_type'] == '2') {
						$clientType = "企业客户";
					}
					echo '<tr><td>' . $data ['client_name'] . '</td><td>' . $clientType . '</td><td>'.$data['note'].'</td><td>' . $data ['clientLevel'] . '</td><td><input type="text" name="input'.$i.'" onchange="changeLevel(this.value, '.$data['clientId'].')"/></td></tr>';
					$i = $i + 1;
				}
				?>
			</tbody>
	</table>
</body>
</html>