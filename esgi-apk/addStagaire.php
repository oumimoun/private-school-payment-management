<?php
session_start();

if (isset($_SESSION['nom'], $_SESSION['prenom'])) {

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ESGI</title>
    <meta name="description" content="A minimalist layout for Login pages. Built with Pico CSS.">
    <link rel="canonical" href="https://picocss.com/examples/sign-in/">

    <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@1.*/css/pico.min.css">

    <link rel="stylesheet" href="custom.css">

  </head>
<body>

<nav class="container-fluid">
      <ul>
        <li><a href="./" class="contrast" onclick="event.preventDefault()"><strong>ESGI</strong></a></li>
      </ul>
    </nav>
<main class="container">
      <hgroup>
  
        <h2>La page d'ajoute d'un stagaire</h2>
      </hgroup>
    <h6>Ajouter un stagaire</h6>
    
    <form method="POST">

  <!-- Grid -->
  <div class="grid">

    <!-- Markup example 1: input is inside label -->
    <label for="Nom">
      Nom
      <input type="text" id="firstname" name="nom" placeholder="Nom" required>
    </label>

    <label for="lastname">
      Prenom
      <input type="text" id="lastname" name="prenom" placeholder="Prenom" required>
    </label>

  </div>

  <label for="">Numero d'inscription</label>
  <input type="text" id="" name="numInscription" placeholder="Numero d'inscription" required>

  <label for="">CIN</label>
  <input type="text" id="" name="cin" placeholder="CIN" required>

  <label for="">Numero de telephone</label>
  <input type="text" id="" name="tele" placeholder="Numero de telephone" required>

  <label for="">Filiere</label>
  <select id="" name="filiere" required>
    <option value="Gestion des entreprises" selected>Gestion des entreprises</option>
    <option value="Systeme Reseux" >Systeme Reseux</option>
  </select>

  <!-- Date -->
    <label for="date">Date D'inscription
    <input type="date" id="date" name="dateInsc">
    </label>

    <label for="">Niveaux</label>
  <select id="" name="anne" required>
    <option value="1er" selected>1er</option>
    <option value="2eme" >2eme</option>
  </select>

  <label for="date">Date De naissance
    <input type="date" id="date" name="dateNaissance">
    </label>

  <!-- Button -->
  <input type="submit" name="ok" value="valide" class="outline">
  <!-- <button type="submit" name="ok">Submit</button> -->

</form>
<?php
if (isset($_POST["ok"])) {
    if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['cin']) 
    && isset($_POST['numInscription'], $_POST['tele'], $_POST['filiere'], $_POST['dateInsc'], $_POST['anne'], $_POST['dateNaissance'])) {
        // echo 'set';
        $nom=$_POST['nom'];
        $prenom=$_POST['prenom'];
        $cin=$_POST['cin'];
        $numInsc=$_POST['numInscription'];
        $tele = $_POST['tele'];
        $filiere = $_POST['filiere'];
        $dateInsc = $_POST['dateInsc'];
        $tele = $_POST['tele'];
        $anne = $_POST['anne'];
        $dateN = $_POST['dateNaissance'];

        require("config/connexion.php");

        $sel=$db->prepare('SELECT CIN FROM stagaire WHERE CIN = ?');
        $sel->execute([$cin]);
        $count = $sel->rowCount();
        // echo $count;

        if ($count == 0) {
            $insert = "INSERT INTO stagaire VALUES ('$numInsc','$nom', '$prenom', '$cin','$tele','$filiere','$dateInsc','$anne','$dateN')";
            $db->exec($insert);
            echo" row added successfully ";
            // header('Location: adminHome.php');
            exit;
        }
        else{
            echo'user alredy exist';
        }
    }
}
?>
    <footer>
      <small>Built by Oussama Mimouni</small>
    </footer>
</main>
</body>
</html>
<?php
}
else{
  header("Location: login.php");
}
?>