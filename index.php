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

$id=$_POST['id'];

$result=mysqli_query($conn,"SELECT imie
                            FROM uzytkownik
                            WHERE id_uzytkownik=$id;");
       

$row=mysqli_fetch_array($result);

$imie=$row[imie];

if(isset($_POST[papa]))
{
	?>
	<script>
		function zmienNaglowek1() {
			document.getElementById("papa").innerHTML = "Do&nbspwidzenia&nbsp;<?php echo $imie;?>";
		}
		function zmienNaglowek2() {
			document.getElementById("papa").innerHTML = "Do&nbsp;zobaczenia następnym&nbsp;razem!";
		}
	</script>
	
	<div id="papa" onmouseover="zmienNaglowek2()" onmouseout="zmienNaglowek1()"> Do&nbspwidzenia&nbsp;<?php echo $imie;?></div>
	
	<?php
	
	echo '<a href="start.html"><div id="buzia">';
}
else
{
	echo '<a href="start.html"><div id="buzia" style="left:38%">';
}

?>	
		<canvas onmouseover=
				"zawartosc.clearRect(0, 0, canvas.width, canvas.height)
				zawartosc.beginPath();
				zawartosc.moveTo(92,112.5);
				zawartosc.lineTo(117,112.5);
				zawartosc.stroke();
				zawartosc.moveTo(182,112.5);
				zawartosc.lineTo(207,112.5);
				zawartosc.stroke();
				zawartosc.moveTo(207.75,170);
				zawartosc.arc(150,170,57.75,0,1*Math.PI)
				zawartosc.moveTo(285,150);
				zawartosc.arc(150,150,135,0,2*Math.PI);
				zawartosc.stroke();"
				onmouseout=
				"zawartosc.clearRect(0, 0, canvas.width, canvas.height);
				zawartosc.beginPath();
				zawartosc.arc(105,112.5,11.25,0,2*Math.PI);
				zawartosc.fill();
				zawartosc.moveTo(195,112.5);
				zawartosc.arc(195,112.5,11.25,0,2*Math.PI);
				zawartosc.fill();
				zawartosc.moveTo(207.75,170);
				zawartosc.arc(150,170,57.75,0,1*Math.PI);
				zawartosc.moveTo(285,150);
				zawartosc.arc(150,150,135,0,2*Math.PI);
				zawartosc.stroke();"
		id="canvas" width="300" height="300">
		
		Twoja przeglądarka nie obsługuje elementu canvas</canvas>

			<script>
				var kontener = document.getElementById("canvas");
				var zawartosc = kontener.getContext("2d");
				zawartosc.beginPath();
				zawartosc.arc(105,112.5,11.25,0,2*Math.PI);
				zawartosc.fill();
				zawartosc.moveTo(195,112.5);
				zawartosc.arc(195,112.5,11.25,0,2*Math.PI);
				zawartosc.fill();
				zawartosc.moveTo(207.75,170);
				zawartosc.arc(150,170,57.75,0,1*Math.PI);
				zawartosc.moveTo(285,150);
				zawartosc.arc(150,150,135,0,2*Math.PI);
				zawartosc.stroke();
			</script>
		</a>
	</div>	
</body>
</html>