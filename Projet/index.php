<html>
    <head>
        <link href="style.css" rel="stylesheet", type="text/css">
    </head>
    <body>
    <?php 
    ob_start();
    include 'login.php';
    ob_end_clean(); ?>
    <?php


if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true && isset($_SESSION['email']) && $_SESSION['email'] != "sarlcodauto@gmail.com"){
    // Session est acrive
    ?>
    <div class="nav">
        <ul class="menu">
            <li>info</li>
            <a href="logout.php"><li>Deconnexion</li></a>
            <li>Contact</li>
           
        </ul></div>
    <?php
}
else if (isset($_SESSION['email']) && $_SESSION['email'] === "sarlcodauto@gmail.com"){
    ?>
    <div class="nav">
        <ul class="menu">
            <li>info</li>
            <a href="logout.php"><li>Deconnexion</li></a>
            <a href="rdvs.php"><li>Espace employes</li></a>
        </ul></div>
    <?php
}

else {
    // Session n'est pas active
    ?>
    <div class="nav">
        <ul class="menu">
            <li>info</li>
                <a href="test.php"><li>Inscription</li></a>
                <a href="login.php"><li>Connexion</li></a>
            <li>Contact</li>
        </ul></div>
    <?php
}
?>

        
        
        <div class="uppcontainer">
        <div class="upperacc"> 
        <img src="upperaccbg.jpg" class="upperbg" id="accimg">
        <h1 id="logo">SARL CODAUTO</h1> 
        <div class="header">
        <h2 class="headertxt">Prise de rendez-vous en ligne</h2>
        <p class="headertxt">Reservez un rendez-vous pour l'entretien de votre vehicule en un clic Lavage,Vulcanisation,Reparation</p>
        <p class="headertxt">Connectez vous pour prendre un rendezvous</p>

        <?php if (isset($_SESSION['loggedin'])){
        ?>
        <a href="entretien.php" class="rdv"><h4 id="rdvtxt">Prendre rendez-vous<h4></a>
        <?php    
        }else{
            ?>
            <a href="login.php" class="btncnx"><h4 id="rdvtxt">Connexion<h4></a>
            <a href="test.php" class="btnins"><span>s'inscrire</span>
            <?php
        }
        
        ?>

    </div>
        </div>

        </div>
        </div>
        <div class="infoacc">
            <div class="infbox" id="inftelephone"><p class="infboxtxt">Telephone: 0555555555</p></div>
            <div class="infbox" id="infadresse"><p class="infboxtxt" >Adresse:Tizi Ouzou</p></div>
            <div class="infbox" id="infemail"><p class="infboxtxt">Email: Sarlcodauto@gmail.com</p></div>
        </div>
    </body>
</html>