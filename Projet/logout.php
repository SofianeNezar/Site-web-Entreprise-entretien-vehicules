<?php 
    ob_start();
    include 'login.php';
    ob_end_clean(); ?>
<?php
session_start();
session_destroy();
// Redirect the user to the desired page after logout
header("Location: index.php");
exit();
?>
