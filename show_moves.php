<?php
// access level: administrators, professors, students
// description: shows moves of a quiz try
session_start();
?>
<!doctype html>
<html>
<head>
</head>
<body>
 <center>
<table border="1" cellspacing="0" cellpadding="10">
<tr>
	<th>Move</th>
    <th>Cor/Incor</th>
</tr>
<?php

include 'connect.php';

$id=$_GET['try_id'];
$result->prepare("select moves from user_try where try_id=? ");
$result->execute([$id]);
	while($row = $result->fetch()) {
		$moves=json_decode($row["moves"],true);
		for ($i=0;$i<sizeof($moves);$i++){
			echo '<tr>';		
			//print_r($moves[0]);
			echo '<td>'.$moves[$i][0].'</td>';
			echo '<td>'.$moves[$i][1].'</td>';
			echo '</tr>';
		}
	}

?>
</table>
<br><br>
<button type="button" onclick="tableToCSV()">
download CSV
</button>
</center>
<script src="table_to_csv.js"></script> 
</body>
</html>