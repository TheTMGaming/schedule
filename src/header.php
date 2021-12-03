<?php
    session_start();
?>

<header class="header">
    <div style="margin-right: auto; visibility: hidden; margin-left: 0" class="header-account">
        <?php if (isset($_SESSION['user'])): ?>
            <img src="../img/user.png">
            <span><?=$_SESSION['user']['login']?></span>
            <img src="../img/logout.png">
            <a class="header-button" href="#">Log out</a>
        <?php else: ?>
            <img src="../img/account.png">
            <a class="header-button" href="#">Sign in / Register</a>
        <?php endif; ?>
    </div>
    <nav class="header-menu">
        <a class="header-button" href="../events.php">Events</a>
        <?php if (isset($_SESSION['user'])): ?>
            <a class="header-button" href="../personal.php">Your Events</a>
        <?php endif; ?>
    </nav>
    <div class="header-account">
        <?php if (isset($_SESSION['user'])): ?>
            <img src="../img/user.png">
            <a class="header-button profile-button" href="../profile.php"><?=$_SESSION['user']['login']?></a>
            <img src="../img/logout.png">
            <a class="header-button" href="../connection/LogOut.php">Log out</a>
        <?php else: ?>
            <img src="../img/account.png">
            <a class="header-button" href="../login.php">Sign in / Register</a>
        <?php endif; ?>
    </div>
</header>