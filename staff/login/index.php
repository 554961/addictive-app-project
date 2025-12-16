<?php
//link config
require_once '../../database_code/config.php';
// link nav
require_once '../../components/navbar.php';

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $username = $_POST["username"];
    $password = $_POST["password"];

    $qry = "SELECT password_hash FROM staff WHERE username = '$username'";

    $result = mysqli_query($connection, $qry);

    $row = mysqli_fetch_assoc($result);

    // if password has no hash
    if ($row["password_hash"] == $password)
    {
        echo "password correct"; 
        session_start();

        $_SESSION["loggedIn"] = true;
        $_SESSION["username"] = $username;
        header("location: ../../index.php?loggedIn=SUCCESS");
    } 
    else echo "password wrong";
            
    
    //check hash
    if (password_verify($password, $row["password_hash"]))
    {
        echo "hash Password is correct";
        $_SESSION["loggedIn"] = true;
        $_SESSION["username"] = $username;
        header("location: ../../index.php?loggedIn=SUCCESS");
    }
    else echo " or hash password wrong";

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Login</title>
    <!-- Bootstrap link css cdn -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css"
     integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
    <h1 class="alert-info" style="text-align:center">Staff Login</h1>
    <form action="index.php" method="POST">
        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" class="form-control">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="text" name="password" class="form-control">
        </div>
        <div class="form-group">
            <button type="submit">Login</button>
        </div>
    </form>
</body>
<?php  
    require_once '../../components/footer.php';
?>
</html>
