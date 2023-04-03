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
  
        <h2>La page d'ajoute d'un paiement</h2>
      </hgroup>
    <h6>Ajouter un paiement</h6>
    
    <form method="POST" action="process.php">

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

  <label for="">La somme </label>
  <input type="number" id="" name="somme" placeholder="La somme" required>

  <label for="">Filiere</label>
  <select id="" name="filiere" required>
    <option value="Gestion des entreprises" selected>Gestion des entreprises</option>
    <option value="Systeme Reseux" >Systeme Reseux</option>
  </select>

  <label for="month">Sélectionnez un mois:</label>
<select id="month" name="mois">
<option value="Janvier">Janvier</option>
    <option value="Février">Février</option>
    <option value="Mars">Mars</option>
    <option value="Avril">Avril</option>
    <option value="Mai">Mai</option>
    <option value="Juin">Juin</option>
    <option value="Juillet">Juillet</option>
    <option value="Août">Août</option>
    <option value="Septembre">Septembre</option>
    <option value="Octobre">Octobre</option>
    <option value="Novembre">Novembre</option>
    <option value="Décembre">Décembre</option>
</select>

    <label for="anne">Année
    <input type="text" id="date" name="anne">
    </label>

  <!-- Button -->
  <input type="submit" name="ok" value="valide" class="outline">
  <!-- <button type="submit" name="ok">Submit</button> -->

</form>
<?php
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