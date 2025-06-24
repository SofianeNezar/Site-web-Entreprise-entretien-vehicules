// Author: Sofiane Nezar
// GitHub: https://github.com/SofianeNezar

<head>
<style>
    body {
        background-color: #f2f2f2;
    }

    h4 {
        text-align: center;
        margin-top: 20px;
    }

    table {
        border-collapse: collapse;
        width: 50%;
        margin: 0 auto;
        text-align: center;
        background-color: #ffffff;
    }

    th, td {
        border: 1px solid black;
        padding: 8px;
    }

    th {
        background-color: #f2f2f2;
    }

    td input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        border: none;
        padding: 5px 10px;
        cursor: pointer;
    }

    td input[type="submit"]:hover {
        background-color: #45a049;
    }
</style>

</head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydatabase";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Selectionne toutes les ligne dela table "rendezvous"
$sql = "SELECT * FROM rendezvous";
$result = mysqli_query($conn, $sql);

// verifier si il y'a des lignes
?>
<h4>Rendez vous LAVAGE</h4>
<?php
if (mysqli_num_rows($result) > 0) {
    // Start table and apply CSS styling
    echo "<table style='border-collapse: collapse; width: 50%; margin: 0 auto; text-align: center;'>";
    echo "<tr>";
    echo "<th style='border: 1px solid black; padding: 8px;'>ID</th>";
    echo "<th style='border: 1px solid black; padding: 8px;'>Date</th>";
    echo "<th style='border: 1px solid black; padding: 8px;'>Heure</th>";
    echo "<th style='border: 1px solid black; padding: 8px;'>Nom</th>";
    echo "<th style='border: 1px solid black; padding: 8px;'>Prenom</th>";
    echo "<th style='border: 1px solid black; padding: 8px;'>Email</th>";
    echo "<th style='border: 1px solid black; padding: 8px;'>Telephone</th>";
    echo "<th style='border: 1px solid black; padding: 8px;'>Action</th>";
    echo "</tr>";

    // Print data rows
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td style='border: 1px solid black; padding: 8px;'>" . $row["id"] . "</td>";
        echo "<td style='border: 1px solid black; padding: 8px;'>" . $row["date"] . "</td>";
        echo "<td style='border: 1px solid black; padding: 8px;'>" . $row["heure"] . "</td>";
        echo "<td style='border: 1px solid black; padding: 8px;'>" . $row["nom"] . "</td>";
        echo "<td style='border: 1px solid black; padding: 8px;'>" . $row["prenom"] . "</td>";
        echo "<td style='border: 1px solid black; padding: 8px;'>" . $row["email"] . "</td>";
        echo "<td style='border: 1px solid black; padding: 8px;'>" . $row["telephone"] . "</td>";
        echo "<td style='border: 1px solid black; padding: 8px;'>";
        echo "<form action='message.php' method='post'>";
        echo "<input type='hidden' name='recepteur' value='" . $row["email"] . "'>";
        echo "<input type='submit' value='Send Message'>";
        echo "</form>";
        echo "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "Aucun rendezvous.";
}
$sqlb = "SELECT * FROM rdvb";
$result = mysqli_query($conn, $sqlb);

// Check if any rows are returned
?>
<h4>Rendez vous REPARATION</h4>
<?php
if (mysqli_num_rows($result) > 0) {
    // Start table and apply CSS styling
    echo "<table style='border-collapse: collapse; width: 50%; margin: 0 auto; text-align: center;'>";
    echo "<tr>";
    echo "<th style='border: 1px solid black; padding: 8px;'>ID</th>";
    echo "<th style='border: 1px solid black; padding: 8px;'>Date</th>";
    echo "<th style='border: 1px solid black; padding: 8px;'>Heure</th>";
    echo "<th style='border: 1px solid black; padding: 8px;'>Nom</th>";
    echo "<th style='border: 1px solid black; padding: 8px;'>Prenom</th>";
    echo "<th style='border: 1px solid black; padding: 8px;'>Email</th>";
    echo "<th style='border: 1px solid black; padding: 8px;'>Telephone</th>";
    echo "<th style='border: 1px solid black; padding: 8px;'>Action</th>";
    echo "</tr>";

    // Print data rows
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td style='border: 1px solid black; padding: 8px;'>" . $row["id"] . "</td>";
        echo "<td style='border: 1px solid black; padding: 8px;'>" . $row["date"] . "</td>";
        echo "<td style='border: 1px solid black; padding: 8px;'>" . $row["heure"] . "</td>";
        echo "<td style='border: 1px solid black; padding: 8px;'>" . $row["nom"] . "</td>";
        echo "<td style='border: 1px solid black; padding: 8px;'>" . $row["prenom"] . "</td>";
        echo "<td style='border: 1px solid black; padding: 8px;'>" . $row["email"] . "</td>";
        echo "<td style='border: 1px solid black; padding: 8px;'>" . $row["telephone"] . "</td>";
        echo "<td style='border: 1px solid black; padding: 8px;'>";
        echo "<form action='message.php' method='post'>";
        echo "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "Aucun rendezvous.";
}
$sqlc = "SELECT * FROM rdvc";
$result = mysqli_query($conn, $sqlc);

// Check if any rows are returned
?>
<h4>Rendez vous VULCANISATION</h4>
<?php
if (mysqli_num_rows($result) > 0) {
    // Start table and apply CSS styling
    echo "<table style='border-collapse: collapse; width: 50%; margin: 0 auto; text-align: center;'>";
    echo "<tr>";
    echo "<th style='border: 1px solid black; padding: 8px;'>ID</th>";
    echo "<th style='border: 1px solid black; padding: 8px;'>Date</th>";
    echo "<th style='border: 1px solid black; padding: 8px;'>Heure</th>";
    echo "<th style='border: 1px solid black; padding: 8px;'>Nom</th>";
    echo "<th style='border: 1px solid black; padding: 8px;'>Prenom</th>";
    echo "<th style='border: 1px solid black; padding: 8px;'>Email</th>";
    echo "<th style='border: 1px solid black; padding: 8px;'>Telephone</th>";
    echo "<th style='border: 1px solid black; padding: 8px;'>Action</th>";
    echo "</tr>";

    // Print data rows
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td style='border: 1px solid black; padding: 8px;'>" . $row["id"] . "</td>";
        echo "<td style='border: 1px solid black; padding: 8px;'>" . $row["date"] . "</td>";
        echo "<td style='border: 1px solid black; padding: 8px;'>" . $row["heure"] . "</td>";
        echo "<td style='border: 1px solid black; padding: 8px;'>" . $row["nom"] . "</td>";
        echo "<td style='border: 1px solid black; padding: 8px;'>" . $row["prenom"] . "</td>";
        echo "<td style='border: 1px solid black; padding: 8px;'>" . $row["email"] . "</td>";
        echo "<td style='border: 1px solid black; padding: 8px;'>" . $row["telephone"] . "</td>";
        echo "<td style='border: 1px solid black; padding: 8px;'>";
        echo "<form action='message.php' method='post'>";
        echo "<input type='hidden' name='recepteur' value='" . $row["email"] . "'>";
        echo "<input type='submit' value='Send Message'>";
        echo "</form>";
        echo "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "Aucun rendezvous.";
}
mysqli_close($conn);
?>
</body>
