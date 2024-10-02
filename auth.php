class auth {
    public function signup($conn, $ObjGlob) {
        if (isset($_POST["signup"])) {
            $errors = array();
            
            // Sanitize inputs
            $fullname = $_SESSION["fullname"] = ucwords(strtolower(trim($_POST["fullname"])));
            $email_address = $_SESSION["email_address"] = strtolower(trim($_POST["email_address"]));
            $username = $_SESSION["username"] = strtolower(trim($_POST["username"]));

            // Validate full name (letters, spaces, apostrophes, dashes)
            if (!preg_match("/^[a-zA-Z\s'-]+$/", $fullname)) {
                $errors['name_err'] = "Full name must contain only letters, spaces, apostrophes, or dashes.";
            }

            // Validate email format
            if (!filter_var($email_address, FILTER_VALIDATE_EMAIL)) {
                $errors['email_format_err'] = "Invalid email format.";
            }

            // Check if email domain is valid
            $conf['valid_domains'] = ["strathmore.edu", "gmail.com", "yahoo.com", "mada.co.ke", "outlook.com"];
            $arr_email_address = explode("@", $email_address);
            $spot_dom = strtolower(end($arr_email_address));

            if (!in_array($spot_dom, $conf['valid_domains'])) {
                $errors['mailDomain_err'] = "Invalid email domain. Use: " . implode(", ", $conf['valid_domains']);
            }

            // Check if email already exists
            $stmt = $conn->prepare("SELECT email FROM users WHERE email = ? LIMIT 1");
            $stmt->bind_param("s", $email_address);
            $stmt->execute();
            $stmt->store_result();
            if ($stmt->num_rows > 0) {
                $errors['mailExists_err'] = "Email already exists.";
            }

            // Check if username already exists
            $stmt = $conn->prepare("SELECT username FROM users WHERE username = ? LIMIT 1");
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $stmt->store_result();
            if ($stmt->num_rows > 0) {
                $errors['usernameExists_err'] = "Username already exists.";
            }

            // Validate username (letters only)
            if (!ctype_alpha($username)) {
                $errors['username_err'] = "Username must contain only letters.";
            }

            // Process form if no errors
            if (!count($errors)) {
                $cols = ['fullname', 'email', 'username'];
                $vals = [$fullname, $email_address, $username];
                $data = array_combine($cols, $vals);
                $insert = $conn->insert('users', $data);
                
                if ($insert) {
                    header('Location: signup.php');
                    unset($_SESSION["fullname"], $_SESSION["email_address"], $_SESSION["username"]);
                    exit();
                } else {
                    die($insert);
                }
            } else {
                $ObjGlob->setMsg('errors', $errors, 'invalid');
            }
        }
    }
}
