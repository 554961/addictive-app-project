<?php
    require_once '../../database_code/config.php';
    require_once '../../components/navbar.php';
    // session_start();
    // uncomment if the navbar ever removes it

    $error = '';
    // above var is a test; logic will be in place soon

    // was user sent here from register page?
    $registered = isset($_GET['registered']);

    if (isset($_POST['login'])) {
        // set the entered data to a variable for ease of referral
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        // look up the username
        $sql = "SELECT * FROM users WHERE username = '$username' LIMIT 1";
        $result = mysqli_query($conn, $sql);

        // if any matches, proceed
        if ($result && mysqli_num_rows($result) === 1) {
            $user = mysqli_fetch_assoc($result);

            // check password via password_verify
            if (password_verify($password, $user['password'])) {
                // if successful, log in
                $_SESSION['logged_in'] = true;
                $_SESSION['username'] = $user['username'];
                header("Location: index.php");
                exit;
            } else {
                $error = "Incorrect password.";
            }
        } else {
            $error = "User not found.";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Login</title>
    <!-- <link rel="stylesheet" href="../../styles/styles.css"> -->
    <!-- stylesheet messes with a lot of elements, preferably do not refer to it -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" 
    integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <style>
        /* if needed can implement this into styles.css but the stylesheet messes with a lot of content on this page, take caution */
        body { /* this is for the gradient background, but can be changed to fit another element */
            /* tone down the colour brightness here to give more attention to the brighter elements */
            background-image: linear-gradient(to bottom left, rgb(120, 0, 0), rgb(0, 70, 0), rgb(120, 0, 0));
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100% 100%;
        }

        h1, h3, p {
            color: white;
        }
        
        .content-container { /* has everything on the page excluding navbar and footer. those can be edited in their respective files ofc... */
            margin-left: 10%;
            margin-right: 10%;
            z-index: 2;
        }

        .yellow-border-box { /* general content container, but for sections rather than the whole page */
            border: 2px solid yellow;
            border-radius: 10px;
            padding: 1%;
            padding-left: 10%;
            padding-right: 5%;
            /* brighten up colours to attract attention */
            background-image: linear-gradient(to bottom left, red, green, red);
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100% 100%;
        }

        input {
            border-radius: 5px;
            width: 30%
        }

        .submit-button {
            /* via box shadow, added 3D-like effect */
            color: black;
            background-color: white;
            padding: 5px;
            padding-left: 20px;
            padding-right: 20px;
            border-radius: 5px;
            transition-duration: 0.4s;
            cursor: pointer;
            box-shadow: 0 5px #999;
        }

        .submit-button:hover {
            /* change colour when hovered */
            color: black;
            background-color: skyblue;
        }

        .submit-button:active {
            /* animate 3D effect when clicked, plus change colour for further visual feedback */
            color: black;
            background-color: rgb(100, 150, 180);
            box-shadow: 0 1px #666;
            transform: translateY(4px);
        }

        .form-group label {
            /* affects the label text, but not the input text itself */
            color: white
        }
    </style>
</head>
<!-- compensate for navbar and footer -->
<br><br>
<body style="font-family: 'Arial'">
    <div class="content-container">
        <div class="yellow-border-box">
            <h1 style="font-size: 36px"><b>Log In</b></h1>
            <h3><u>Hurry!</u> Log in by <b><?php echo date("d/m/Y", strtotime("+1 week")); ?></b> to claim 50 free Roulette spins!</h3>

            <?php if ($registered) { ?>
                <!-- if the user was referred from the registration page, then say they succeeded and tell them to log in -->
                <p>Registration successful. Please log in.</p>
            <?php } ?>

            <?php if ($error !== "") { ?>
                <!-- if user runs into an error, echo it -->
                <p><?php echo $error; ?></p>
            <?php } ?>

            <form method="POST" action="index.php">
                <div style="font-size: 18px;" class="form-group">
                    <label>Username:</label><br>
                    <!-- inputs can use some styling, basic as-is -->
                    <input type="text" name="username" placeholder=" John Doe" required>
                </div>
                <div style="font-size: 18px;" class="form-group">
                    <label>Email Address:</label><br>
                    <input type="email" name="email" placeholder=" JohnDoe@email.com" required>
                </div>
                <div style="font-size: 18px;" class="form-group">
                    <label>Password:</label><br>
                    <input type="password" name="password" required>
                </div>
                <div class="form-group">
                    <button type="submit" name="login" class="submit-button">Log in</button>
                </div>
            </form>

            <p>No account yet? <a style="display: inline-block" href="/addictive-app-project/customer/register/index.php">Register here</a>.</p>
        </div>
    </div>
    <br><br><br><br>
    <?php
        require_once '../../components/footer.php';
    ?>
</body>
</html>