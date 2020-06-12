<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="shortcut icon" href="favicon.ico">
		<link rel="stylesheet" href="kindy.css" type="text/css">
		<title>kindy</title>
	</head>
	
<body>
  
<?php

include ("autoryzacja.php");

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)
or die('Bład połączenia z serwerem: ' . mysqli_connect_error());

$conn->set_charset("utf8");

$id=$_POST[id];

?>
					<form action="moje.php" method="POST"> <input id="im1" style="top: 35%" type="submit" name="moje" value="☺"><input type="hidden" name="id" value='<?php echo "$id"; ?>'></form>
					<form action="notatnik.php" method="POST"><input id="im2" style="top: 35%" type="submit" name="notatnik" value="🕮"><input type="hidden" name="id" value='<?php echo "$id"; ?>'></form>
					<form action="kwiatek.php" method="POST"><input id="im3" style="top: 35%" type="submit" name="kwiatek" value="🏵"></form>
					<form action="index.php" method="POST"> <input id="im4" style="top: 35%" type="submit" name="papa" value="🖑"><input type="hidden" name="id" value='<?php echo "$id"; ?>'></form><br><br>
					
<?php
					
					$dzis=date('Y-m-d');
					
					echo "<div id='data'>$dzis</div>";						
?>

	</body>
</html> 