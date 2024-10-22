<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: signin.php");
    exit();
}

$db = getMongoConnection();
$user = $db->users->findOne(['_id' => new MongoDB\BSON\ObjectId($_SESSION['user_id'])]);

// Display logged-in user's profile
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>
    <h2>Welcome, <?php echo $user['name']; ?></h2>
    <img src="../assets/images/<?php echo $user['photo']; ?>" alt="Profile Photo">
    <p>Phone: <?php echo $user['phone']; ?></p>
    <p>Gender: <?php echo $user['gender']; ?></p>
    <p>Date of Birth: <?php echo $user['dob']; ?></p>

    <a href="browse.php">Browse Profiles</a>
    
    <h3>Wishlisted Profiles</h3>
    <ul>
        <?php
        $wishlists = $db->wishlists->find(['user_id' => $_SESSION['user_id']]);
        foreach ($wishlists as $wishlist) {
            $wishlistedUser = $db->users->findOne(['_id' => new MongoDB\BSON\ObjectId($wishlist['profile_id'])]);
            echo "<li>" . $wishlistedUser['name'] . "</li>";
        }
        ?>
    </ul>

    <a href="sign_out.php">Sign Out</a> <!-- Sign-out link -->
</body>
</html>
