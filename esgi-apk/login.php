<?php
session_start();
?>
<!doctype html>
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

    <!-- Nav -->
    <nav class="container-fluid">
      <ul>
        <li><a href="./" class="contrast" onclick="event.preventDefault()"><strong>ESGI</strong></a></li>
      </ul>
      <ul>
        <li>
          <details role="list" dir="rtl">
            <summary aria-haspopup="listbox" role="link" class="secondary">Theme</summary>
            <ul role="listbox">
              <li><a href="#" data-theme-switcher="auto">Auto</a></li>
              <li><a href="#" data-theme-switcher="light">Light</a></li>
              <li><a href="#" data-theme-switcher="dark">Dark</a></li>
            </ul>
          </details>
        </li>
      </ul>
    </nav>

    <!-- Main -->
    <main class="container">
      <article class="grid">
        <div>
          <hgroup>
            <h1>Log in</h1>
          </hgroup>
          <!-- action="adminHome.php" -->
          <form method='POST' >
            <input type="text" name="email" placeholder="Login" aria-label="Login" autocomplete="nickname" required>
            <input type="password" name="psw" placeholder="Password" aria-label="Password" autocomplete="current-password" required>
            <fieldset>
              <label for="remember">
                <input type="checkbox" role="switch" id="remember" name="remember">
                Remember me
              </label>
            </fieldset>
            <button type="submit" class="contrast" name="ok" >Login</button>
          </form>
        </div>
        <div></div>
      </article>
    </main>
    <script src="../js/minimal-theme-switcher.js"></script>
<?php
if (isset($_POST['ok'])) {
  if (isset($_POST['email'] , $_POST['psw'])) {
    $email = $_POST['email'];
    $psw = $_POST['psw'];

    require("config/connexion.php");

    $selAdmin=$db->prepare('SELECT * FROM admin WHERE email = :email AND psw = :psw');
    $selAdmin->bindParam(':email', $email);
    $selAdmin->bindParam(':psw', $psw);
    $selAdmin->execute();

    $countAdmin=$selAdmin->rowCount();

    $selUser=$db->prepare('SELECT * FROM users WHERE email = :email AND psw = :psw');
    $selUser->bindParam(':email', $email);
    $selUser->bindParam(':psw', $psw);
    $selUser->execute();

    $countUser=$selUser->rowCount();

    if ($countAdmin > 0 ) {
      echo'you are admin';
      $row = $selAdmin->fetch();
      $_SESSION['nom'] = $row['nom'];
      $_SESSION['prenom'] = $row['prenom'];
      header('Location: adminHome.php');
    }elseif($countUser > 0){
      echo'you are a user';
      $row = $selUser->fetch();
      $_SESSION['nom'] = $row['nom'];
      $_SESSION['prenom'] = $row['prenom'];
      header('Location: userHome.php');
    }else
      echo'sorry your email or password are incorrect';
  }
}
?>
  </body>

</html>
