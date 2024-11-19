<?php
require_once 'phpHandler.php';
$user = new phpHandler($conn);

if (isset($_GET['id'])) {
    $data = $user->fetchSingleUser($_GET['id']);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender= $_POST['gender'];

    if ($user->update($id, $fullname, $username, $email,$gender, $password)) {
        echo "User updated successfully!";
    } else {
        echo "Error updating user.";
    }
}
?>
<form action="edit.php" method="POST">
    <input type="hidden" name="id" value="<?= $data['id'] ?>">
    <input type="text" name="fullname" value="<?= $data['fullname'] ?>" required>
    <input type="text" name="username" value="<?= $data['username'] ?>" required>
    <input type="email" name="email" value="<?= $data['email'] ?>" required>
    <select class="form-select" aria-label="Default select example">
                                <option selected>Gender</option>
                                <option value="1">Male</option>
                                <option value="2">Female</option>
                                <option value="3">Prefer not to say</option>
                            </select>
    <input type="password" name="password" placeholder="Enter new password">
    <button type="submit">Update</button>
</form>
