<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In - Matrimonial</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>
    <h2>Sign In</h2>
    <form action="auth.php" method="POST">
        <label for="phone">Phone Number:</label>
        <input type="text" name="phone" required>

        <label for="password">Password:</label>
        <input type="password" name="password" required>

        <button type="submit" name="signin">Sign In</button>
    </form>
</body>
</html>
