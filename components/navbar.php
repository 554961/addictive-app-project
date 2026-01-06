<?php
session_start();
?>

<div style="
    background:#7a1c0f;
    padding:15px 30px;
    display:flex;
    justify-content:space-between;
    align-items:center;
">
    <div style="font-weight:bold;">🎅 SANTA'S CASINO</div>
    <div>
        <?php
        // If not logged in, then display these buttons
        if (!isset($_SESSION["loggedIn"]) || !$_SESSION["loggedIn"]) {
        ?>
        <button style="margin-right:10px;">Login</button>
        <button style="background:#2ecc71;color:#000;">Free Bonus</button>
        <?php 
        // else display these
        } 
        // the user is logged in
        else { ?>
        <button style="margin-right:10px;">Welcome <strong><?php echo htmlspecialchars($_SESSION["username"]); ?> </strong></button>
        <button style="background:#2ecc71;color:#000;">Your Profile</button>
        <?php } ?>
    </div>
</div>