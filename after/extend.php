<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="zh-CN" xml:lang="zh-CN" xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>银行小额信贷管理系统</title> 
		<script>
			function extendDuration(id, duration, extension) {
				window.location = "./action/extend.php?id="+id+"&duration="+duration+"&extension="+extension;
			}
		</script>

</head>
<body>
	<h1>贷后管理 - 贷款展期</h1>

	<a href="after.html">返回上一页</a>
	<br />
	<br />
	<table border="1">
		<thead>
			<th>客户姓名</th>
			<th>客户类型</th>
			<th>贷款金额</th>
			<th>贷款时长</th>
			<th>新时长</th>
		</thead>
		<tbody>
				<?php
				$db = mysql_connect ( 'localhost', 'root', '' );
				mysql_select_db ( 'creditsystem', $db );
				$sql = 'select distribution_id, client_name, client_type, amount, duration from distribution join client on client.client_id = distribution.client_id';
				$req = mysql_query ( $sql ) or die ( 'Erreur SQL: <br/>' . mysql_error () );
				$i = 0;
				while ( $data = mysql_fetch_assoc ( $req ) ) {
					if ($data['client_type'] == '1') {
						$clientType = "个人客户";
					} else if ($data['client_type'] == '2') {
						$clientType = "企业客户";
					}
					echo '<tr><td>' . $data ['client_name'] . '</td><td>' . $clientType . '</td><td>' . $data ['amount'] . '</td><td>' . $data ['duration'] . '</td><td><input type="text" onchange="extendDuration('.$data['distribution_id'].', '.$data['duration'].', this.value)"/></td></tr>';
					$i = $i + 1;
				}
				?>
			</tbody>
	</table>
</body>
</html>