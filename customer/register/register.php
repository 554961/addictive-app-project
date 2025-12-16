<?php
    require_once "config.php";

    $username = $password = $confirm_password = $email = '';
    $username_err = $password_err = $confirm_password_err = $email_err = '';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Validate name
        if (empty(trim($_POST["username"]))) {
            $name_err = "Please enter a username.";
        } elseif (!preg_match("/^[a-zA-Z ]+$/", trim($_POST["username"]))) {
            $name_err = "Username can only contain letters and spaces.";
        } else {
            $sql = "SELECT id FROM users WHERE Name = ?";

            if ($stmt = mysqli_prepare($link, $sql)) {
                mysqli_stmt_bind_param($stmt, "s", $param_name);
                $param_name = trim($_POST["username"]);

                if (mysqli_stmt_execute($stmt)) {
                    mysqli_stmt_store_result($stmt);

                    if (mysqli_stmt_num_rows($stmt) > 0) {
                        $name_err = "This username is already taken.";
                    } else {
                        $name = trim($_POST["username"]);
                    }
                }
                mysqli_stmt_close($stmt);
            }
        }

        // Validate email
        if (empty(trim($_POST["email"]))) {
            $email_err = "Please enter an email.";
        } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $email_err = "Invalid email format.";
        } else {
            $sql = "SELECT phoneNo FROM users WHERE Email = ?";

            if ($stmt = mysqli_prepare($link, $sql)) {
                mysqli_stmt_bind_param($stmt, "s", $param_email);
                $param_email = trim($_POST["email"]);

                if (mysqli_stmt_execute($stmt)) {
                    mysqli_stmt_store_result($stmt);

                    if (mysqli_stmt_num_rows($stmt) > 0) {
                        $email_err = "This email is already registered.";
                    } else {
                        $email = trim($_POST["email"]);
                    }
                }
                mysqli_stmt_close($stmt);
            }
        }


        // Password
        if (empty(trim($_POST["password"]))) {
            $password_err = "Please enter a password.";
        } elseif (strlen(trim($_POST["password"])) < 6) {
            $password_err = "Password must have at least 6 characters.";
        } else {
            $password = trim($_POST["password"]);
        }

        // Confirm password
        if (empty(trim($_POST["confirm_password"]))) {
            $confirm_password_err = "Please confirm password.";
        } elseif ($password != trim($_POST["confirm_password"])) {
            $confirm_password_err = "Passwords do not match.";
        } else {
            $confirm_password = trim($_POST["confirm_password"]);
        }

        // Insert if valid
        if (empty($name_err) && empty($password_err) && empty($confirm_password_err) && empty($email_err)) {

            mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

            $sql = "INSERT INTO users (name, password, email) VALUES (?, ?, ?)";

            if ($stmt = mysqli_prepare($link, $sql)) {

                mysqli_stmt_bind_param($stmt, "sss", $insert_name, $insert_password, $insert_email);

                $insert_name = $name;
                $insert_password = password_hash($password, PASSWORD_DEFAULT);
                $insert_email = $email;

                if (mysqli_stmt_execute($stmt)) {
                    header("location: ");  //Take user to landing page or games page
                    exit;
                } else {
                    echo "Database error: " . mysqli_error($link);
                }

                mysqli_stmt_close($stmt);
            }
        }

        mysqli_close($link);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">    
                        <div class="wrapper">
                            <h2>Sign Up</h2>
                            <p>Please fill out this from to create an account.</p>
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="username" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>">
                                    <span class="invalid-feedback"><?php echo $name_err; ?></span>
                                </div>

                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
                                    <span class="invalid-feedback"><?php echo $email_err; ?></span>
                                </div>

                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input type="text" name="phone" class="form-control <?php echo (!empty($phone_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $phone; ?>">
                                    <span class="invalid-feedback"><?php echo $phone_err; ?></span>
                                </div>

                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                                    <span class="invalid-feedback"><?php echo $password_err; ?></span>
                                </div>

                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo htmlspecialchars($confirm_password); ?>">
                                    <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
                                </div>

                                <br>

                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Submit">
                                    <input type="reset" class="btn btn-secondary ml-2" value="Reset">
                                </div>

                                <p>Already have an account? <a href="login.php">Login here</a></p>

                                <a href="index.html" class="btn btn-warning">Return</a>
                            </form>
                        </div>
                    </div>
</body>
</html>