<?php
// start session
session_start();

if(isset($_POST['signup'])) {

  // connecter a la bdd
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "mydatabase";

  $conn = mysqli_connect($servername, $username, $password, $dbname);

  // check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  // avoir entrée utilisateur
  $nom = mysqli_real_escape_string($conn, $_POST['nom']);
  $prenom = mysqli_real_escape_string($conn, $_POST['prenom']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  $tel = mysqli_real_escape_string($conn, $_POST['telephone']);



  // inserer a la base de données
  $sql = "INSERT INTO users (nom,prenom, email, password,telephone) VALUES ('$nom', '$prenom', '$email', '$password','$tel')";

  $test = mysqli_query($conn,"SELECT * FROM users WHERE email='$email'");
    if(mysqli_num_rows($test)>0){
        echo "<script>alert('email already taken');</script>";
    }
    else{
      mysqli_query($conn, $sql);
      header("Location: index.php");
      exit();
    }

  mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Inscription</title>
  <link href="stylea.css" rel="stylesheet", type="text/css">
</head>
<body>

  <h1>Inscription</h1>


  <form action="" method="post">
    <label>Nom:</label>
    <input type="text" name="nom" required><br>
    <label>Prenom:</label>
    <input type="text" name="prenom" required><br>

    <label>Email:</label>
    <input type="email" name="email" required><br>

    <label>Mot de passe:</label>
    <input type="password" name="password" required><br>

    <label>Telephone:</label>
    <input type="text" name="telephone" required><br>

    <button type="submit" name="signup">S'inscrire</button>
  </form>

</body>
</html>
