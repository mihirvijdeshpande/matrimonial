<?php
session_start();
require 'db.php';

if (isset($_POST['wishlist'])) {
    $db = getMongoConnection();
    $profile_id = $_POST['profile_id'];

    $db->wishlists->insertOne([
        'user_id' => $_SESSION['user_id'],
        'profile_id' => $profile_id,
    ]);

    header("Location: profile.php");
}
?>
