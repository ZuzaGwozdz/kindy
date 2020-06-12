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
					
echo '<form action="menu.php" method="POST">';
echo '<input type="hidden" name="id" value="'.$id.'"><br>';
echo '<input id="menu" type="submit" name="menu" value="←"></form><br><br><br>';

$dzis=date('Y-m-d');

			echo '<form action="notatnik.php" method="POST">';
			echo '<input type="hidden" name="id" value="'.$id.'"><br>';
			echo '<input id="chrono" type="submit" name="chro" value="Chronologicznie">';
			echo '<input id="achrono" type="submit" name="achro" value="Achronologicznie"></form></div>';		
				
			if(isset($_POST[achro]))
			{
				$result= mysqli_query($conn, "SELECT DISTINCT kiedy FROM `odpowiedz` JOIN pytanie ON odpowiedz.id_pytanie=pytanie.id_pytanie WHERE id_uzytkownik=$id ORDER BY kiedy DESC; ");
			}
			else
			{
				$result= mysqli_query($conn, "SELECT DISTINCT kiedy FROM `odpowiedz` JOIN pytanie ON odpowiedz.id_pytanie=pytanie.id_pytanie WHERE id_uzytkownik=$id ORDER BY kiedy ASC; ");
			}
			
			echo '<form action="notatnik.php" method="POST">';
			echo '<table cellspacing="0" cellpadding="0">';
				
			while($row=mysqli_fetch_array($result))
					
                {       
						echo "<tr>";
						echo '<td><input id="kiedy" type="submit" name="kiedy" value="'.$row[kiedy].'"></td>';
						echo '<td><input type="hidden" name="id" value="'.$id.'"></td>';
						echo "</tr>";
				}
								
				echo "</table></form>";

			
			if(isset($_POST[kiedy]))
			{					
				$kiedy=$_POST['kiedy'];

				$result= mysqli_query($conn, "SELECT * FROM `odpowiedz` JOIN pytanie ON odpowiedz.id_pytanie=pytanie.id_pytanie WHERE id_uzytkownik=$id AND kiedy='$kiedy'; ");
				
				echo '<table id="odpowiedz" cellspacing="0" cellpadding="0">';
				
			while($row=mysqli_fetch_array($result))
					
                {       
						echo "<tr>";
						echo '<td style="font-weight:bold">'.$row[tresc].'</td>';
						echo '<tr><td style="text-align:right">'.$row[odpowiedz].'</td></tr>';	
						echo '<tr><td style="text-align:right"><form action="notatnik.php" method="POST">';
						echo '<input type="hidden" name="id" value="'.$id.'">';
						echo '<input type="hidden" name="id_odpowiedz" value="'.$row[id_odpowiedz].'">';
						echo '<input style="margin-top: 10px" id="minus" type="submit" name="usun" value="-"></form></td></tr>';
					
				}
								
				echo "</table>";
			}
			
			if(isset($_POST[usun]))
					{ 
						$odpowiedz=$_POST[id_odpowiedz];
						$result=mysqli_query($conn, "DELETE FROM odpowiedz WHERE id_odpowiedz=$_POST[id_odpowiedz];");
					}
		
?>
<a class="dymek" href="#">
			<div class="klik" id="pytaj">?</div><span>To twój notes. Tu możesz zobaczyć swoje poprzednie zapiski.</span></a>
</body>
</html>