<?php
session_start(); 
include 'connect.php'; 

// Putanja do direktorija sa slikama 
define('UPLPATH', 'img/'); 

// Initialize variables
$uspjesnaPrijava = false;
$admin = false;
$msg = '';
?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>L'OBS - Administracija</title>
</head>
<body>
    <header>
        <h1>L'OBS</h1>
        <nav class="navbar main_nav" role="navigation"> 
            <ul class="main nav navbar-nav"> 
                <li><a href="index.php" class="">Početna</a></li> 
                <li><a href="kategorija.php?id=sport" class="">Sport</a></li> 
                <li><a href="kategorija.php?id=kultura" class="">Kultura</a></li> 
                <li><a href="administracija.php" class="">Administracija</a></li> 
				<li><a href="registracija.php" class="">Registracija</a></li> 
            </ul> 
        </nav>
    </header>
    <main>

<?php
// Provjera da li je korisnik došao s login forme 
if (isset($_POST['prijava'])) { 
    // Provjera da li korisnik postoji u bazi uz zaštitu od SQL injectiona 
    $prijavaImeKorisnika = $_POST['username']; 
    $prijavaLozinkaKorisnika = $_POST['lozinka']; 
    
    $sql = "SELECT korisnicko_ime, lozinka, razina FROM korisnik WHERE korisnicko_ime = ?"; 
    $stmt = mysqli_stmt_init($dbc); 
    if (mysqli_stmt_prepare($stmt, $sql)) { 
        mysqli_stmt_bind_param($stmt, 's', $prijavaImeKorisnika); 
        mysqli_stmt_execute($stmt); 
        mysqli_stmt_store_result($stmt); 
    } 
    mysqli_stmt_bind_result($stmt, $imeKorisnika, $lozinkaKorisnika, $levelKorisnika); 
    mysqli_stmt_fetch($stmt); 
    
    // Provjera lozinke 
    if (password_verify($prijavaLozinkaKorisnika, $lozinkaKorisnika) && mysqli_stmt_num_rows($stmt) > 0) { 
        $uspjesnaPrijava = true;
        // Provjera da li je admin 
        if ($levelKorisnika == 1) { 
            $admin = true; 
        } else { 
            $admin = false; 
        } 
        // Postavljanje session varijabli 
        $_SESSION['username'] = $imeKorisnika; 
        $_SESSION['level'] = $levelKorisnika;
        
        // Redirect to refresh the page and show the appropriate content
        header("Location: administracija.php");
        exit();
    } else { 
        $uspjesnaPrijava = false; 
        $msg = 'Neispravno korisničko ime ili lozinka';
    } 
}

// Display content based on login status
if ((isset($_SESSION['username']) && $_SESSION['level'] == 1)) { 
    // Pokaži stranicu ukoliko je korisnik uspješno prijavljen i administrator je 
    $query = "SELECT * FROM vijesti"; 
    $result = mysqli_query($dbc, $query); 
    echo '<a href="unos.html" class="">Novi unos</a>';
    while ($row = mysqli_fetch_array($result)) { 
        echo '
        <form enctype="multipart/form-data" action="" method="POST"> 
            <div class="form-item"> 
                <label for="title">Naslov vjesti:</label> 
                <div class="form-field"> 
                    <input type="text" name="title" class="form-field-textual" value="'.$row['naslov'].'"> 
                </div> 
            </div> 
            <div class="form-item"> 
                <label for="about">Kratki sadržaj vijesti (do 50 znakova):</label> 
                <div class="form-field"> 
                    <textarea name="about" id="" cols="30" rows="10" class="form-field-textual">'.$row['sazetak'].'</textarea> 
                </div> 
            </div> 
            <div class="form-item"> 
                <label for="content">Sadržaj vijesti:</label> 
                <div class="form-field"> 
                    <textarea name="content" id="" cols="30" rows="10" class="form-field-textual">'.$row['tekst'].'</textarea> 
                </div> 
            </div> 
            <div class="form-item"> 
                <label for="pphoto">Slika:</label> 
                <div class="form-field">
                    <input type="file" class="input-text" id="pphoto" value="'.$row['slika'].'" name="pphoto"/> <br><img src="' . UPLPATH . $row['slika'] . '" width=100px> 
                </div> 
            </div> 
            <div class="form-item"> 
                <label for="category">Kategorija vijesti:</label> 
                <div class="form-field"> 
                    <select name="category" id="" class="form-field-textual" value="'.$row['kategorija'].'"> 
                        <option value="sport">Sport</option> 
                        <option value="kultura">Kultura</option> 
                    </select> 
                </div> 
            </div> 
            <div class="form-item"> 
                <label>Spremiti u arhivu: 
                    <div class="form-field">'; 
                        if($row['arhiva'] == 0) { 
                            echo '<input type="checkbox" name="archive" id="archive"/> Arhiviraj?'; 
                        } else { 
                            echo '<input type="checkbox" name="archive" id="archive" checked/> Arhiviraj?'; 
                        }
                    echo '</div> 
                </label> 
            </div> 
            <div class="form-item"> 
                <input type="hidden" name="id" class="form-field-textual" value="'.$row['id'].'"> 
                <button type="reset" value="Poništi">Poništi</button> 
                <button type="submit" name="update" value="Prihvati"> Izmjeni</button> 
                <button type="submit" name="delete" value="Izbriši"> Izbriši</button> 
            </div> 
        </form>'; 
    }

    if(isset($_POST['delete'])){ 
        $id = $_POST['id']; 
        $query = "DELETE FROM vijesti WHERE id=$id"; 
        $result = mysqli_query($dbc, $query); 
    }

    if(isset($_POST['update'])){ 
        $picture = $_FILES['pphoto']['name']; 
        $title = $_POST['title']; 
        $about = $_POST['about']; 
        $content = $_POST['content']; 
        $category = $_POST['category']; 
        if(isset($_POST['archive'])){ 
            $archive = 1; 
        } else { 
            $archive = 0; 
        } 
        $target_dir = 'img/'.$picture; 
        move_uploaded_file($_FILES["pphoto"]["tmp_name"], $target_dir); 

        $id = $_POST['id']; 
        $query = "UPDATE vijesti SET naslov='$title', sazetak='$about', tekst='$content', slika='$picture', kategorija='$category', arhiva='$archive' WHERE id=$id"; 
        $result = mysqli_query($dbc, $query); 
    }
} elseif ($uspjesnaPrijava == true && $admin == false) { 
    // Pokaži poruku da je korisnik uspješno prijavljen, ali nije administrator 
    echo '<p>Bok ' . $imeKorisnika . '! Uspješno ste prijavljeni, ali niste administrator.</p>'; 
} elseif (isset($_SESSION['username']) && $_SESSION['level'] == 0) {
    echo '<p>Bok ' . $_SESSION['username'] . '! Uspješno ste prijavljeni, ali niste administrator.</p>'; 
} elseif ($uspjesnaPrijava == false) { 
    // Forma za prijavu 
    echo '<section role="prijava"> 
    <form enctype="multipart/form-data" action="" method="POST"> 
        <div class="form-item"> 
            <span id="porukaUsername" class="bojaPoruke"></span> 
            <label for="username">Korisničko ime:</label> 
            <div class="form-field"> 
                <input type="text" name="username" id="username" class="form-field-textual"> 
            </div> 
        </div> 
        <div class="form-item"> 
            <span id="porukaPassword" class="bojaPoruke"></span> 
            <label for="lozinka">Lozinka:</label> 
            <div class="form-field"> 
                <input type="password" name="lozinka" id="lozinka" class="form-field-textual"> 
            </div> 
        </div> 
        <div class="form-item"> 
            <button type="submit" value="Prijava" name="prijava">Prijava</button> 
        </div> 
    </form>'; 
    if ($msg != '') {
        echo '<p>' . $msg . '</p>';
    }
    echo '</section>';
}
?>

    </main>
    <footer>
        © L'Obs - Les marques ou contenus du site nouvelobs.com sont soumis à la protection de la propriété intellectuelle
    </footer>
</body>
</html>
