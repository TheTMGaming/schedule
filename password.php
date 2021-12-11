<!doctype html>
<html lang="en">
<?php require_once "sources/head.php"; ?>
<body>
    <?php require_once "sources/header.php"; ?>
    <div class="wrapper">
        <span class="title">Update password</span>
        <form class="form" action="vendor/user/update.php" method="post">
            <?php require_once "sources/info_messages.php"; ?>
            <label>Old password</label>
            <div>
                <input class="password" type="password" name="old_password" placeholder="Input old password" required>
                <button class="toggle-password" type="button">
                    <img class="eye" src="images/closed_eye.png">
                </button>
            </div>
            <label>New password</label>
            <div>
                <input class="password" type="password" name="new_password" placeholder="Input new password" required>
                <button class="toggle-password" type="button">
                    <img class="eye" src="images/closed_eye.png">
                </button>
            </div>
            <label>Password confirmation</label>
            <div>
                <input class="password" type="password" name="password_confirm" placeholder="Confirm new password" required>
                <button class="toggle-password" type="button">
                    <img class="eye" src="images/closed_eye.png">
                </button>
            </div>
            <input type="hidden" name="method" value="password">
            <button class="button button-submit" type="submit">Update</button>
        </form>
    </div>
    <script src="sources/password_visibility.js"></script>
</body>
</html>