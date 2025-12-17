<?php
    require_once '../../database_code/config.php';
    require_once '../../components/navbar.php';

    // bug with this; it doesn't know what "loggedIn" means until the error appears
    // other than this, all of this php works fine
    // though this is an issue with the navbar too
    if ($_SESSION["loggedIn"]) {
        // user is already signed in; does not need to visit log in page
        header("location: ../../index.php");
        // if you're a dev wondering why you get booted back to the index page every time;
        // DELETE YOUR COOKIES then refresh
    }

    // instantiate error var for later
    $error = '';

    // was user sent here from register page?
    $registered = isset($_GET['registered']);
    
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];
    
        // there's probably a much easier way to do this but i don't know it and it works
        $passwordQry = "SELECT password_hash FROM users WHERE username = '$username'";
        // in the below 2 lines we're looking for if the entered username and email match any profile
        $usernameQry = "SELECT username FROM users WHERE username = '$username'";
        $emailQry = "SELECT email FROM users WHERE username = '$username'";
        // and because it works, it shouldn't be touched until we guarantee another way...
    
        $result = mysqli_query($connection, $usernameQry);
        // if the inputted username matches an entry...
        if ($result && mysqli_num_rows($result) === 1) {
            $result = mysqli_query($connection, $emailQry); // not sure why, but this line prevents an error from appearing
            // it doesn't affect processing i don't think, but keep it cuz it improves UX
            $row = mysqli_fetch_assoc($result);
            // ...AND if the inputted email matches the same entry and the inputted username...
            if ($row['email'] == $email) {
                $result = mysqli_query($connection, $passwordQry);
                $row = mysqli_fetch_assoc($result);
                
                // then check both forms of password
                // if password isn't hashed
                if ($row["password_hash"] == $password)
                {
                    // correct password
                    echo "Correct password; redirecting...";
                    session_start();
            
                    $_SESSION["loggedIn"] = true;
                    $_SESSION["username"] = $username;
                    header("location: ../../index.php?loggedIn=SUCCESS");
                } 
                else $error = "Incorrect password.";
                        
                
                // otherwise, check for hashed version
                if (password_verify($password, $row["password_hash"]))
                {
                    // correct hashed password
                    echo "Correct password; redirecting...";
                    $_SESSION["loggedIn"] = true;
                    $_SESSION["username"] = $username;
                    header("location: ../../index.php?loggedIn=SUCCESS");
                }
                // below errors appear just below the "hurry" line of text after the user attempts a sign-in
                else $error = "Incorrect password.";
            } else {
                $error = "Incorrect email address.";
            }
        } else {
            $error = "Incorrect username.";
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
    <!-- this one is fine though -->
    <style>
        /* if needed can implement this into styles.css but the stylesheet messes with a lot of content on this page, take caution */
        body { /* this is for the gradient background, but can be changed to fit another element */
            /* toned down the colour brightness here to give more attention to the brighter elements */
            background-image: linear-gradient(to bottom left, rgb(120, 0, 0), rgb(0, 70, 0), rgb(120, 0, 0));
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100% 100%;
        }

        h1, h3, p, div {
            color: white;
        }

        button {
            /* literally just for the login button on the navbar */
            color: black;
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
            /* affects the input text only */
            border-radius: 5px;
            width: 30%;
            padding-left: 8px;
            color: black
        }
        
        .form-group label {
            /* affects the label text, but not the input text itself */
            color: white
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

    </style>
</head>
<!-- compensate for navbar and footer -->
<br><br>
<body style="font-family: Arial, sans-serif">
    <div class="content-container">
        <div class="yellow-border-box">
            <h1 style="font-size: 36px"><b>Log In</b></h1>
            <h3><u>Hurry!</u> Log in by <b><?php echo date("d/m/Y", strtotime("+1 week")); ?></b> to claim 50 free gallons of milk!</h3>

            <?php if ($registered) { ?>
                <!-- if the user was referred from the registration page, then say they succeeded and tell them to log in -->
                <p>Registration successful. Please log in.</p>
            <?php } ?>

            <?php if ($error !== "") { ?>
                <!-- if user runs into an error, echo it -->
                <p style="color: rgb(255, 136, 136); font-size: 20px">ERROR: <?php echo $error; ?></p>
            <?php } ?>

            <form method="POST" action="index.php">
                <div style="font-size: 18px;" class="form-group">
                    <label>Username:</label><br>
                    <!-- inputs can use some styling, basic as-is -->
                    <input type="text" name="username" placeholder="John Doe" required>
                </div>
                <div style="font-size: 18px;" class="form-group">
                    <label>Email Address:</label><br>
                    <input type="email" name="email" placeholder="JohnDoe@email.com" required>
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