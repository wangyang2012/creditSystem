<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="zh-CN" xml:lang="zh-CN" xmlns="http://www.w3.org/1999/xhtml">
	<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>银行小额信贷管理系统</title>
		<script>
			function deleteClient(id) {
					window.location = "./action/deleteClient.php?id="+id;
			}
		</script>
	</head>
	<body>
		<h1>系统维护 - 客户维护</h1>
		<a href="system.html">返回上一页</a> <br/><br/>
		
		<h2>个人客户</h2>
		<table border='1'>
			<?php
				echo '<tr><th>姓名</th><th>删除</th></tr>';
				$db = mysql_connect('localhost', 'root', '');
				mysql_select_db('creditsystem', $db);
				$sql = 'select * from client where client_type = 1';
				$req = mysql_query($sql) or die('Erreur SQL: <br/>'.mysql_error());
				while ($data = mysql_fetch_assoc($req)) {
					echo '<tr><td>'.$data['client_name'].'</td><td><input type=button onclick="deleteClient('.$data['client_id'].')" value="删除"/></td></tr>';
				}
				mysql_close();
			?>
		</table>
		<br/><br/>
		<hr/>
		<br/><br/>
		
		<h2>企业客户</h2>
		<table border='1'>
			<?php
				echo '<tr><th>名称</th><th>删除</th></tr>';
				$db = mysql_connect('localhost', 'root', '');
				mysql_select_db('creditsystem', $db);
				$sql = 'select * from client where client_type = 2';
				$req = mysql_query($sql) or die('Erreur SQL: <br/>'.mysql_error());
				while ($data = mysql_fetch_assoc($req)) {
					echo '<tr><td>'.$data['client_name'].'</td><td><input type=button onclick="deleteClient('.$data['client_id'].')" value="删除"/></td></tr>';
				}
				mysql_close();
			?>
		</table>
	</body>
</html>