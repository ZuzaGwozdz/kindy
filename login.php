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

 if(isset($_POST[zaloguj])){

					$result=mysqli_query($conn,"SELECT *
                            FROM uzytkownik
                            WHERE login='$_POST[login]' AND haslo='$_POST[haslo]' ");
       

					$row=mysqli_fetch_array($result);
					
					if($row == NULL) {
						
					echo "<p>";
					echo "<div class='log' id='l5'>Obawiam się, że twoja nazwa użytkownika lub hasło są niepoprawne :(</div>";
					
					}
					else {
					
					echo "<p>"; 
					$result=mysqli_query($conn,"SELECT *
                            FROM uzytkownik
                            WHERE login='$_POST[login]' AND haslo='$_POST[haslo]' ");
       

					$row=mysqli_fetch_array($result);
					
					$id=$row['id_uzytkownik'];
					
					echo "<div id='czesc'>Cześć " .$row[imie]. " <br> Miło znów Cię widzieć !</div>" ;
					
					
					?>
					
					<form action="moje.php" method="POST"> <input id="im1" type="submit" name="moje" value="☺"><input type="hidden" name="id" value='<?php echo "$id"; ?>'></form>
					<form action="notatnik.php" method="POST"><input id="im2" type="submit" name="notatnik" value="🕮"><input type="hidden" name="id" value='<?php echo "$id"; ?>'></form>
					<form action="kwiatek.php" method="POST"><input id="im3" type="submit" name="kwiatek" value="🏵"></form>
					<form action="index.php" method="POST"> <input id="im4" type="submit" name="papa" value="🖑"><input type="hidden" name="id" value='<?php echo "$id"; ?>'></form><br><br>
					
					<?php
					
					$dzis=date('Y-m-d');
					
					echo "<div id='data'>$dzis</div>";
									
					$sql= mysqli_query($conn, "UPDATE pytanie SET data='$dzis';");
		
					mysqli_query($conn, $sql);
					
					}
				}
			else
			{
    ?>
	
<div class="log" id="l4">	
    <form action="login.php" method="POST">
        Login <input type="text" name="login"> <br>
        Hasło <input type="password" name="haslo"> <br>
        <input type="submit" name="zaloguj" value="Zaloguj">

    </form>
</div>
	
    <?php
	
    }
    
    ?>

	</body>
</html> 
