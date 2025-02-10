<?php
// start session
session_start();

// check if form is submitted
if (isset($_POST['login'])) {
    // connect to database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mydatabase";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // get user input
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // retrieve user data from database
    $sql = "SELECT * FROM users WHERE email = '$email'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $hashed_password = $row['password'];

        // verify password
        if (password_verify($password, $hashed_password)) {
            $_SESSION['email'] = $row['email'];
            $_SESSION['prenom'] = $row['prenom'];
            $_SESSION['loggedin'] = true;
            header("Location: index.php"); // change this to the correct location
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
