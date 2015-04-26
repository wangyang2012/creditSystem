<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="zh-CN" xml:lang="zh-CN" xmlns="http://www.w3.org/1999/xhtml">
	<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>银行小额信贷管理系统</title>
	</head>
	<body>
		<h1>客户管理 - 企业客户</h1>
		<a href="client.html">返回上一页</a> <br/><br/>
		
		<table border='1'>
			<?php
				echo '<tr><th>企业名称</th><th>财务报表</th><th>业务基本情况</th></tr>';
				$db = mysql_connect('localhost', 'root', '');
				mysql_select_db('creditsystem', $db);
				$sql = 'select * from client where client_type = 2';
				$req = mysql_query($sql) or die('Erreur SQL: <br/>'.mysql_error());
				while ($data = mysql_fetch_assoc($req)) {
					echo '<tr><td>'.$data['client_name'].'</td><td>'.$data['finance'].'</td><td>'.$data['business'].'</td></tr>';
				}
				mysql_close();
			?>
		</table>
	</body>
</html>