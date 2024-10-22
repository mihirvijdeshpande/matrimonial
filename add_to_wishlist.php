<?php
require 'db.php'; // Include your database connection file

// Check if user is logged in (this is a placeholder, implement your own logic)
session_start();
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'User not logged in.']);
    exit;
}

$userId = $_SESSION['user_id']; // Get the logged-in user's ID
$profileId = $_POST['profile_id']; // Get the profile ID from the AJAX request

// Create the wishlists collection if it doesn't exist
$wishlistCollection = $db->wishlists;

// Check if the profile is already in the wishlist
$existingWishlistEntry = $wishlistCollection->findOne(['user_id' => $userId, 'profile_id' => $profileId]);

if ($existingWishlistEntry) {
    echo json_encode(['success' => false, 'message' => 'Profile already in wishlist.']);
    exit;
}

// Insert the new wishlist entry
$insertResult = $wishlistCollection->insertOne([
    'user_id' => $userId,
    'profile_id' => $profileId
]);

if ($insertResult->getInsertedCount() === 1) {
    echo json_encode(['success' => true, 'message' => 'Profile added to wishlist.']);
} else {
    echo json_encode(['success' => false, 'message' => 'Failed to add to wishlist.']);
}
?>
