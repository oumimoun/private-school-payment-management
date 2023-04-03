<?php
session_start();

if (isset($_SESSION['nom'], $_SESSION['prenom'])) {
    if (isset($_GET['id'])) {
        $numInscription=$_GET['id'];
        require("config/connexion.php");
        $select = $db->prepare("SELECT * FROM stagaire WHERE numInscription = :numInscription");
        $select->bindParam(':numInscription', $numInscription);
        $select->execute();
        $row = $select->fetch(PDO::FETCH_ASSOC);
    }
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
        <h2>La page de la modification d'un stagaire</h2>
      </hgroup>
    <h6>Modifier le stagaire</h6>
    
    <form method="POST">

  <!-- Grid -->
  <div class="grid">

    <!-- Markup example 1: input is inside label -->
    <label for="Nom">
      Nom
      <input type="text" id="firstname" name="nom"  value="<?=$row['nom']?>" required>
    </label>

    <label for="lastname">
      Prenom
      <input type="text" id="lastname" name="prenom" value="<?=$row['prenom']?>" placeholder="Prenom" required>
    </label>

  </div>

  <label for="">Numero d'inscription</label>
  <input type="text" id="" name="numInscription" value="<?=$row['numInscription']?>" placeholder="Numero d'inscription" required>

  <label for="">CIN</label>
  <input type="text" id="" name="cin" value="<?=$row['CIN']?>" placeholder="CIN" required>

  <label for="">Numero de telephone</label>
  <input type="text" id="" name="tele" value="<?=$row['tele']?>" placeholder="Numero de telephone" required>

  <label for="">Filiere</label>
  <select id="" name="filiere" value="<?=$row['filiere']?>" required>
    <option value="Gestion des entreprises" selected>Gestion des entreprises</option>
    <option value="Systeme Reseux" >Systeme Reseux</option>
  </select>

  <!-- Date -->
    <label for="date">Date D'inscription
    <input type="date" id="date" value="<?=$row['dateInsc']?>" name="dateInsc">
    </label>

    <label for="">Niveaux</label>
  <select id="" name="anne" value="<?=$row['anne']?>" required>
    <option value="1" selected>1er</option>
    <option value="2" >2eme</option>
  </select>

  <label for="date">Date De naissance
    <input type="date" id="date" value="<?=$row['dateN']?>" name="dateNaissance">
    </label>

  <!-- Button -->
  <input type="submit" name="ok" value="valide" class="outline">
  <!-- <button type="submit" name="ok">Submit</button> -->

</form>
<?php
if (isset($_POST["ok"])) {
    if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['cin']) 
    && isset($_POST['numInscription'], $_POST['tele'], $_POST['filiere'], $_POST['dateInsc'], $_POST['anne'], $_POST['dateNaissance'])) {

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

        $update = $db->prepare("UPDATE stagaire SET nom = ? , prenom = ? , CIN = ? , tele = ? , filiere = ? , dateInsc = ? , anne = ? , dateN = ? WHERE numInscription = ? LIMIT 1;");
        $update->execute([$nom, $prenom, $cin, $tele, $filiere, $dateInsc, $anne, $dateN , $numInsc]);
        echo "stagiaire modifié avec succès";

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