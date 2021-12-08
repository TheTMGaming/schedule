<?php
    session_start();

    if (isset($_SESSION['user']))
    {
        header("Location: personal_events.php");
        die();
    }
?>

<!doctype html>
<html lang="en">
<?php require_once "sources/head.php"; ?>
<body>
    <?php require_once "sources/header.php"; ?>
    <div class="wrapper">
        <span class="title">Registration</span>
        <form class="form" action="vendor/user/sign_up.php" method="post">
            <?php require_once "sources/info_messages.php"; ?>
            <label>Login</label>
            <input type="text" name="login" placeholder="Input login" required>
            <label>Email</label>
            <input type="email" name="email" placeholder="Input email" required>
            <label>Password</label>
            <div>
                <input class="password" type="password" name="password" placeholder="Input password" required>
                <button class="toggle-password" type="button">
                    <img class="eye" src="images/closed_eye.png">
                </button>
            </div>
            <label>Password confirmation</label>
            <div>
                <input class="password" type="password" name="password_confirm" placeholder="Confirm password" required>
                <button class="toggle-password" type="button">
                    <img class="eye" src="images/closed_eye.png">
                </button>
            </div>
            <button class="button button-submit" type="submit">Sign up</button>
            <span>
                Have you got an account? - <a href="authorization.php">Log in</a>!
            </span>
        </form>
    </div>
    <script src="sources/password_visibility.js"></script>
</body>
</html>