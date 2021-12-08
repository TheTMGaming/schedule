<?php
    session_start();

    require_once 'vendor/connection/Connection.php';
    require_once 'vendor/connection/queries/EventsSelecting.php';

    if (!isset($_SESSION['user']))
    {
        header("Location: authorization.php");
        die();
    }

    $connection = new Connection();
    $events = $connection->Execute(new EventsSelecting($_SESSION['user']['id']));
?>

<!doctype html>
<html lang="en">

<?php
require_once "sources/head.php";
require_once "sources/header.php";
?>

<body>
<span class="title">Your Events</span>
<div class="wrapper">

    <div class="events-list">
        <div class="button-add-wrapper">
            <a href="new_event.php">
                <button class="button button-add">New</button>
            </a>
        </div>
        <?php foreach ($events as $event):?>
            <?php $date = getdate(strtotime($event['date'])); ?>
            <div class="event">
                <div class="date">
                    <div class="day">
                        <span class="day-text">
                            <?=str_pad($date['mday'], 2, 0, STR_PAD_LEFT)?>
                        </span>
                    </div>
                    <div class="month-time">
                        <span class="month-text"><?=$date['month']?></span>
                        <span class="date-text"><?=$date['year']?></span>
                    </div>
                </div>
                <div class="info-event">
                    <span class="title-text"><?=$event['title']?></span>
                </div>
                <div class="buttons">
                    <form action="edit.php" method="post">
                        <input type="hidden" value="<?=$event['id']?>" name="id">
                        <button class="button button-view">Edit</button>
                    </form>
                    <form action="vendor/event/remove.php" method="post">
                        <input type="hidden" value="<?= $event['id']?>" name="id">
                        <button onclick="return confirm('Are you sure?')" class="button button-view">Remove</button>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</body>
</html>
