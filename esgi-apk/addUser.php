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
  
        <h2>La page d'ajoute d'un utilisateur</h2>
      </hgroup>
    <h6>Ajouter un utilisateur</h6>
    
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

  <label for="">CIN</label>
  <input type="text" id="" name="cin" placeholder="CIN" required>

  <label for="email">Email address</label>
  <input type="email" id="email" name="email" placeholder="Email address" required>

  <label for="">Password</label>
  <input type="password" id="" name="psw" placeholder="Password" required>

  <!-- Button -->
  <input type="submit" name="ok" value="valide" class="outline">
  <!-- <button type="submit" name="ok">Submit</button> -->

</form>
<?php
if (isset($_POST["ok"])) {
    if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['cin']) && isset($_POST['email']) && isset($_POST['psw'])) {
        
        $nom=$_POST['nom'];
        $prenom=$_POST['prenom'];
        $cin=$_POST['cin'];
        $email=$_POST['email'];
        $psw=$_POST['psw'];

        require("config/connexion.php");

        $sel=$db->prepare('SELECT email FROM users WHERE email = ?');
        $sel->execute([$email]);
        $count = $sel->rowCount();
        echo $count;

        if ($count == 0) {
            $insert = "INSERT INTO users VALUES (NULL,'$nom', '$prenom', '$cin','$email','$psw')";
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