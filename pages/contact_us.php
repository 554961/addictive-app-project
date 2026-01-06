<?php
include '../components/navbar.php';
?>
<!DOCTYPE html>
<html lang="en-GB">
<head>
  <meta charset="UTF-8">
  <title>Contact Us | Santa’s Casino</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../styles/styles.css">
</head>

<body class="contact-page">

<!-- FIX: offset for fixed navbar -->
<div style="padding-top: 80px; min-height: calc(100vh - 80px); display: flex; flex-direction: column;">

  <div class="snow"></div>

  <div class="contact-wrapper" style="flex: 1;">

    <div class="header">
      <h1>🎅 Contact Santa’s Casino 🎄</h1>
      <p>Santa and his elves are here to help 24/7</p>
    </div>

    <div class="content">

      <div class="info">
        <h2>Get in Touch</h2>
        <p>Questions about your account, bonuses, or festive games?</p>
        <p><strong>Email:</strong> support@santascasino.co.uk</p>
        <p><strong>Live Chat:</strong> Available 24/7</p>

        <div class="note">
          <strong>🎄 Gamble Responsibly</strong><br>
          Santa’s Casino is for players aged 18+. Please gamble responsibly.
        </div>
      </div>

      <form action="contact_handler.php" method="post">
        <h2>Send Santa a Message</h2>

        <label>Full Name</label>
        <input type="text" name="name" required>

        <label>Email Address</label>
        <input type="email" name="email" required>

        <label>Subject</label>
        <input type="text" name="subject" required>

        <label>Message</label>
        <textarea name="message" required></textarea>

        <button type="submit">🎁 Send Message</button>
      </form>

    </div>

    <div class="footer">
      © 2025 <strong>Santa’s Casino</strong> | 18+ | Play responsibly
    </div>

  </div>

  <?php include '../components/footer.php'; ?>

</div>
</body>
</html>
