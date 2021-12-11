<?php

    session_start();

    require_once '../connection/Connection.php';
    require_once '../connection/queries/EmailSelecting.php';
    require_once '../connection/queries/LoginSelecting.php';
    require_once '../connection/queries/UserUpdating.php';

    function TryCatchError($predicate, $message, $location)
    {
        if (!$predicate)
            return;

        $_SESSION['error_message'] = $message;

        header('Location: ' . $location);
        die();
    }

    function UpdateProfile(string $login, string $email, string $password_confirm, array $user)
    {
        $location = '../../identifiers.php';

        TryCatchError(!password_verify($password_confirm, $user['password']),
            'Password was not confirmed', $location);


        $connection = new Connection();

        if ($login != $user['login'])
        {
            TryCatchError(count($connection->Execute(new LoginSelecting($login))) > 0,
                'Login already exists', $location);
        }

        if ($email != $user['email'])
        {
            TryCatchError(count($connection->Execute(new EmailSelecting($email))) > 0,
                'Email already exists', $location);
        }

        $connection->Execute(new UserUpdating($user['id'], $login, $email, $user['password']));

        $_SESSION['user']['login'] = $login;
        $_SESSION['user']['email'] = $email;
        $_SESSION['success_message'] = 'Profile was updated';

        header('Location: ../../profile.php');
    }

    function UpdatePassword(string $old_password, string $new_password, string $password_confirm,
        array $user)
    {
        $hash = password_hash($new_password, PASSWORD_BCRYPT);

        $location = '../../new_password.php';

        TryCatchError(!password_verify($old_password, $user['password']),
            'Old password was not confirmed', $location);

        TryCatchError($new_password !== $password_confirm,
            'New password was not confirmed', $location);

        $connection = new Connection();
        $connection->Execute(new UserUpdating($user['id'], $user['login'], $user['email'], $hash));

        $_SESSION['user']['password'] = $hash;
        $_SESSION['success_message'] = 'Password was updated';

        header('Location: ../../profile.php');
    }


    $user = $_SESSION['user'];
    switch ($_POST['method'])
    {
        case 'identifiers':
            UpdateProfile($_POST['login'], $_POST['email'], $_POST['password_confirm'], $user);
            break;

        case 'password':
            UpdatePassword($_POST['old_password'], $_POST['new_password'], $_POST['password_confirm'], $user);
            break;

        default:
            throw new Exception('Unknown method ' . $_POST['method']);
    }

