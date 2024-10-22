<?php
require 'db.php'; // Include your database connection file

// Fetch all user profiles from the database
$collection = $db->users; // Make sure 'users' is the name of your collection
$profiles = $collection->find();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Browse Profiles</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to your CSS file -->
</head>
<body>
    <h1>Browse Profiles</h1>
    <div class="profile-list">
        <?php foreach ($profiles as $profile): ?>
            <div class="profile-card">
                <img src="<?php echo htmlspecialchars($profile['photo']); ?>" alt="<?php echo htmlspecialchars($profile['name']); ?>" class="profile-photo">
                <h2><?php echo htmlspecialchars($profile['name']); ?></h2>
                <p>Gender: <?php echo htmlspecialchars($profile['gender']); ?></p>
                <p>Date of Birth: <?php echo htmlspecialchars($profile['dob']); ?></p>
                <p>Phone: <?php echo htmlspecialchars($profile['phone']); ?></p>
                <button onclick="addToWishlist('<?php echo $profile['_id']; ?>')">Add to Wishlist</button>
            </div>
        <?php endforeach; ?>
    </div>

    <script>
        function addToWishlist(profileId) {
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "add_to_wishlist.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    const response = JSON.parse(xhr.responseText);
                    alert(response.message);
                }
            };
            xhr.send("profile_id=" + encodeURIComponent(profileId));
        }
    </script>
</body>
</html>
