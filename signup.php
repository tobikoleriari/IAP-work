<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css" rel="stylesheet">
</head>
</head>

<body>
    <div class="container mt-5">
        <form action="" method post>
            <h1>Sign up</h1>

            <label for="name" class="form-label"> Full Name</label>
            <div class="mb-1 input-group">
                <span class="input-group-text">
                    <i class="bi bi-person-vcard"></i>
                </span>
                <input type="text" id="fullname" class="form-control" required>
            </div>

            <label for="username" class="form-label">Username</label>
            <div class="mb-1 input-group">
                <span class="input-group-text">
                    <i class="bi bi-person-fill"></i>
                </span>
                <input type="text" id="username" class="form-control" required>
            </div>
            <label for="email" class="form-label">Email</label>
            <div class="mb-1 input-group">
                <span class="input-group-text">
                    <i class="bi bi-envelope-fill"></i>
                </span>
                <input type="email" id="email" class="form-control" required>
            </div>

            <label for="password" class="form-label">Password</label>
            <div class="mb-1 input-group">
                <span class="input-group-text">
                    <i class="bi bi-lock-fill"></i>
                </span>
                <input type="password" id="password" class="form-control" required>
            </div>
            <label for="gender id" class="form-label">Gender</label>
            <div class="mb-1 input-group">
                <span class="input-group-text">
                    <i class="bi bi-gender-female"></i>
                    <i class="bi bi-gender-male"></i>
                </span>
                <select class="form-select" id="genderid" required>
                    <option value="1">Male</option>
                    <option value="2">Female</option>
                </select>
            </div>
            <label for="role id" class="form-label">Role </label>
            <div class="mb-1 input-group">
                <span class="input-group-text">
                    <i class="bi bi-people-fill"></i>
                </span>
                <select class="form-select" id="roleid" required>
                    <option value="1">Student</option>
                    <option value="2">Teacher</option>
                </select>
            </div>
            <div class="mb-4 text-center">
                <button type="submit" class="btn-secondary bd-0">Sign Up</button>
            </div>
    </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
</body>

</html>