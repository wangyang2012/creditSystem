<?php
	$id = $_REQUEST['id'];
	
	$db = mysql_connect('localhost', 'root', '');
	mysql_select_db('creditsystem', $db);
	$sql = 'select * from request where request_id = "'.$id.'";';
	$result = mysql_query($sql) or die('Erreur SQL: <br/>'.mysql_error());
	$request = mysql_fetch_assoc($result);
	
	$sqlInsert = 'insert into response (client_id, amount, duration, accepted, date) values ('.$request['client_id'].', "'.$request['amount'].'", "'.$request['duration'].'", 1, now());';
	mysql_query($sqlInsert) or die('Erreur SQL: <br/>'.mysql_error());
	
	$sqlDelete = 'delete from request where request_id = '.$id.';';
	mysql_query($sqlDelete) or die('Erreur SQL: <br/>'.mysql_error());
	
	echo '<script>
			if (alert("已成功同意申请") != true) {
				window.location="../response.php";
			}
			</script>';
?>