<!DOCTYPE html>
<html>
	
	<head>
		<meta charset="utf-8">
		<link rel="shortcut icon" href="favicon.ico">
		<link rel="stylesheet" href="kindy.css" type="text/css">
		<title>kindy</title>
</head>
	
<body>
<a class="dymek" href="#">
			<div class="klik" id="pytaj">?</div><span> Tu znajdują się Twoje pytania. Na każde możesz odpowiedziec tylko raz dziennie.</span></a>
 
<?php


include ("autoryzacja.php");

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)
or die('Bład połączenia z serwerem: ' . mysqli_connect_error());

$conn->set_charset("utf8");

$id=$_POST[id];

echo '<form action="menu.php" method="POST">';
echo '<input type="hidden" name="id" value="'.$id.'"><br>';
echo '<input id="menu" type="submit" name="menu" value="←"></form>';

$dzis=date('Y-m-d');
									
		$sql= mysqli_query($conn, "UPDATE pytanie SET data='$dzis';");
		
		mysqli_query($conn, $sql);
		

if(isset($_POST[usun]))
					{ 
						$result=mysqli_query($conn, "DELETE FROM pytanie WHERE id_pytanie=$_POST[id_pytanie];");
					}

if($_POST[ntresc]!='' && isset($_POST[ndziekuje]))
					{ 
						$result=mysqli_query($conn, "INSERT INTO pytanie (id_posiada, tresc, data) 
						VALUES ('$id', '$_POST[ntresc]', '$dzis');");
						
						echo "<div id='dziekuje' style='font-size: 1.2em; margin-left:80px; margin-top:8px'>Dziękuję za dodanie nowego pytania!</div>";
					}

if($_POST[odpowiedz]!='')
					{ 
						$result=mysqli_query($conn, "INSERT INTO odpowiedz (id_pytanie, id_uzytkownik, odpowiedz, kiedy) 
						VALUES ('$_POST[id_pytanie]', '$_POST[id]', '$_POST[odpowiedz]', '$dzis');");
						
						echo "<div id='dziekuje' style='font-size: 1.2em; margin-left:80px; margin-top:8px'>Dziękuję za dodanie odpowiedzi!</div>";
					}

					
$temp= mysqli_query($conn, "CREATE TEMPORARY TABLE temp
SELECT DISTINCT odpowiedz.id_pytanie FROM `odpowiedz` JOIN pytanie ON 
odpowiedz.id_pytanie=pytanie.id_pytanie WHERE kiedy=data AND id_uzytkownik LIKE $id;");

$result=mysqli_query($conn, "SELECT pytanie.id_pytanie, tresc, id_posiada FROM pytanie LEFT JOIN temp ON temp.id_pytanie=pytanie.id_pytanie WHERE id_posiada=$id AND temp.id_pytanie IS NULL");

			echo '<table style="margin-top:60px; margin-left:70px" cellspacing="0" cellpadding="0">';
				
			while($row=mysqli_fetch_array($result))
					
                {       
						echo "<tr>";
						echo '<td><form action="moje.php" method="POST"><input type="hidden" name="id_pytanie" value="'.$row[id_pytanie].'">';
						echo '<input type="hidden" name="id" value="'.$id.'">';
						echo '<input id="kiedy" style="width: 400px; font-size:1.1em; padding:8px 10px; margin-top:0; margin-left:0" 
						type="submit" name="pytanie" value="'.$row[tresc].'">';
						echo '<input id="minus" style="margin-left:0; height:45px; padding:0 0 3px" type="submit" name="usun" value="-"></form></td>';
						echo "</tr>";
				}
				
				echo "</table>";
				
		if(isset($_POST[pytanie]))
		{
				$idp=$_POST[id_pytanie];
				
				$res= mysqli_query($conn, "SELECT * FROM pytanie WHERE id_pytanie='$idp';");
				
				$rzad=mysqli_fetch_array($res);
				
				echo '<form id="odpowiedz" style="margin-left: 210px; margin-top:0; font-size:1.1em; background-color:#d6f3ff" action="moje.php" method="POST">';
				echo $rzad['tresc'];
				echo '<br><textarea cols="50" rows="10" maxlength="200" name="odpowiedz"></textarea>';
				echo '<br><input id="minus" style="margin-left:353px; margin-bottom:0; padding:0; font-size:1.2em" type="submit" name="dziekuje" value="✓">';	
				echo '<input type="hidden" name="id_pytanie" value="'.$rzad[id_pytanie].'">';
				echo '<input type="hidden" name="id" value="'.$id.'">';								
				echo '</form>';
				
		}
		
		if(isset($_POST[dodaj]))
		{				
				echo '<form action="moje.php" method="POST">';
				echo '<input type="hidden" name="id" value="'.$id.'">';
				echo '<input id="kiedy" style="width: 400px; font-size:1.1em; margin-left:70px" type="text" name="ntresc">';
				echo '<input id="minus" style="	margin-left:0; height:45px; padding:0 0 1px" type="submit" name="ndziekuje" value="+"><br>';							
				echo '</form>';	
		}
		else
		{
			echo '<form action="moje.php" method="POST">';
			echo '<input type="hidden" name="id" value="'.$id.'"><br>';
			echo '<input id="kiedy" style="width: 400px; font-size:1.1em; padding:8px 10px; margin-left:70px; margin-top:0" type="submit" name="dodaj" value="Dodaj nowe pytanie"></form>';
		}
		
?>
</body>
</html>