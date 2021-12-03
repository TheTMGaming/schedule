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
        <span class="title">Authorization</span>
        <form class="form" action="vendor/user/sign_in.php" method="post">
            <?php require_once "sources/error.php"; ?>
            <label>Login/email</label>
            <input type="text" name="identifier" placeholder="Input login or email" required>
            <label>Password</label>
            <input type="password" name="password" placeholder="Input password" required>
            <button class="button button-submit" type="submit">Sign in</button>
            <span>
                    Haven't you got an account? - <a href="registration.php">Register</a>!
            </span>
        </form>
    </div>
</body>
</html>