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
<?php require_once "src/head.php"; ?>
<body>
    <?php require_once "src/header.php"; ?>
    <div class="wrapper">
        <span class="title">Profile</span>
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
            <form action="connection/remove_account.php" method="post">
                <button onclick="return confirm('Are you sure?')" class="button button-view">Remove profile</button>
            </form>
        </div>
    </div>
</body>
</html>