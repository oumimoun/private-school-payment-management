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
        <h2>La page de vérification de paiement</h2>
      </hgroup>
    <h6>Vérifier the paiement</h6>
    
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
    // Query the database to get user information
    if (!empty($numInscription)) {
        $stmt = $db->prepare('SELECT * FROM stagaire WHERE numInscription = ?');
        $stmt->execute([$numInscription]);
    } else if (!empty($CIN)) {
        $stmt = $db->prepare('SELECT * FROM stagaire WHERE CIN = ?');
        $stmt->execute([$CIN]);
    }
    // Output user information
    if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        ?>
        <table role="grid">
  <thead>
    <tr>
      <th scope="col">Numero d'inscription</th>
      <th scope="col">Nom</th>
      <th scope="col">Prenom</th>
      <th scope="col">CIN</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><?=$row['numInscription']?></td>
      <td><?=$row['prenom']?></td>
      <td><?=$row['nom']?></td>
      <td><?=$row['CIN']?></td>
    </tr>
  </tbody>

</table>
        <?php
        // echo 'Name: ' . htmlspecialchars($row['nom']) . '<br>';

        // Query the database to get payment information
        $stmt = $db->prepare('SELECT * FROM recu WHERE numInscription = ?');
        $stmt->execute([$row['numInscription']]);
        echo 'Payments:<br>';
        ?>
        <table role="grid">
        <thead>
        <tr>
        <th scope="col">Numero de recu</th>
        <th scope="col">Mois</th>
        <th scope="col">La somme</th>
        <th scope="col">Année</th>
        </tr>
        </thead>
        <?php
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            ?>
            <tbody>
            <tr>
            <td><?=$row['idRecu']?></td>
            <td><?=$row['mois']?></td>
            <td><?=$row['lasomme']?></td>
            <td><?=$row['anne']?></td>
            </tr>
            </tbody>
            </table>
            <?php
            // echo '- ' . htmlspecialchars($row['mois']) . ': ' . htmlspecialchars($row['lasomme']) . '<br>';
        }
    } else {
        echo 'User not found';
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