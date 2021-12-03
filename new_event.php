<?php
    session_start();

    if (!isset($_SESSION['user']))
    {
        header("Location: login.php");
        die();
    }
?>

<!doctype html>
<html lang="en">
<?php require_once "src/head.php"; ?>
<body>
<?php require_once "src/header.php"; ?>
<div class="wrapper">
    <span class="title">New Event</span>
    <form class="form" action="connection/add.php" method="post">
        <?php require_once "src/error.php"; ?>
        <label>Title</label>
        <input type="text" name="title">
        <label>Day</label>
        <select class="days" name="day"></select>
        <label>Month</label>
        <select class="months" name="month">
            <option selected>January</option>
            <option>February</option>
            <option>March</option>
            <option>April</option>
            <option>May</option>
            <option>June</option>
            <option>July</option>
            <option>August</option>
            <option>September</option>
            <option>October</option>
            <option>November</option>
            <option>December</option>
        </select>
        <label>Year</label>
        <select class="years" name="year"></select>
        <button class="button button-submit" type="submit">Create</button>
    </form>
</div>
    <script src="src/script.js"></script>
    <script>setDateNow()</script>
</body>
</html>