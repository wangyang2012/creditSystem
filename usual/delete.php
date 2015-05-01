<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="zh-CN" xml:lang="zh-CN" xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>银行小额信贷管理系统</title> 
		<script>
			function deleteData(distributionId) {
				window.location = "./action/delete.php?id="+distributionId;
			}
		</script>

</head>
<body>
	<h1>日常管理 - 删除垃圾数据</h1>

	<a href="usual.html">返回上一页</a>
	<br />
	<br />
	<h3>删除垃圾数据</h3>
	<h4><i>此页面显示所有已还清单贷款项目，按删除键删除贷款信息。</i></h4>
	<table border="1">
		<thead>
			<th>客户姓名</th>
			<th>客户类型</th>
			<th>发放日期</th>
			<th>贷款时长</th>
			<th>贷款金额</th>
			<th>已还金额</th>
			<th>删除</th>
		</thead>
		<tbody>
				<?php
				$db = mysql_connect ( 'localhost', 'root', '' );
				mysql_select_db ( 'creditsystem', $db );
					$sql = 'select distribution.distribution_id as distribution_id, client_name, client_type, amount, duration, date, repayment_id, repayed from distribution join client on client.client_id = distribution.client_id join repayment on repayment.distribution_id =  distribution.distribution_id where amount <= repayed';
				$req = mysql_query ( $sql ) or die ( 'Erreur SQL: <br/>' . mysql_error () );
				while ( $data = mysql_fetch_assoc ( $req ) ) {
					if ($data['client_type'] == '1') {
						$clientType = "个人客户";
					} else if ($data['client_type'] == '2') {
						$clientType = "企业客户";
					} else {
						$clientType="";
					}
					echo '<tr><td>' . $data ['client_name'] . '</td><td>' . $clientType . '</td><td>'.$data['date'].'</td><td>' . $data ['duration'] . '</td><td>' . $data ['amount'] . '</td><td>'.$data['repayed'].'</td><td><button onclick="deleteData('.$data['distribution_id'].')">删除此数据</button></td></tr>';
				}
				?>
			</tbody>
	</table>
</body>
</html>