<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <style>
    .navbar {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0 20px;
      height: 80px;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      background: linear-gradient(180deg, #993a3a, #991a1aff);
      box-shadow: 0 2px 5px rgba(192, 19, 19, 0.9);
      z-index: 1000;
    }

    .nav-actions {
      display: flex;
      gap: 20px;
      margin-right: 30px;
    }

    .button {
      background: linear-gradient(180deg, #20533b, #163b29);
      color: white;
      padding: 10px 22px;
      font-size: 15px;
      text-decoration: none;
      border-radius: 4px;
      transition: transform 0.1s ease, box-shadow 0.1s ease;
      box-shadow: 0 4px 0 #0e271b;
    }

    .button:active {
      transform: translateY(3px);
      box-shadow: 0 1px 0 #0e271b;
    }
  </style>
</head>

<body>
  <nav class="navbar">
    <div></div>

    <div class="nav-actions">
      <a href="#" class="button">Sign up</a>
      <a href="#" class="button">Log in</a>
    </div>
  </nav>
</body>
</html>
