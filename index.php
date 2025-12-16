<?php

// link config files && link page templates
require_once 'database_code/config.php';
require_once 'components/navbar.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title> Welcome - Santa's Casino </title>
</head>

<body style="
    margin:0;
    font-family: Arial, sans-serif;
    background: linear-gradient(#1b3b1b, #0f2410);
    color:white;
">

<!-- header -->
<div style="
    background:#7a1c0f;
    padding:15px 30px;
    display:flex;
    justify-content:space-between;
    align-items:center;
">
    <div style="font-weight:bold;">🎅 SANTA'S CASINO</div>
    <div>
        <button style="margin-right:10px;">Login</button>
        <button style="background:#2ecc71;color:#000;">Free Bonus</button>
    </div>
</div>

<!-- hero stuff -->
<div style="
    margin:30px;
    padding:30px;
    background:linear-gradient(90deg,#1f6f3f,#7a1c0f);
    border-radius:12px;
">
    <h2>Welcome Bonus: $500</h2>
    <button style="
        padding:10px 20px;
        background:#2ecc71;
        border:none;
        border-radius:6px;
        font-weight:bold;
    ">
        Claim Your Holiday Bonus
    </button>
</div>

<!-- player stats -->
<div style="
    display:flex;
    gap:20px;
    margin:30px;
">
    <div style="flex:1;padding:15px;background:#2b4f2b;border-radius:10px;">
        👥 2,847<br><small>Active Players</small>
    </div>
    <div style="flex:1;padding:15px;background:#2b4f2b;border-radius:10px;">
        💰 $1.2M<br><small>Holiday Jackpot</small>
    </div>
    <div style="flex:1;padding:15px;background:#2b4f2b;border-radius:10px;">
        🎮 15,392<br><small>Games Today</small>
    </div>
    <div style="flex:1;padding:15px;background:#2b4f2b;border-radius:10px;">
        🏆 $45,000<br><small>Biggest Win</small>
    </div>
</div>

<!-- mini games -->
<div style="
    display:flex;
    gap:20px;
    margin:30px;
">

    <!-- Slots -->
    <div style="
        flex:1;
        background:#204020;
        padding:20px;
        border-radius:12px;
        text-align:center;
    ">
        <h3>🎰 Santa's Slots</h3>
        <div style="font-size:40px;">🎄 🎅 ❄️</div>
        <button style="margin-top:15px;">1 Spin ($10)</button>
    </div>

    <!-- Roulette -->
    <div style="
        flex:1;
        background:#5a1e14;
        padding:20px;
        border-radius:12px;
        text-align:center;
    ">
        <h3>🎡 Holiday Roulette</h3>
        <div style="
            margin:20px auto;
            width:120px;
            height:120px;
            border-radius:50%;
            background:#f1c40f;
        "></div>
        <button>Spin</button>
    </div>

    <!-- Blackjack -->
    <div style="
        flex:1;
        background:#204020;
        padding:20px;
        border-radius:12px;
        text-align:center;
    ">
        <h3>🃏 Christmas 21</h3>
        <button>Deal ($25)</button>
    </div>

</div>
<!-- Include footer here -->
<?php require_once 'components/footer.php'; ?>

</body>
</html>