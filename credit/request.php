<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="zh-CN" xml:lang="zh-CN" xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>银行小额信贷管理系统</title>
</head>
<body>
	<h1>贷款业务管理 - 贷款申请</h1>

	<a href="credit.html">返回上一页</a>
	<br />
	<br />
		<?php
		$db = mysql_connect ( 'localhost', 'root', '' );
		mysql_select_db ( 'creditsystem', $db );
		$sql = 'select * from client';
		$req = mysql_query($sql) or die('Erreur SQL: <br/>'.mysql_error());
		?>
		
		
		<form name="request" method="post" action="./action/newRequest.php">
		<table>
			<tr>
				<td>客户</td>
				<td><select name="clientId">
						<?php
							while ($data = mysql_fetch_assoc($req)) {
								$type = $data['client_type'];
								if ($type == 1) {
									$typeStr = "个人客户";
								} else {
									$typeStr = "企业账户";
								}
								echo '<option value="'.$data['client_id'].'">'.$data['client_name'].' - '.$typeStr.'</option>';
							}
						?>
					</select>
				</td>
			
			</tr>
			<tr>
				<td>金额</td>
				<td><input type="text" name="amount">
			
			</tr>
			<tr>
				<td>时长</td>
				<td><input type="text" name="duration">
			
			</tr>
			<tr>
				<td><input type="submit" value="确定"></td>
			</tr>
		</table>
	</form>
</body>
</html>