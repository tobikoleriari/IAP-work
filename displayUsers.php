<?php
require_once 'phpHandler.php';

class display {
    function displayUsers() {
        $conn = new PDO('mysql:host=localhost;dbname=iap-work', 'root', '');
        $user = new phpHandler($conn);
        $users = $user->fetchData();
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Users</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        </head>
        <body>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">User ID</th>
                    <th scope="col">Fullname</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($users) {
                    foreach ($users as $user) {
                        echo "<tr>
                            <th scope='row'>{$user['userId']}</th>
                            <td>{$user['fullname']}</td>
                            <td>{$user['username']}</td>
                            <td>{$user['email']}</td>
                            <td>{$user['gender']}</td>
                            <td>
                                <a href='edit.php?id={$user['userId']}'>Edit</a>
                                <form action='delete.php' method='POST' style='display:inline;'>
                                    <input type='hidden' name='id' value='{$user['userId']}'>
                                    <button type='submit'>Delete</button>
                                </form>
                            </td>
                        </tr>";
                    }
                }
                ?>
            </tbody>
        </table>
        </body>
        </html>
        <?php
    }
}
?>
