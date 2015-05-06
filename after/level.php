<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="zh-CN" xml:lang="zh-CN" xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>银行小额信贷管理系统</title>
	<script  type="text/javascript">
		function changeLevel(level, clientId) {
			if (level >= 1 && level <= 5)
				window.location = "./action/changeLevel.php?id="+clientId+"&level="+level;
		}

		function changeValue(value) {
			alert(value);
		}

	</script> 
</head>
<body>
	<h1>贷后管理 - 五级分类</h1>

	<a href="after.html">返回上一页</a>
	<br />
	<br />
	
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
				while ( $data = mysql_fetch_assoc ( $req ) ) {
					if ($data['client_type'] == '1') {
						$clientType = "个人客户";
					} else if ($data['client_type'] == '2') {
						$clientType = "企业客户";
					}
					
					if ($data['level'] == 1) {
						$level = "正常";
					} else if ($data['level'] == 2) {
						$level = "关注";
					} else if ($data['level'] == 3) {
						$level = "次级";
					} else if ($data['level'] == 4) {
						$level = "可疑";
					} else if ($data['level'] == 5) {
						$level = "损失";
					}
					echo '<tr><td>' . $data ['client_name'] . '</td><td>' . $clientType . '</td><td>' . $level . '</td><td><select onchange="changeLevel(this.value, '.$data['client_id'].')">
							<option value=0></option>
							<option value=1>正常</option>
							<option value=2>关注</option>
							<option value=3>次级</option>
							<option value=4>可疑</option>
							<option value=5>损失</option>
						</select></td></tr>';
				}
				?>
			</tbody>
	</table>
	
	
</body>
</html>