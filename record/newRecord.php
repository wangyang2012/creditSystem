<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="zh-CN" xml:lang="zh-CN" xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>银行小额信贷管理系统</title>
</head>
<body>
	<h1>不良记录管理 - 不良记录收集</h1>

	<a href="record.html">返回上一页</a>
	<br />
	<br />
		<?php
		$db = mysql_connect ( 'localhost', 'root', '' );
		mysql_select_db ( 'creditsystem', $db );
		$sql = 'select * from client';
		$req = mysql_query($sql) or die('Erreur SQL: <br/>'.mysql_error());
		?>
		
		
		<form name="request" method="post" action="./action/newRecord.php">
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
				<td>说明</td>
				<td><input type="text" name="note"/></td>
			
			</tr>
			<tr>
				<td>信用等级</td>
				<td><select name="level">
						<option value="1">正常</option>
						<option value="2">关注</option>
						<option value="3">次级</option>
						<option value="4">可疑</option>
						<option value="5">损失</option>
					</select>
				</td>
			
			</tr>
			<tr>
				<td><input type="submit" value="确定"></td>
			</tr>
		</table>
	</form>
</body>
</html>