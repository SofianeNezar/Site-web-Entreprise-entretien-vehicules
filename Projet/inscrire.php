<html>
    <head>
    <link href="style.css" rel="stylesheet" ,type="text/css">
</head>
<body>
<div class="containera">
<div class="logincontain">
<form action="f.php" method="post">
  <div class="champ">
    <label class="loglabel">Prenom</label>
  <input type="text" name="prenom" placeholder="Prenom">
</div>
  <div class="champ">
  <label class="loglabel">Nom:</label>
  <input type="text" name="nom" placeholder="Nom">
</div>
  <div class="champ">
  <label class="loglabel">Mot de passe:</label>
  <input type="text" name="mdp" placeholder="Mot de passe">
</div>
  <div class="champ">
  <label class="loglabel">Adresse e-mail:</label>
  <input type="text" name="email" placeholder="Adresse e-mail">
</div>
<div class="champ">
  <label class="loglabel">Telephone:</label>
  <input type="text" name="phone" placeholder="Numero de telephone">
</div>
  <div class="champ">
    <input type="submit" name="submit">
 </div>

 </form>
 
 </div>
  </div>
  <?php
    //session_start();
    $servername="localhost";
    $password='';
    $username="root";
    $bdd="login";
    $conn=mysqli_connect($servername,$username,$password,$bdd);
    
    if(isset($_POST["submit"])){
    $nom=$_POST["nom"];
    $prenom= $_POST["prenom"];
    $email=$_POST["email"];
    $phone=$_POST["phone"];
    $mdp =$_POST["mdp"];

    $test = mysqli_query($conn,"SELECT * FROM utilisateurs WHERE email='$email'");
    if(mysql_num_rows($test)>0){
        echo "<script>alert('email already taken');</script>";
    }
    else{
        $query ="INSERT INTO utilisateurs VALUES('$nom','$prenom','$email','$phone','$mdp')";
        mysqli_query($conn,"INSERT INTO utilisateurs VALUES('$nom','$prenom','$email','$phone','$mdp')");
    }

}

?>
 </body>
 </html>