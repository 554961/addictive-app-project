<?php
/**
 * Customer Profile Page
 * Displays and updates user profile information
 */

session_start();

/* ----------------------------------
   TEMP SESSION DATA
   (Replace with real login data later)
----------------------------------- */
$_SESSION['username'] ??= 'FestiveElf';
$_SESSION['email'] ??= 'elf@santascasino.com';
$_SESSION['credits'] ??= 500;
$_SESSION['games_played'] ??= 42;
$_SESSION['biggest_win'] ??= 250;

/* ----------------------------------
   HANDLE PROFILE UPDATE FORM
----------------------------------- */
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $_SESSION['username'] = htmlspecialchars($_POST['username']);
    $_SESSION['email'] = htmlspecialchars($_POST['email']);
}
?>

<?php include('../components/navbar.php'); ?>

<main class="profile-container">

    <!-- PROFILE HEADER -->
    <section class="profile-header">
        <h1>🎄 Welcome, <?php echo $_SESSION['username']; ?>!</h1>
        <p>Loading festive greeting...</p>
    </section>

    <!-- PROFILE STATS -->
    <section class="profile-cards">

        <div class="profile-card">
            <h3>💰 Credits</h3>
            <p class="stat-number" data-value="<?php echo $_SESSION['credits']; ?>">0</p>
        </div>

        <div class="profile-card">
            <h3>🎮 Games Played</h3>
            <p class="stat-number" data-value="<?php echo $_SESSION['games_played']; ?>">0</p>
        </div>

        <div class="profile-card">
            <h3>🏆 Biggest Win</h3>
            <p class="stat-number" data-value="<?php echo $_SESSION['biggest_win']; ?>">0</p>
        </div>

    </section>

    <!-- UPDATE PROFILE FORM -->
    <section class="profile-form">
        <h2>🎁 Update Your Profile</h2>

        <form method="post">
            <label>Username</label>
            <input type="text" name="username"
                   value="<?php echo $_SESSION['username']; ?>">

            <label>Email</label>
            <input type="email" name="email"
                   value="<?php echo $_SESSION['email']; ?>">

            <button type="submit">Save Changes 🎄</button>
        </form>
    </section>

</main>

<!-- PROFILE PAGE SCRIPT -->
<script src="../scripts/profile.js"></script>

<?php include('../components/footer.php'); ?>
