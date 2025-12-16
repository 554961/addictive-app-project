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

        .nav-left, .nav-right { display: flex; align-items: center; }
        .nav-left a, .nav-right a { margin-right: 12px; }

        .button {
            background-color: rgba(53, 196, 53, 1);
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 15px;
            border-radius: 6px;
            cursor: pointer;
        }

        .nav-button{
            margin-right: 0;
        }

        .button:active {
            background-color:rgba(62, 182, 78, 1);
            box-shadow: 0 5px rgba(62, 182, 78, 1);
            transform: translateY(4px);
        }

        /* Make nav links look good on small screens */
        @media (max-width:800px){
            .nav-left a, .nav-right a { margin-right: 8px; }
            .button { padding: 8px 12px; font-size: 13px; }
        }
    </style>
</head>

<body>
    <nav class="navbar">
        <div class="nav-left">
            <a href="/addictive-app-project/index.php" class="button">Home</a>
            <a href="/addictive-app-project/pages/contact_us.php" class="button">Contact</a>
            <a href="/addictive-app-project/pages/privacy_policy.php" class="button">Privacy</a>
            <a href="/addictive-app-project/pages/cookies_policy.php" class="button">Cookies</a>
            <a href="/addictive-app-project/pages/ToS.php" class="button">ToS</a>
        </div>

        <div class="nav-right">
            <!-- Minigames quick links -->
            <a href="/addictive-app-project/minigames/Blackjack/index.php" class="button">Blackjack</a>
            <a href="/addictive-app-project/minigames/Mines/index.php" class="button">Mines</a>
            <a href="/addictive-app-project/minigames/Plinko/index.php" class="button">Plinko</a>
            <a href="/addictive-app-project/minigames/Reindeer%20Racing/index.php" class="button">Reindeer Racing</a>
            <a href="/addictive-app-project/minigames/Roulette/index.php" class="button">Roulette</a>
            <a href="/addictive-app-project/minigames/Slot%20machine/index.php" class="button">Slot Machine</a>

            <!-- User actions -->
            <a href="/addictive-app-project/customer/register/index.php" class="button">Sign up</a>
            <a href="/addictive-app-project/customer/login/index.php" class="button">Log in</a>
            <a href="/addictive-app-project/staff/login/index.php" class="button">Staff</a>
        </div>
        
    </nav>
</body>
</html>
