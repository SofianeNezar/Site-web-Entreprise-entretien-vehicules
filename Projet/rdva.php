
    <head>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        
        form {
            width: 300px;
            margin: 0 auto;
            text-align: center;
            border-color:black;
            border: outset;
            padding:3rem;
            background-image: linear-gradient(black,grey);
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        select {
            width: 100%;
            padding: 5px;
            margin-bottom: 10px;
        }
        button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
            border-radius:3rem;
        }

        button:hover {
            background-color: #0056b3;
        }
        .containerb{
            display:flex;
            justify-content:center;
            align-items:center;
            height:100vh;

        }
    </style>

    </head>
    <body>
        <?php 
        
        session_start(); ?>
    <?php 
    $sdate= $_SESSION["date"];
    $servername = "localhost";
        $password = '';
        $username = "root";
        $bdd = "mydatabase";
        $conn = mysqli_connect($servername, $username, $password, $bdd); ?>
    <?php 

    $sdate = $_SESSION['date'];
    
    function verif($conn,$type,$sdate,$heure){
        switch ($type) {
            case 'lavage':
                $test = mysqli_query($conn,"SELECT * FROM rendezvous WHERE date='$sdate' AND heure='$heure'");
           if(mysqli_num_rows($test)>0){
            echo 'style="background-color: red;"disabled';
           }
                break;
        
            case 'repar':
                $test = mysqli_query($conn,"SELECT * FROM rdvb WHERE date='$sdate' AND heure='$heure'");
           if(mysqli_num_rows($test)>0){
            echo 'style="background-color: red;"disabled';
           }
                break;
        
            case 'vulc':
                $test = mysqli_query($conn,"SELECT * FROM rdvc WHERE date='$sdate' AND heure='$heure'");
           if(mysqli_num_rows($test)>0){
            echo 'style="background-color: red;"disabled';
           }
        
                break;
        }

    }
    ?>

    
    <div class="container">
        <div class="containerb">
    <form method="post" action="rdva.php">
        <label for="heure">Heure :</label>
	<select  id="heure" name="heure" >
	  <option value="">Sélectionnez un horaire</option>
	   <option value="08:00" <?php verif($conn,$_SESSION["type"],$sdate,"08:00") ?>>08:00</option>
	   <option value="08:30" <?php verif($conn,$_SESSION["type"],$sdate,"08:30") ?>>08:30</option>
	   <option value="09:00" <?php verif($conn,$_SESSION["type"],$sdate,"09:00") ?> >09:00</option>
	   <option value="09:30" <?php verif($conn,$_SESSION["type"],$sdate,"09:30") ?> >09:30</option>
	   <option value="10:00" <?php verif($conn,$_SESSION["type"],$sdate,"10:00") ?> > 10:00</option>
	   <option value="10:30" <?php verif($conn,$_SESSION["type"],$sdate,"10:30") ?> >10:30</option>
	   <option value="11:00" <?php verif($conn,$_SESSION["type"],$sdate,"11:00") ?> >11:00</option>
	   <option value="11:30" <?php verif($conn,$_SESSION["type"],$sdate,"11:30") ?> >11:30</option>
	   <option value="12:00" <?php verif($conn,$_SESSION["type"],$sdate,"12:00") ?> >12:00</option>
	   <option value="13:00" <?php verif($conn,$_SESSION["type"],$sdate,"13:00") ?> >13:00</option>
	   <option value="13:30" <?php verif($conn,$_SESSION["type"],$sdate,"13:30") ?> >13:30</option>
	   <option value="14:00" <?php verif($conn,$_SESSION["type"],$sdate,"14:00") ?> >14:00</option>
	   <option value="14:30" <?php verif($conn,$_SESSION["type"],$sdate,"14:30") ?> >14:30</option>
	   <option value="15:00" <?php verif($conn,$_SESSION["type"],$sdate,"15:00") ?> >15:00</option>
	   <option value="15:30" <?php verif($conn,$_SESSION["type"],$sdate,"15:30") ?> >15:30</option>
	   <option value="16:00" <?php verif($conn,$_SESSION["type"],$sdate,"16:00") ?> >16:00</option>
	   <option value="16:30" <?php verif($conn,$_SESSION["type"],$sdate,"16:30") ?> >16:30</option>
	   <option value="17:00" <?php verif($conn,$_SESSION["type"],$sdate,"17:00") ?> >17:00</option>
	</select>


	
    <button type="submit" name="submit" >Confirmer</button>
</form>
</div>
</div>
<?php

if (isset($_POST["heure"])) {
    if (isset($_SESSION["date"])) {
        $servername = "localhost";
        $password = '';
        $username = "root";
        $bdd = "mydatabase";
        $conn = mysqli_connect($servername, $username, $password, $bdd);
        
        $heure = $_POST["heure"];
        $date = $_SESSION['date'];
        $nom = $_SESSION['nom'];
        $prenom = $_SESSION['prenom'];
        $tel = $_SESSION['tel'];
        $email = $_SESSION['email'];

        switch ($_SESSION["type"]) {
            case 'lavage':
                $query = "SELECT COUNT(*) as count FROM rendezvous";
                $result = mysqli_query($conn, $query);
                $row = mysqli_fetch_assoc($result);
                $id = $row['count'];
                
                $sql = "INSERT INTO rendezvous (id,date, heure,nom,prenom,email,telephone) VALUES ('$id',$date', '$heure','$nom','$prenom','$email','$tel')";
                mysqli_query($conn, $sql);
                break;

            case 'repar':
                $query = "SELECT COUNT(*) as count FROM rdvb";
                $result = mysqli_query($conn, $query);
                $row = mysqli_fetch_assoc($result);
                $id = $row['count'];
                
                $sql = "INSERT INTO rdvb (id,date, heure,nom,prenom,email,telephone) VALUES ('$id','$date', '$heure','$nom','$prenom','$email','$tel')";
                mysqli_query($conn, $sql);
                break;

            case 'vulc':
                $query = "SELECT COUNT(*) as count FROM rdvc";
                $result = mysqli_query($conn, $query);
                $row = mysqli_fetch_assoc($result);
                $id = $row['count'];

                $sql = "INSERT INTO rdvc (id, date, heure, nom, prenom, email, telephone) VALUES ('$id', '$date', '$heure', '$nom', '$prenom', '$email', '$tel')";
                mysqli_query($conn, $sql);

                break;
        }
    }
    header("Location: index.php");
}
exit;
?>



</body>