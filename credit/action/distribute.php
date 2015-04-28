<?php
	$id = $_REQUEST['id'];
	
	$db = mysql_connect('localhost', 'root', '');
	mysql_select_db('creditsystem', $db);
	$sql = 'select * from contract where contract_id = "'.$id.'";';
	$result = mysql_query($sql) or die('Erreur SQL: <br/>'.mysql_error());
	$request = mysql_fetch_assoc($result);
	
	$sqlInsert = 'insert into distribution (client_id, amount, duration, date) values ('.$request['client_id'].', "'.$request['amount'].'", "'.$request['duration'].'", now());';
	mysql_query($sqlInsert) or die('Erreur SQL: <br/>'.mysql_error());
	
	$sqlDelete = 'delete from contract where contract_id = '.$id.';';
	mysql_query($sqlDelete) or die('Erreur SQL: <br/>'.mysql_error());
	
	echo '<script>
			if (alert("已成功发放贷款") != true) {
				window.location="../distribution.php";
			}
			</script>';
?>