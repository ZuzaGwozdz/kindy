<!DOCTYPE html>
<html>  
  <head>
		<meta charset="utf-8">
		<link rel="shortcut icon" href="favicon.ico">
		<link rel="stylesheet" href="kindy.css" type="text/css">
		<title>kindy</title>
  <style>
  
  canvas {
		-webkit-animation: rotation 30s infinite linear;
}

@-webkit-keyframes rotation {
		from {
				-webkit-transform: rotate(0deg);
		}
		to {
				-webkit-transform: rotate(359deg);
	
	}
}

  canvas {
  position:absolute;
  top:15%;
  left:33%;
 }
  
</style>
  </head>  
 <body> 
 
<?php
include ("autoryzacja.php");
    

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)
or die('Bład połączenia z serwerem: ' . mysqli_connect_error());

$conn->set_charset("utf8");

$result=mysqli_query($conn, "SELECT COUNT(id_kolor) FROM `kolor`");

$row=mysqli_fetch_array($result);

$ile=$row[0];

$id_kolor=random_int(1,$ile);

$result=mysqli_query($conn, "SELECT nazwa FROM kolor WHERE id_kolor=$id_kolor");

$row=mysqli_fetch_array($result);

$kolor=$row[0];

?>

<canvas id="canvas" width="400" height="400"
onmouseover=
				"zawartosc.beginPath();
				zawartosc.moveTo(1, 200);
				zawartosc.quadraticCurveTo(1, 280, 200, 200);
				zawartosc.fillStyle = '<?php echo $kolor; ?>';
				zawartosc.moveTo(1, 200);
				zawartosc.quadraticCurveTo(1, 120, 200, 200);
				zawartosc.moveTo(60, 60);
				zawartosc.quadraticCurveTo(1, 120, 200, 200);
				zawartosc.moveTo(60, 60);
				zawartosc.quadraticCurveTo(120, 1, 200, 200);
				zawartosc.moveTo(200, 1);
				zawartosc.quadraticCurveTo(120, 1, 200, 200);
				zawartosc.moveTo(200, 1);
				zawartosc.quadraticCurveTo(280, 1, 200, 200);
				zawartosc.moveTo(340, 60);
				zawartosc.quadraticCurveTo(280, 1, 200, 200);
				zawartosc.moveTo(340, 60);
				zawartosc.quadraticCurveTo(399, 120, 200, 200);
				zawartosc.moveTo(399, 200);
				zawartosc.quadraticCurveTo(399, 120, 200, 200);
				zawartosc.moveTo(399, 200);
				zawartosc.quadraticCurveTo(399, 280, 200, 200);
				zawartosc.moveTo(340, 340);
				zawartosc.quadraticCurveTo(399, 280, 200, 200);
				zawartosc.moveTo(340, 340);
				zawartosc.quadraticCurveTo(280, 399, 200, 200);
				zawartosc.moveTo(200, 399);
				zawartosc.quadraticCurveTo(280, 399, 200, 200);
				zawartosc.moveTo(200, 399);
				zawartosc.quadraticCurveTo(120, 399, 200, 200);
				zawartosc.moveTo(60, 340);
				zawartosc.quadraticCurveTo(120, 399, 200, 200);
				zawartosc.moveTo(60, 340);
				zawartosc.quadraticCurveTo(1, 280, 200, 200);
				zawartosc.lineWidth = 4;
				zawartosc.strokeStyle = 'white';
				zawartosc.stroke();
				zawartosc.fill();
				zawartosc.closePath();
				zawartosc.beginPath();
				zawartosc.moveTo(200,200);
				zawartosc.arc(200,200,30,0,2*Math.PI);
				zawartosc.closePath();
				zawartosc.lineWidth = 4;
				zawartosc.strokeStyle = 'white';
				zawartosc.stroke();
				zawartosc.fillStyle = 'yellow';
				zawartosc.fill();"
				
				onmouseout="zawartosc.beginPath();
				zawartosc.moveTo(1, 200);
				zawartosc.quadraticCurveTo(1, 280, 200, 200);
				zawartosc.fillStyle = '#93cde6';
				zawartosc.moveTo(1, 200);
				zawartosc.quadraticCurveTo(1, 120, 200, 200);
				zawartosc.moveTo(60, 60);
				zawartosc.quadraticCurveTo(1, 120, 200, 200);
				zawartosc.moveTo(60, 60);
				zawartosc.quadraticCurveTo(120, 1, 200, 200);
				zawartosc.moveTo(200, 1);
				zawartosc.quadraticCurveTo(120, 1, 200, 200);
				zawartosc.moveTo(200, 1);
				zawartosc.quadraticCurveTo(280, 1, 200, 200);
				zawartosc.moveTo(340, 60);
				zawartosc.quadraticCurveTo(280, 1, 200, 200);
				zawartosc.moveTo(340, 60);
				zawartosc.quadraticCurveTo(399, 120, 200, 200);
				zawartosc.moveTo(399, 200);
				zawartosc.quadraticCurveTo(399, 120, 200, 200);
				zawartosc.moveTo(399, 200);
				zawartosc.quadraticCurveTo(399, 280, 200, 200);
				zawartosc.moveTo(340, 340);
				zawartosc.quadraticCurveTo(399, 280, 200, 200);
				zawartosc.moveTo(340, 340);
				zawartosc.quadraticCurveTo(280, 399, 200, 200);
				zawartosc.moveTo(200, 399);
				zawartosc.quadraticCurveTo(280, 399, 200, 200);
				zawartosc.moveTo(200, 399);
				zawartosc.quadraticCurveTo(120, 399, 200, 200);
				zawartosc.moveTo(60, 340);
				zawartosc.quadraticCurveTo(120, 399, 200, 200);
				zawartosc.moveTo(60, 340);
				zawartosc.quadraticCurveTo(1, 280, 200, 200);
				zawartosc.lineWidth = 4;
				zawartosc.strokeStyle = 'white';
				zawartosc.stroke();
				zawartosc.fill();
				zawartosc.closePath();
				zawartosc.beginPath();
				zawartosc.moveTo(200,200);
				zawartosc.arc(200,200,30,0,2*Math.PI);
				zawartosc.closePath();
				zawartosc.lineWidth = 4;
				zawartosc.strokeStyle = 'white';
				zawartosc.stroke();
				zawartosc.fillStyle = '#d6f3ff';
				zawartosc.fill();"
				</canvas></a>
				
<script type="text/javascript">  

var kontener = document.getElementById("canvas");
				var zawartosc = kontener.getContext("2d"); 
				zawartosc.beginPath();
				zawartosc.moveTo(1, 200);
				zawartosc.quadraticCurveTo(1, 280, 200, 200);
				zawartosc.fillStyle = "#93cde6";
				zawartosc.moveTo(1, 200);
				zawartosc.quadraticCurveTo(1, 120, 200, 200);
				zawartosc.moveTo(60, 60);
				zawartosc.quadraticCurveTo(1, 120, 200, 200);
				zawartosc.moveTo(60, 60);
				zawartosc.quadraticCurveTo(120, 1, 200, 200);
				zawartosc.moveTo(200, 1);
				zawartosc.quadraticCurveTo(120, 1, 200, 200);
				zawartosc.moveTo(200, 1);
				zawartosc.quadraticCurveTo(280, 1, 200, 200);
				zawartosc.moveTo(340, 60);
				zawartosc.quadraticCurveTo(280, 1, 200, 200);
				zawartosc.moveTo(340, 60);
				zawartosc.quadraticCurveTo(399, 120, 200, 200);
				zawartosc.moveTo(399, 200);
				zawartosc.quadraticCurveTo(399, 120, 200, 200);
				zawartosc.moveTo(399, 200);
				zawartosc.quadraticCurveTo(399, 280, 200, 200);
				zawartosc.moveTo(340, 340);
				zawartosc.quadraticCurveTo(399, 280, 200, 200);
				zawartosc.moveTo(340, 340);
				zawartosc.quadraticCurveTo(280, 399, 200, 200);
				zawartosc.moveTo(200, 399);
				zawartosc.quadraticCurveTo(280, 399, 200, 200);
				zawartosc.moveTo(200, 399);
				zawartosc.quadraticCurveTo(120, 399, 200, 200);
				zawartosc.moveTo(60, 340);
				zawartosc.quadraticCurveTo(120, 399, 200, 200);
				zawartosc.moveTo(60, 340);
				zawartosc.quadraticCurveTo(1, 280, 200, 200);
				zawartosc.lineWidth = 4;
				zawartosc.strokeStyle = "white";
				zawartosc.stroke();
				zawartosc.fill();
				zawartosc.closePath();
				zawartosc.beginPath();
				zawartosc.moveTo(200,200);
				zawartosc.arc(200,200,30,0,2*Math.PI);
				zawartosc.closePath();
				zawartosc.lineWidth = 4;
				zawartosc.strokeStyle = "white";
				zawartosc.stroke();
				zawartosc.fillStyle = "#d6f3ff";
				zawartosc.fill();				
  </script>
  </body>  
</html> 