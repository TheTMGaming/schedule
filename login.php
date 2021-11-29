<!doctype html>
<html lang="en">
<?php require_once "src/head.php"; ?>
<body>
<?php require_once "src/header.php"; ?>
<div class="wrapper">
    <span class="title">Authorization</span>
    <form class="register-form" action="" method="post">
        <label>Login/email</label>
        <input type="text" name="login" placeholder="Input login or email" required>
        <label>Password</label>
        <input type="password" name="password" placeholder="Input password" required>
        <button class="button" type="submit">Sign in</button>
        <span>
                Haven't you got an account? - <a href="register.php">Register</a>!
        </span>
    </form>
</div>

</body>
</html>