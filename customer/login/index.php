<?php
    // someone deleted the navbar and config files; waiting for a fix. for now, commented
    include __DIR__ . '/../../database_code/config.php';
    include __DIR__ . '/../../components/navbar.php'; 
    session_start();
    $registered = false; // test var - replace with own logic
    $error = ''; // test var - replace with own logic

    // no functionality yet
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Login</title>
    <!-- <link rel="stylesheet" href="../../styles/styles.css"> -->
    <!-- stylesheet ruins the page as is. doesn't need to be complicated, as it's a login page, it'll be ok -->
    <style>
        body { /* this is for the gradient background, but can be changed to fit another element */
            /* tone down the colour brightness here to give more attention to the brighter elements */
            background-image: linear-gradient(to bottom left, rgb(0, 70, 0), rgb(120, 0, 0));
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100% 100%;
        }

        h1, h3, p {
            color: white;
        }
        
        .content-container { /* has everything on the page excluding navbar and footer. those can be edited in their respective files ofc... */
            margin-left: 15%;
            margin-right: 15%;
            z-index: 2;
        }

        .yellow-border-box { /* general content container, but for sections rather than the whole page */
            border: 2px solid yellow;
            border-radius: 10px;
            /* to not conflict stuff with the border, put padding as seen below */
            padding-left: 10%;
            padding-right: 5%;
            /* brighten up colours to attract attention. previous colours are literally just darker versions of default grn/red */
            background-image: linear-gradient(to bottom left, red, green, red);
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100% 100%;
        }

        input {
            background-color: skyblue;
            border-radius: 5px;
        }

        .submit-button {
            background-color: skyblue;
            padding: 5px;
            border: groove;
            border-radius: 5px;
            transition-duration: 0.4s;
            cursor: pointer;
            box-shadow: 0 5px #999;
        }

        .submit-button:hover {
            color: black;
            background-color: white;
        }

        .submit-button:active {
            color: black;
            background-color: ;
            box-shadow: 0 1px #666;
            transform: translateY(4px);
        }
        
        footer { /* not sure why but end points are visible on the footer. do not touch these values, and leave this on this page only */
            margin-left: -9px;
            margin-right: -4px;
        }
    </style>
</head>
<br><br>
<body style="font-family: 'Arial'">
    <div class="snow">
    <div class="content-container">
        <div class="yellow-border-box">
            <h1 style="font-size: 36px">Log In</h1>
            <h3>Hurry! Log in by <?php echo date("d/m/Y", strtotime("+1 week")); ?> to claim 50 free Roulette spins!</h3>

            <?php if ($registered) { ?>
                <!-- if the user was referred from the registration page, then say they succeeded and tell them to log in -->
                <p>Registration successful. Please log in.</p>
            <?php } ?>

            <?php if ($error !== "") { ?>
                <!-- if user runs into an error, echo it. add error implementation at the top php -->
                <p><?php echo $error; ?></p>
            <?php } ?>

            <form method="post" action="login.php">
                <p style="font-size: 18px;">
                    <label>Username:</label><br>
                    <!-- inputs can use some styling, basic as-is -->
                    <input type="text" name="username" required>
                </p>
                <p style="font-size: 18px;">
                    <label>Password:</label><br>
                    <input type="password" name="password" required>
                </p>
                <p style="font-size: 18px;">
                    <label>Email Address:</label><br>
                    <input type="email" name="email" required>
                </p>
                <p>
                    <button type="submit" name="login" class="submit-button">Log in</button>
                </p>
            </form>

            <p>No account yet? <a style="display: inline-block" href="<?php __DIR__ . '/../../customer/register/index.php'?>">Register here</a>.</p>
        </div>
    </div>
    </div>
    <footer>
        <br><br><br>
        <?php
            include __DIR__ . '/../../components/footer.php';
        ?>
    </footer>
</body>
</html>