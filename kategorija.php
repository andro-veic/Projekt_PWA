<?php 
session_start();
include 'connect.php'; 
define('UPLPATH', 'img/'); 
?> 

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>L'OBS - Kategorija</title>
</head>
<body>
    <header>
        <h1>L'OBS</h1>
        <nav class="navbar main_nav " role="navigation"> 
	    <ul class="main nav navbar-nav"> 
	        <li> 
		        <a href="index.php" class="">Početna</a> 
	        </li> 
	        <li> 
		        <a href="kategorija.php?id=sport" class="">Sport</a> 
	        </li> 
	        <li>
		        <a href="kategorija.php?id=kultura" class="">Kultura</a> 
	        </li> 
	        <li> 
		        <a href="administracija.php" class="">Administracija</a> 
	        </li> 
            <li> 
		        <a href="registracija.php" class="">Registracija</a> 
	        </li> 
	    </ul> 
        </nav>
    </header>
    <main>
    <section class="sport"> 
    <?php 
    $kategorija = $_GET['id'];
    $query = "SELECT * FROM vijesti WHERE kategorija='$kategorija'"; 
    $result = mysqli_query($dbc, $query); 
	echo '<h2>';
	echo $kategorija;
	echo '</h2>';
	echo '<dev class="articles-container">';
		$i=0;
		while($row = mysqli_fetch_array($result)) { 
				echo '<article>'; 
					echo'<div class="article">'; 
					echo '<div class="sport_img">'; 
					echo '<img src="' . UPLPATH . $row['slika'] . '"'; 
					echo '</div>'; echo '<div class="media_body">'; 
					echo '<h4 class="title">'; 
					echo '<a href="clanak.php?id='.$row['id'].'">'; 
					echo $row['naslov']; 
					echo '</a></h4>'; 
					echo '</div></div>'; 
					echo '</article>'; 
				}
				echo '</div>';
				?> 
    </section>
    </main>
    <footer>
    © L'Obs - Les marques ou contenus du site nouvelobs.com sont soumis à la protection de la propriété intellectuelle
    </footer>
</body>
</html>
