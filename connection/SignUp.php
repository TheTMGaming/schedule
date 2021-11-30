<?php
session_start();

require_once 'queries/UserByLoginSelecting.php';
require_once 'queries/UserByEmailSelecting.php';
require_once 'queries/UserInserting.php';
require_once 'Connection.php';

function IsExistUserByQuery(Connection $connection, IQuery $query) : bool
{
    $info = $connection->Execute($query);

    return count($info) > 0;
}

function ErrorHandle(string $message)
{
    $_SESSION['error_message'] = $message;
    header("Location: ../registration.php");
    die();
}

$login = $_POST['login'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_confirm = $_POST['password_confirm'];

if ($password !== $password_confirm)
    ErrorHandle("Password was not confirmed");

$connection = new Connection();

if (IsExistUserByQuery($connection, new UserByLoginSelecting($login)))
    ErrorHandle("Login \"$login\" already exists!");

if (IsExistUserByQuery($connection, new UserByEmailSelecting($email)))
    ErrorHandle("Email \"$email\" is already reserved!");

$connection->Execute(new UserInserting($login, $email, $password));

header("Location: ../login.php");
