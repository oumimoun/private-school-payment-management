<?php
session_start();

if (isset($_SESSION['nom'], $_SESSION['prenom'])) {
    if (isset($_GET['id'])) {
        require("config/connexion.php");
        $id=$_GET['id'];
        $delete = $db->prepare("DELETE FROM stagaire WHERE numInscription = ? LIMIT 1;");
        $delete->execute([$id]);   
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
        <h2>La page de rechercher un stagiaire</h2>
      </hgroup>
    <h6>rechercher a un stagiaire</h6>
    
    <form method="POST">
    <label for="search_by">Rechercher par : </label><br>
   
  <label for="">Numero d'inscription</label>
  <input type="text" id="" name="numInscription" placeholder="Numero d'inscription" >
  <label for="">CIN</label>
  <input type="text" id="" name="cin" placeholder="CIN" >

  <!-- Button -->
  <input type="submit" name="ok" value="valide" class="outline">
  <!-- <button type="submit" name="ok">Submit</button> -->

</form>
<?php
if (isset($_POST["ok"])) {
    if (!empty($_POST['cin']) OR !empty($_POST['numInscription'])) {
    require("config/connexion.php");
    $numInscription = $_POST['numInscription'];
    $CIN = $_POST['cin'];
    // Prepare and execute SQL statement
    $stmt = $db->prepare("SELECT * FROM stagaire WHERE numInscription = :numInscription OR CIN = :CIN");
    $stmt->bindParam(':numInscription', $numInscription);
    $stmt->bindParam(':CIN', $CIN);
    $stmt->execute();

    // Fetch and display results
    if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    ?>
    <table role="grid">
    <tbody>
    <tr><th scope="col">Numero d'inscription</th><td><?=$row['numInscription']?></td></tr>
    <tr><th scope="col">Nom</th><td><?=$row['prenom']?></td></tr>
    <tr><th scope="col">Prenom</th><td><?=$row['nom']?></td></tr>
    <tr><th scope="col">CIN</th><td><?=$row['CIN']?></td>
    <tr><th scope="col">Numero de telephone</th><td><?=$row['tele']?></td>
    <tr><th scope="col">Filiere</th><td><?=$row['filiere']?></td></tr>
    <tr><th scope="col">La date d'inscription</th><td><?=$row['dateInsc']?></td></tr>
    <tr><th scope="col">Année</th><td><?=$row['anne']?></td></tr>
    <tr><th scope="col">La date de naissance</th><td><?=$row['dateN']?></td></tr>
    <tr><th scope="col">Action</th>
        <td><a href="updateStagiaire.php?id=<?=$row['numInscription']?>" role="button" class="contrast outline">Modifier</a>
            <a href="checkStagiaire.php?id=<?=$row['numInscription']?>" role="button" class="secondary outline">Supprimer</a>
            </td></tr>
    </tbody>
    </table>
<?php
} else {
    echo 'User not found';
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
}
else{
  header("Location: login.php");
}
?>