<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="zh-CN" xml:lang="zh-CN" xmlns="http://www.w3.org/1999/xhtml">
	<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>银行小额信贷管理系统</title>
		<script>
			function deleteUser(id) {
				window.location = "./action/deleteUser.php?id="+id;
			}
		</script>
	</head>
	<body>
		<h1>系统维护 - 用户管理</h1>
		<a href="system.html">返回上一页</a> <br/><br/>
		
		<table border='1'>
			<?php
				echo '<tr><th>姓名</th><th>删除</th></tr>';
				$db = mysql_connect('localhost', 'root', '');
				mysql_select_db('creditsystem', $db);
				$sql = 'select * from user';
				$req = mysql_query($sql) or die('Erreur SQL: <br/>'.mysql_error());
				while ($data = mysql_fetch_assoc($req)) {
					echo '<tr><td>'.$data['name'].'</td><td><input type=button onclick="deleteUser('.$data['id'].')" value="删除"/></td></tr>';
				}
				mysql_close();
			?>
		</table>
		<br/><br/>
		<hr/>
		<br/><br/>
		<h1>添加新用户</h1>
		<form action="./action/newUser.php" method="post">
			<table>
				<tr><td>用户名</td><td><input type="text" name="login"></tr>
				<tr><td>密码</td><td><input type="password" name="password"></tr>
				<tr><td><input type="submit" value="确定"></td></tr>
			</table>
		</form>
		
	</body>
</html>