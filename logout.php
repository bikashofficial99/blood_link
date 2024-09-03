<header><?php 
$active ='logout';
include('head.php');
?></header><?php
    session_start();
    // Destroy session
    if(session_destroy()) {
        // Redirecting To Home Page
        header("Location: login.php");
    }
?>
