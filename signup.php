<?php
class Signup
{
    public function signUpForm()
    {
?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Signup</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
            <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css" rel="stylesheet">
            <style>
                .signup-section,
                .image-section {
                    /* background-color: #343a40; */
                    color: white;
                    padding: 2rem;
                    border-radius: 10px;
                }

                .image-section img {
                    max-width: 100%;
                    height: auto;
                    border-radius: 10px;
                }

                .signup-section {
                    background-color: #343a40;
                }
            </style>
        </head>
        <body>
            <div class="row align-items-md-stretch">
                <div class="col-md-6 m-5 signup-section">
                    <div class="h-100 p-5 rounded-3">
                        <form action="sendMail.php" method="POST">
                            <h1>Sign up</h1>

                            <label for="fullname" class="form-label">Full Name</label>
                            <div class="mb-1 input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-person-vcard"></i>
                                </span>
                                <input type="text" id="fullname" name="fullname" class="form-control" placeholder="Enter full name" required>
                            </div>

                            <label for="username" class="form-label">Username</label>
                            <div class="mb-1 input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-person-fill"></i>
                                </span>
                                <input type="text" id="username" name="username" class="form-control" placeholder="Enter Username" required>
                            </div>

                            <label for="email" class="form-label">Email</label>
                            <div class="mb-1 input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-envelope-fill"></i>
                                </span>
                                <input type="email" id="email" name="email" class="form-control" placeholder="Enter email" required>
                            </div>

                            <label for="password" class="form-label">Password</label>
                            <div class="mb-1 input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-lock-fill"></i>
                                </span>
                                <input type="password" id="password" name="password" class="form-control" placeholder="Enter Password" required>
                            </div>
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Gender</option>
                                <option value="1">Male</option>
                                <option value="2">Female</option>
                                <option value="3">Prefer not to say</option>
                            </select>

                            <div class="mb-4 text-center">
                                <button type="submit" name='signup' class="btn btn-secondary">Sign Up</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-4 m-5 image-section">
                    <img src="images/porsche.jpg" alt="Signup Image">
                </div>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        </body>
        </html>
<?php
    }
}
?>