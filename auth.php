<?php
require 'db.php';

if (isset($_POST['signup'])) {
    $db = getMongoConnection();
    
    // Collect form data
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $phone = $_POST['phone'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // File upload handling
    $photo = $_FILES['photo']['name'];
    $target = "../assets/images/" . basename($photo);
    move_uploaded_file($_FILES['photo']['tmp_name'], $target);

    // Save user in MongoDB
    $db->users->insertOne([
        'name' => $name,
        'gender' => $gender,
        'dob' => $dob,
        'phone' => $phone,
        'photo' => $photo,
        'password' => $password,
    ]);

    header("Location: signin.php");
}

// /scripts/auth.php (continue for Sign In)
session_start();

if (isset($_POST['signin'])) {
    $db = getMongoConnection();
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    $user = $db->users->findOne(['phone' => $phone]);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user->_id;
        header("Location: profile.php");
    } else {
        echo "Invalid phone number or password.";
    }
}
?>

?>
