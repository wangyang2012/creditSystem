<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="zh-CN" xml:lang="zh-CN" xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>银行小额信贷管理系统</title>
	<script  type="text/javascript">
		function changeLevel(level, clientId) {
			window.location = "./action/changeLevel.php?id="+clientId+"&level="+level;
		}
	</script> 
</head>
<body>
	<h1>贷后管理 - 五级消分</h1>

	<a href="after.html">返回上一页</a>
	<br />
	<br />
	
	<h4>每个客户有五个信用等级，一级最好，五级最差。只有一级和二级的客户才有资格贷款。</h4>
	<table border="1">
		<thead>
			<th>客户姓名</th>
			<th>客户类型</th>
			<th>信用等级</th>
			<th>新信用等级</th>
		</thead>
		<tbody>
				<?php
				$db = mysql_connect ( 'localhost', 'root', '' );
				mysql_select_db ( 'creditsystem', $db );
				$sql = 'select * from client';
				$req = mysql_query ( $sql ) or die ( 'Erreur SQL: <br/>' . mysql_error () );
				$i = 0;
				while ( $data = mysql_fetch_assoc ( $req ) ) {
					if ($data['client_type'] == '1') {
						$clientType = "个人客户";
					} else if ($data['client_type'] == '2') {
						$clientType = "企业客户";
					}
					echo '<tr><td>' . $data ['client_name'] . '</td><td>' . $clientType . '</td><td>' . $data ['level'] . '</td><td><input type="text" name="input'.$i.'" onchange="changeLevel(this.value, '.$data['client_id'].')"/></td></tr>';
					$i = $i + 1;
				}
				?>
			</tbody>
	</table>
</body>
</html>