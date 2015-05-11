<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="zh-CN" xml:lang="zh-CN" xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>银行小额信贷管理系统</title> 
		<script>
			function acceptReq(id, level) {
				if (level < 3) {
					window.location = "./action/accept.php?id="+id;
				}else{
					alert("信用等级不足，不能同意申请");
				}
			}
			function refuseReq(id) {
				window.location = "./action/refuse.php?id="+id;
			}
		</script>

</head>
<body>
	<h1>贷款业务管理 - 贷款审核</h1>

	<a href="credit.html">返回上一页</a>
	<br />
	<br />

	<table border="1">
		<thead>
			<th>客户姓名</th>
			<th>客户类型</th>
			<th>贷款金额</th>
			<th>贷款时长</th>
			<th>信用等级</th>
			<th>同意</th>
			<th>拒绝</th>
		</thead>
		<tbody>
				<?php
				$db = mysql_connect ( 'localhost', 'root', '' );
				mysql_select_db ( 'creditsystem', $db );
				$sql = 'select request_id as id, client_name, client_type, amount, duration, level from request join client on client.client_id = request.client_id';
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
					echo '<tr><td>' . $data ['client_name'] . '</td><td>' . $clientType . '</td><td>' . $data ['amount'] . '</td><td>' . $data ['duration'] . '</td><td>'.$level.'</td><td><input type="button" onclick="acceptReq(' . $data ['id'] . ', '.$data['level'].');" value="同意"/></td><td><input type="button" onclick="refuseReq(' . $data ['id'] . ');" value="拒绝"/></td></tr>';
				}
				?>
			</tbody>
	</table>
</body>
</html>