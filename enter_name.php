<?php
// access level: guest
// description: enters name for guest
session_start();
?>
<!doctype html>
<html>
<head>
</head>
<body>
<form method="post" action="canvas.php?quizid=<?php echo $_GET['quiz']; ?>" >
<input type="text" name="name" placeholder="Enter your Name" required />
<input type="submit" name="sub1" value="OK" />
</form>
</body>
</html>