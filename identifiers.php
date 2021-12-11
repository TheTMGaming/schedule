<?php
    session_start();

    if (!isset($_SESSION['user']))
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
        <span class="title">Update login/email</span>
        <form class="form" action="vendor/user/update.php" method="post">
            <?php require_once "sources/info_messages.php"; ?>
            <label>Login</label>
            <input type="text" name="login" placeholder="Input login" value="<?=$_SESSION['user']['login']?>" required>
            <label>Email</label>
            <input type="email" name="email" placeholder="Input email" value="<?=$_SESSION['user']['email']?>" required>
            <label>Password confirmation</label>
            <div>
                <input class="password" type="password" name="password_confirm" placeholder="Input password" required>
                <button class="toggle-password" type="button">
                    <img class="eye" src="images/closed_eye.png">
                </button>
            </div>
            <input type="hidden" name="method" value="identifiers">
            <button class="button button-submit" type="submit">Update</button>
        </form>
    </div>
    <script src="sources/password_visibility.js"></script>
</body>
</html>