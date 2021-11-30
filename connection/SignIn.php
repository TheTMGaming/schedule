<?php
    session_start();

    require_once 'Connection.php';
    require_once 'queries/UserSelecting.php';

    $identifier = $_POST['identifier'];
    $password = $_POST['password'];

    $connection = new Connection();

    $info = $connection->Execute(new UserSelecting($identifier, $password));
    if (count($info) == 0)
    {
        $_SESSION['error_message'] = "Invalid login/email or password";
        header("Location: ../login.php");
        die();
    }

    //$_SESSION['user_id'] = $info['id'];
