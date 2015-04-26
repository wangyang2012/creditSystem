<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="zh-CN" xml:lang="zh-CN" xmlns="http://www.w3.org/1999/xhtml">
	<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>银行小额信贷管理系统</title>
	</head>
	<body>
		<h1>客户管理 - 个人客户</h1>
		<a href="client.html">返回上一页</a> <br/><br/>
		
		<table border='1'>
			<?php
				echo '<tr><th>姓名</th><th>主要资产</th><th>负债信息</th><th>工作经历</th><th>教育经历</th><th>配偶信息</th><th>居住情况</th><th>保险信息</th></tr>';
				$db = mysql_connect('localhost', 'root', '');
				mysql_select_db('creditsystem', $db);
				$sql = 'select * from client where client_type = 1';
				$req = mysql_query($sql) or die('Erreur SQL: <br/>'.mysql_error());
				while ($data = mysql_fetch_assoc($req)) {
					echo '<tr><td>'.$data['client_name'].'</td><td>'.$data['assets'].'</td><td>'.$data['liabilities'].'</td><td>'.$data['professions'].'</td><td>'.$data['education'].'</td><td>'.$data['spouse'].'</td><td>'.$data['live'].'</td><td>'.$data['insurance'].'</td></tr>';
				}
				mysql_close();
			?>
		</table>
	</body>
</html>