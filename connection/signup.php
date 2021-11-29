<?php
session_start();

require_once 'queries/UserByLoginSelecting.php';
require_once 'queries/UserByEmailSelecting.php';
require_once 'queries/UserInserting.php';
require_once 'Database.php';
require_once 'User.php';

function IsExistUserByQuery(Database $connection, IQuery $query) : bool
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

$database = new Database();
$database->Connect();

if (IsExistUserByQuery($database, new UserByLoginSelecting($login)))
    ErrorHandle("Login \"$login\" already exists!");

if (IsExistUserByQuery($database, new UserByEmailSelecting($email)))
    ErrorHandle("Email \"$email\" is already reserved!");

$user = new User($login, $email, $password);
$database->Execute(new UserInserting($user));

$database->Disconnect();

header("Location: ../login.php");
