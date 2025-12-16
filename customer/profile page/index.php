<!-- profile dashboard) -->

<?php
session_start();

// TEMP session data (replace with real login data later)
// Session Data = Data like a form but entered as games etc
$_SESSION['username'] ??= 'FestiveElf';
$_SESSION['email'] ??= 'elf@santascasino.com';
$_SESSION['credits'] ??= 500;
$_SESSION['games_played'] ??= 42;
$_SESSION['biggest_win'] ??= 250;
?>

<?php include('../components/navbar.php'); ?>

<main class="profile-container">
    <section class="profile-header">
        <h1>🎄 Welcome back, <?php echo $_SESSION['username']; ?>!</h1>
        <p>Ho Ho Ho! Ready for more festive fun?</p>
    </section>

    <section class="profile-cards">
        <div class="profile-card">
            <h3>💰 Credits</h3>
            <p>$<?php echo $_SESSION['credits']; ?></p>
        </div>
        <div class="profile-card">
            <h3>🎮 Games Played</h3>
            <p><?php echo $_SESSION['games_played']; ?></p>
        </div>
        <div class="profile-card">
            <h3>🏆 Biggest Win</h3>
            <p>$<?php echo $_SESSION['biggest_win']; ?></p>
        </div>
    </section>

    <section class="profile-form">
        <h2>🎁 Update Your Details</h2>
        <form method="post">
            <label>Username</label>
            <input type="text" name="username" value="<?php echo $_SESSION['username']; ?>">

            <label>Email</label>
            <input type="email" name="email" value="<?php echo $_SESSION['email']; ?>">

            <button type="submit">Save Changes 🎄</button>
        </form>
    </section>
</main>

<?php include('../components/footer.php'); ?>
