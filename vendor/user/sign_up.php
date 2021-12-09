<?php

    session_start();

    require_once '../connection/Connection.php';
    require_once '../connection/queries/UserInserting.php';
    require_once '../connection/queries/LoginSelecting.php';
    require_once '../connection/queries/EmailSelecting.php';

    function TryCatchError($predicate, $message)
    {
        if (!$predicate)
            return;

        $_SESSION['error_message'] = $message;

        header('Location: ../../registration.php');
        die();
    }

    $login = $_POST['login'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];

    TryCatchError($password !== $password_confirm, 'Password was not confirmed');

    $connection = new Connection();

    TryCatchError(count($connection->Execute(new LoginSelecting($login))) > 0,
        'Login already exists');
    TryCatchError(count($connection->Execute(new EmailSelecting($email))) > 0,
        'Email already exists');

    $connection->Execute(new UserInserting(
        $login, $email, password_hash($password, PASSWORD_BCRYPT)));

    $_SESSION['success_message'] = 'You have successfully registered';
    header('Location: ../../authorization.php');

