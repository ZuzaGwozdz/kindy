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

if ($_POST['login'] != '') {
	
	$login=$_POST['login'];
	
	$log=mysqli_query($conn, "SELECT * FROM uzytkownik WHERE login='$login'");
	
	$row=mysqli_fetch_array($log);
	
	if($row!=NULL)
	{
		echo "<div class='log' id='l5'>Ojej, obawiam się, że ten login jest już zajęty :(</div>";
	}
	else
    {
	$login=$_POST['login'];
	
    mysqli_query($conn, "INSERT INTO uzytkownik(login, imie, haslo) VALUES ('".$_POST['login']."','".$_POST['imie']."', '".$_POST['haslo']."')" );
	
	mysqli_query($conn, "INSERT INTO pytanie (tresc) SELECT tresc FROM pytanie WHERE id_posiada=0");
	
	$result=mysqli_query($conn,"SELECT *
                            FROM uzytkownik
                            WHERE login='$login'");
       
					$row=mysqli_fetch_array($result);
					
					$id=$row['id_uzytkownik'];
					
	mysqli_query($conn, "UPDATE pytanie SET id_posiada=$id WHERE id_posiada IS NULL;");
    
    echo "<div class='log' id='l3'> Miło Cię poznać :) <br><a href='login.php'> Teraz możesz się zalogować </a></div>";   
	}
}

else {

    ?>
	
<div class="log" id="l2" >
    <form action="new.php" method="POST">
        <label for="login">Login</label><input size="20" type="text" id="login" name="login"></br>
		<label for="imie">Imię</label><input size="20" type="text" name="imie"><br>
        <label for="haslo">Hasło</label><input size="20" type="password" name="haslo"><br>
        <input type="submit" name="dodaj" value="Dołącz">
    </form>
</div>

    <?php
}
?>

	</body>
</html> 