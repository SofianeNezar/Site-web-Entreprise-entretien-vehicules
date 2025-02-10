<?php
// start session
session_start();

// verifier si la form a été envoyé
if(isset($_POST['login'])) {

  // connecter a la bdd
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "mydatabase";

  $conn = mysqli_connect($servername, $username, $password, $dbname);

  // verifier connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  // obtenir entrée utilisateur
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);

  // recuperer données utilisateur de la base de données.
  $sql = "SELECT * FROM users WHERE email = '$email'";

  $result = mysqli_query($conn, $sql);

  if(mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $passwordb = $row['password'];

    // verify password
    if($password==$passwordb) {
      $_SESSION['email'] = $row['email'];
      $_SESSION['prenom'] = $row['prenom'];
      $_SESSION['nom'] = $row['nom'];
      $_SESSION['tel'] = $row['telephone'];
      $_SESSION['loggedin'] = true;
      header("Location: index.php");
      exit();
    } else {
      $error = "Email ou Mot de passe incorrect.";
    }
  } else {
    $error = "Email ou Mot de passe incorrect.";
  }

  mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Connexion</title>
  <link href="styleb.css" rel="stylesheet" type="text/css">
</head>
<body>

  <h1>Connexion</h1>

  <?php if(isset($error)): ?>
    <div><?php echo $error; ?></div>
  <?php endif; ?>

  <form action="" method="post">
    <label>Email:</label>
    <input type="email" name="email" required><br>

    <label>Mot de passe:</label>
    <input type="password" name="password" required><br>

    <button type="submit" name="login">Se connecter</button>
  </form>

</body>
</html>
