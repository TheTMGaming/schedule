<?php
    session_start();

    require_once 'connection/Connection.php';
    require_once 'connection/queries/EventSelecting.php';

    if (!isset($_SESSION['user']))
    {
        header("Location: login.php");
        die();
    }

    $connection = new Connection();

    $event = $connection->Execute(new EventSelecting($_GET['id']))[0];
    $date = getdate(strtotime($event['date']));
?>

<!doctype html>
<html lang="en">
<?php require_once "src/head.php"; ?>
<body>
<?php require_once "src/header.php"; ?>
<div class="wrapper">
    <span class="title">Edit Event</span>
    <form class="form" action="connection/update_event.php" method="post">
        <?php require_once "src/error.php"; ?>
        <input type="hidden" value="<?=$event['id']?>" name="id">
        <label>Title</label>
        <input type="text" name="title" value="<?=$event['title']?>">
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
        <button class="button button-submit" type="submit" onclick="return confirm('Are you sure?')">Save</button>
    </form>
</div>
    <script src="src/script.js"></script>
    <script>setDate(<?=$date['mday']?>, <?=$date['mon']?>, <?=$date['year']?>)</script>
</body>
</html>