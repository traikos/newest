<?php
//access level: all registered users
//description: displays available and not available quizes

session_start();
//require_once ('check_admin.php');
?>
<html>
<head>
<script>
function mynewfunc(){
var dis=document.getElementsByName("disableds");
var des=document.getElementsByName("hide");
var show=document.getElementById("show");

if (show.value=="show available only") {
	show.value="show not available";
for (var i=0;i<dis.length;i++){
	if (dis[i].disabled==true){
		des[i].hidden=true;
	}
}
}
else{
	show.value="show available only";
	for (var i=0;i<dis.length;i++){
	if (dis[i].disabled==true){
		des[i].hidden=false;
	}
}
}
}
</script>
</head>
<body>
<center>
<?php
include 'connect.php';
	date_default_timezone_set('Europe/Athens');
	
	if (isset($_POST["sub"]) ){
		$email=$_POST['email'];
		$pass=$_POST['password'];
		$sql=$conn->query("select * from users");	
		while($row = $sql->fetch()) {
			if($email==$row["email"] && $pass==$row["password"]) {				
				$_SESSION['id']=$row["email"];
				$_SESSION['email']=$email;
				$_SESSION['pass']=$pass;
				$_SESSION['token']=$row["token"];
				$_SESSION['type']=$row["type"];
				if($row['verified']==0) header ("Location: logout.php");
				else header ("Location: mypage.php");
				break;
			}
		}		
	}
include 'mypage1.php';
?>
<a href="stud_stats.php" ><input type="button" value="My statistics" /></a>

 
<table >
<tr>
    <th>Quiz Name</th>
    <th>Start Date</th>
    <th>End Date</th>
	<th>Number of Discs</th>
	<th>Max Tries</th>
	<th>Your Tries</th>
	<th>Available</th>
</tr>
<?php
include 'mypage2.php';
?>
</table>
<br><br>
<button type="button" onclick="tableToCSV()">
download CSV
</button>
<input type="button" id="show" onclick="mynewfunc()" value="show available only" />
</center>

<script src="table_to_csv.js"></script> 

</body>
</html>