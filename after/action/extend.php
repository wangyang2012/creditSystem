<?php
	$id = $_REQUEST['id'];
	$duration = $_REQUEST['duration'];
	
	$db = mysql_connect('localhost', 'root', '');
	mysql_select_db('creditsystem', $db);
	$sql = 'update distribution set duration='.$duration.' where distribution_id = "'.$id.'";';
	$result = mysql_query($sql) or die('Erreur SQL: <br/>'.mysql_error());
	echo '<script>
			if (alert("已成功展期") != true) {
				window.location="../interest.php";
			}
			</script>';
?>