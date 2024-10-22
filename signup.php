<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Matrimonial</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>
    <h2>Sign Up</h2>
    <form action="auth.php" method="POST" enctype="multipart/form-data">
        <label for="name">Name:</label>
        <input type="text" name="name" required>
        
        <label for="gender">Gender:</label>
        <select name="gender" required>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>

        <label for="dob">Date of Birth:</label>
        <input type="date" name="dob" required>

        <label for="phone">Phone Number:</label>
        <input type="text" name="phone" required>

        <label for="photo">Profile Photo:</label>
        <input type="file" name="photo" accept="image/*" required>

        <label for="password">Password:</label>
        <input type="password" name="password" required>

        <button type="submit" name="signup">Sign Up</button>
    </form>
</body>
</html>
