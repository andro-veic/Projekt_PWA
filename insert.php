<?php
session_start(); 
include 'connect.php'; 
define('UPLPATH', 'img/'); 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $picture = isset($_FILES['pphoto']) ? $_FILES['pphoto']['name'] : '';
    $title = isset($_POST['title']) ? $_POST['title'] : '';
    $about = isset($_POST['about']) ? $_POST['about'] : '';
    $content = isset($_POST['content']) ? $_POST['content'] : '';
    $category = isset($_POST['category']) ? $_POST['category'] : '';
    $date = date('d.m.Y.');

    $archive = isset($_POST['archive']) ? 1 : 0;

    if (!empty($picture)) {
        $target_dir = 'img/'.$picture;
        move_uploaded_file($_FILES["pphoto"]["tmp_name"], $target_dir);
    }

    $query = "INSERT INTO vijesti (datum, naslov, sazetak, tekst, slika, kategorija, arhiva) 
              VALUES ('$date', '$title', '$about', '$content', '$picture', '$category', '$archive')";

    $result = mysqli_query($dbc, $query) or die('Error querying database.');
    mysqli_close($dbc);
} else {
    echo "No data received. Please submit the form.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>L'OBS - Unos</title>
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
                <p class="category"><?php echo $category; ?></p>
                <h1 class="title"><?php echo $title; ?></h1>
                <p>AUTOR:</p>
                <p>OBJAVLJENO:</p>
            </div>
            <section class="slika"><img src="<?php echo $target_dir; ?>" alt="Article Image"></section>
            <section class="about"><p><?php echo $about; ?></p></section>
            <section class="sadrzaj"><p><?php echo $content; ?></p></section>
        </section>
    </main>
    <footer>
        © L'Obs - Les marques ou contenus du site nouvelobs.com sont soumis à la protection de la propriété intellectuelle
    </footer>
</body>
</html>
