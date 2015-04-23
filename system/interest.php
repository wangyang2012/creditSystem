<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="zh-CN" xml:lang="zh-CN" xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>银行小额信贷管理系统</title>
<script>
			function deleteClient(id) {
					window.location = "deleteClient.php?id="+id;
			}
		</script>
</head>
<body>
	<h1>系统维护 - 利率维护</h1>
	<a href="system.html">返回上一页</a>
	<br />
	<br />
		
		<?php
		$db = mysql_connect ( 'localhost', 'root', 'root' );
		mysql_select_db ( 'creditsystem', $db );
		$sql = 'select * from interest where id = 1';
		$req = mysql_query ( $sql ) or die ( 'Erreur SQL: <br/>' . mysql_error () );
		$oldInterest = mysql_fetch_assoc ( $req );
		
		echo '<h3>当前利率： ' . $oldInterest['value'] . '</h3>';
		
		if (isset($_POST ['newInterest'])) {
			$newInterest = $_POST ['newInterest'];
			if ($oldInterest == '') {
				$sqlNew = "insert into interest(id, value) values (1, '" . $newInterest . "');";
			} else {
				$sqlNew = "update interest set value = '" . $newInterest . "' where id=1);";
			}
// 			echo $sqlNew;
			mysql_query ( $sqlNew ) or die ( 'Erreur SQL: <br/>' . mysql_error () );
			echo '<script>
			if (alert("已成功更新利率") != true) {
				window.location="interest.php";
			}
			</script>';
		}
		?>
		<br />
	<br />

	<form method="post" action="interest.php">
		<h3>新利率： <input type="text" name="newInterest" /> <input type="submit"
			value="确定" /></h3>
	</form>

</body>
</html>