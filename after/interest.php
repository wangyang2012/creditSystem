<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="zh-CN" xml:lang="zh-CN" xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>银行小额信贷管理系统</title> 
		<script>
			function getInterest(id, interest) {
				window.location = "./action/getInterest.php?id="+id+"&interest="+interest;
			}
		</script>

</head>
<body>
	<h1>贷后管理 - 贷后收息</h1>

	<a href="after.html">返回上一页</a>
	<br />
	<br />
	
	<h3>已收息</h3>
	<table border="1">
		<thead>
			<th>客户姓名</th>
			<th>客户类型</th>
			<th>贷款金额</th>
			<th>贷款时长</th>
			<th>利息</th>
			<th>收息日期</th>
		</thead>
		<tbody>
				<?php
				$db = mysql_connect ( 'localhost', 'root', '' );
				mysql_select_db ( 'creditsystem', $db );
				$sql = 'select client_name, client_type, amount, duration, interest, date from interests join distribution on interests.distribution_id = distribution.distribution_id join client on client.client_id = distribution.client_id where interest > 0';
				$req = mysql_query ( $sql ) or die ( 'Erreur SQL: <br/>' . mysql_error () );
				while ( $data = mysql_fetch_assoc ( $req ) ) {
					if ($data['client_type'] == '1') {
						$clientType = "个人客户";
					} else if ($data['client_type'] == '2') {
						$clientType = "企业客户";
					}
					echo '<tr><td>' . $data ['client_name'] . '</td><td>' . $clientType . '</td><td>' . $data ['amount'] . '</td><td>' . $data ['duration'] . '</td><td>'.$data['interest'].'</td><td>'.$data['date'].'</td></tr>';
				}
				?>
			</tbody>
	</table>
	
	<br />
	<hr/>
	<br />

	<h3>待收息</h3>
	<table border="1">
		<thead>
			<th>客户姓名</th>
			<th>客户类型</th>
			<th>贷款金额</th>
			<th>贷款时长</th>
			<th>发放日期</th>
			<th>利息</th>
			<th>收取利息</th>
		</thead>
		<tbody>
				<?php
				// get interest
				$db = mysql_connect ( 'localhost', 'root', '' );
				mysql_select_db ( 'creditsystem', $db );
				$sqlInterest = 'select * from interest where id = 1;';
				$reqInterest = mysql_query($sqlInterest) or die('Erreur SQL: </br>'.mysql_error());
				$interests = mysql_fetch_assoc($reqInterest);
				$interest = $interests['value'];
				
				$sql = 'select distribution.distribution_id, client_name, client_type, distribution.amount, distribution.duration, distribution.date from distribution join client on client.client_id = distribution.client_id join interests on interests.distribution_id = distribution.distribution_id  where interest = 0';
				$req = mysql_query ( $sql ) or die ( 'Erreur SQL: <br/>' . mysql_error () );
				while ( $data = mysql_fetch_assoc ( $req ) ) {
					if ($data['client_type'] == '1') {
						$clientType = "个人客户";
					} else if ($data['client_type'] == '2') {
						$clientType = "企业客户";
					}
					
					// calculate interest
					$total = $data['amount'];
					for ($i=1; $i < $data['duration']; $i++) {
						$total = $total * (1+$interest);
					}
					$amountInterest = round($total - $data['amount'], 2);
					echo '<tr><td>' . $data ['client_name'] . '</td><td>' . $clientType . '</td><td>' . $data ['amount'] . '</td><td>' . $data ['duration'] . '</td><td>'.$data['date'].'</td><td>'.$amountInterest.'</td><td><input type="button" onclick="getInterest('.$data['distribution_id'].', '.$amountInterest.');" value="收取利息"/></td></tr>';
				}
				?>
			</tbody>
	</table>
</body>
</html>