<?php
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: contact_us.php");
    exit;
}

// Sanitize input
$name    = htmlspecialchars(trim($_POST["name"]));
$email   = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
$subject = htmlspecialchars(trim($_POST["subject"]));
$message = htmlspecialchars(trim($_POST["message"]));

// Validate
if (!$name || !$email || !$subject || !$message) {
    die("Please fill in all fields.");
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Invalid email address.");
}

// Email setup
$to = "552472@escg.ac.uk"; // 🔴 CHANGE THIS
$emailSubject = "Santa’s Casino Contact: $subject";

$emailBody = "
New contact message 🎅

Name: $name
Email: $email
Subject: $subject

Message:
$message
";

$headers  = "From: Santa’s Casino <no-reply@santascasino.co.uk>\r\n";
$headers .= "Reply-To: $email\r\n";

// Send email
if (mail($to, $emailSubject, $emailBody, $headers)) {
    header("Location: contact_success.php");
    exit;
} else {
    echo "❌ Message failed to send. Please try again later.";
}
