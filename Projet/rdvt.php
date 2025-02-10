<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        
        form {
            width: 300px;
            margin: 0 auto;
            text-align: center;
            border-color: black;
            border: outset;
            padding: 3rem;
            background-image: linear-gradient(orange, white);
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
            border-radius: 3rem;
        }

        button:hover {
            background-color: #0056b3;
        }
        
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
    </style>
</head>
<body>  
<?php
session_start();

if (isset($_GET['service'])) {
    $service = $_GET['service'];
    $_SESSION["type"] = $service;
}
?>
<?php $today = date('Y-m-d'); ?>
<div class="container">
    <form method="post" action="rdvt.php">
        <label for="date">Date:</label>
        <select id="date" name="date">
            <option value="">Sélectionnez une date</option>
            <option value="<?php echo date('Y-m-d'); ?>"><?php echo date('Y-m-d'); ?></option>
            <option value="<?php echo date('Y-m-d', strtotime('+1 day')); ?>"><?php echo date('Y-m-d', strtotime('+1 day')); ?></option>
            <option value="<?php echo date('Y-m-d', strtotime('+2 day')); ?>"><?php echo date('Y-m-d', strtotime('+2 day')); ?></option>
            <option value="<?php echo date('Y-m-d', strtotime('+3 day')); ?>"><?php echo date('Y-m-d', strtotime('+3 day')); ?></option>
            <option value="<?php echo date('Y-m-d', strtotime('+4 day')); ?>"><?php echo date('Y-m-d', strtotime('+4 day')); ?></option>
            <option value="<?php echo date('Y-m-d', strtotime('+5 day')); ?>"><?php echo date('Y-m-d', strtotime('+5 day')); ?></option>
        </select>
        <button type="submit" name="submit">Confirmer</button>
    </form>
</div>

<?php
session_start();

if (isset($_POST["submit"])) {
    $_SESSION['date'] = $_POST["date"];
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mydatabase";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    header("Location: rdva.php");
    exit;
}
?>




</body>
</html>
