<?php
    session_start();

    if (!isset($_SESSION['user']))
    {
        header("Location: index.php");
        die();
    }

    $user = $_SESSION['user'];
?>

<!doctype html>
<html lang="en">
<?php require_once "sources/head.php"; ?>
<body>
    <?php require_once "sources/header.php"; ?>
    <div class="wrapper">
        <span class="title">Profile</span>
        <main class="profile-content">
            <?php require_once 'sources/info_messages.php'?>
            <div class="profile">
                <div class="profile-info">
                    <div class="data">
                        <label>Login: </label>
                        <span class="profile-data"><?=$user['login']?></span>
                    </div>
                    <div class="data">
                        <label>Email: </label>
                        <span class="profile-data"><?=$user['email']?></span>
                    </div>
                </div>
                <div class="buttons">
                    <a href="identifiers.php"><button type="button" class="button button-view">Update login/email</button></a>
                    <a href="password.php"><button type="button" class="button button-view">Update password</button></a>
                    <form action="vendor/user/remove_account.php" method="post">
                        <button onclick="return confirm('Are you sure? All your events will be deleted!')" class="button button-view">Remove profile</button>
                    </form>
                </div>
            </div>
        </main>
    </div>
</body>
</html>