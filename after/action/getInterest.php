<?php
	$id = $_REQUEST['id'];
	$interest = $_REQUEST['interest'];
	
	$db = mysql_connect('localhost', 'root', '');
	mysql_select_db('creditsystem', $db);
	$sql = 'select * from distribution where distribution_id = "'.$id.'";';
	$result = mysql_query($sql) or die('Erreur SQL: <br/>'.mysql_error());
	$request = mysql_fetch_assoc($result);
	
	$sqlInsert = 'insert into interests (client_id, amount, duration, date, interest) values ('.$request['client_id'].', "'.$request['amount'].'", "'.$request['duration'].'", now(), "'.$interest.'");';
	mysql_query($sqlInsert) or die('Erreur SQL: <br/>'.mysql_error());
	
	$sqlDelete = 'delete from distribution where distribution_id = '.$id.';';
	mysql_query($sqlDelete) or die('Erreur SQL: <br/>'.mysql_error());
	
	echo '<script>
			if (alert("已成功收取利息") != true) {
				window.location="../interest.php";
			}
			</script>';
?>