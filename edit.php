<?php
require_once 'phpHandler.php';

// Establish database connection
$conn = new PDO('mysql:host=localhost;dbname=iap-work', 'root', '');

// Create an instance of the phpHandler class
$user = new phpHandler($conn);

// Fetch user data based on userId
if (isset($_GET['userId'])) {
    $data = $user->fetchSingleUser($_GET['userId']);
} else {
    echo "User ID not provided!";
    exit;
}

// Handle the update request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_POST['id'];
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];

    if ($user->update($fullname, $username, $email, $gender, $password, $userId)) {
        header("Location: userTable.php");
    } else {
        echo "Error updating user.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h1>Edit User</h1>
        <form action="edit.php?userId=<?= htmlspecialchars($_GET['userId']) ?>" method="POST">
            <input type="hidden" name="id" value="<?= htmlspecialchars($data['userId']) ?>">
            
            <div class="mb-3">
                <label for="fullname" class="form-label">Full Name:</label>
                <input type="text" name="fullname" id="fullname" class="form-control" value="<?= htmlspecialchars($data['fullname']) ?>" required>
            </div>
            
            <div class="mb-3">
                <label for="username" class="form-label">Username:</label>
                <input type="text" name="username" id="username" class="form-control" value="<?= htmlspecialchars($data['username']) ?>" required>
            </div>
            
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" name="email" id="email" class="form-control" value="<?= htmlspecialchars($data['email']) ?>" required>
            </div>
            
            <div class="mb-3">
                <label for="gender" class="form-label">Gender:</label>
                <select name="gender" id="gender" class="form-select" required>
                    <option value="Male" <?= $data['gender'] == 'Male' ? 'selected' : '' ?>>Male</option>
                    <option value="Female" <?= $data['gender'] == 'Female' ? 'selected' : '' ?>>Female</option>
                    <option value="Prefer not to say" <?= $data['gender'] == 'Prefer not to say' ? 'selected' : '' ?>>Prefer not to say</option>
                </select>
            </div>
            
            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Enter new password">
            </div>
            
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>