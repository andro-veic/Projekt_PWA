<?php 
session_start();
include 'connect.php'; 
define('UPLPATH', 'img/'); 

$query = "SELECT * FROM vijesti WHERE id = " . $_GET['id'];
$result = mysqli_query($dbc, $query);

if ($result) {
    $row = mysqli_fetch_assoc($result);
} else {
    echo "Error: " . mysqli_error($dbc);
}
?> 

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>L'OBS - Članak</title>
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
    <section role="main"> 
	<div class="row"> 
	<h2 class="category"><?php 
		echo "<span>".$row['kategorija']."</span>"; 
		?></h2> 
	<h1 class="title"><?php 
		echo $row['naslov']; 
		?></h1> 
	<p>AUTOR:</p> 
	<p>OBJAVLJENO: <?php 
		echo "<span>".$row['datum']."</span>"; 
		?></p> 
	</div> 
	<section class="slika"> 
	<?php 
		echo '<img src="' . UPLPATH . $row['slika'] . '">'; 
	?> 
	</section> 
	<section class="about"> 
		<p> 
		<?php 
			echo "<i>".$row['sazetak']."</i>"; 
			?> 
		</p> 
	</section> 
	<section class="sadrzaj"> 
		<p> 
			<?php 
				echo $row['tekst']; 
			?> 
		</p> 
	</section> 
</section>
    </section>
    </main>
    <footer>
        © L'Obs - Les marques ou contenus du site nouvelobs.com sont soumis à la protection de la propriété intellectuelle
    </footer>
</body>
</html>