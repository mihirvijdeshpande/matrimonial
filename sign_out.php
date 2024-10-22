<?php
session_start(); // Start the session

// Destroy the session to log out the user
session_destroy();

// Redirect to the sign-in page
header("Location: index.php"); // Replace 'sign_in.php' with the actual filename of your sign-in page
exit();
?>
