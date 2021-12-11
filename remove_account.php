<?php

    session_start();

?>

<!doctype html>
<html lang="en">
<?php require_once "sources/head.php"; ?>
<body>
    <?php require_once "sources/header.php"; ?>
    <div class="wrapper">
        <span class="title">Remove profile</span>
        <form class="form" action="vendor/user/remove.php" method="post">
            <?php require_once "sources/info_messages.php"; ?>
            <label>Password confirmation</label>
            <div>
                <input class="password" type="password" name="password_confirm" placeholder="Confirm password" required>
                <button class="toggle-password" type="button">
                    <img class="eye" src="images/closed_eye.png">
                </button>
            </div>
            <button class="button button-submit" type="submit">Remove</button>
        </form>
    </div>
    <script src="sources/password_visibility.js"></script>
</body>
</html>
