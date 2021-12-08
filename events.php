<?php
    require_once 'vendor/connection/Connection.php';
    require_once 'vendor/connection/queries/EventsSelecting.php';

    $connection = new Connection();
    $events = $connection->Execute(new EventsSelecting());
?>

<!doctype html>
<html lang="en">

<?php
    require_once "sources/head.php";
    require_once "sources/header.php";
?>

<body>
    <span class="title">Events</span>
    <div class="wrapper">
        <div class="events-list">
            <?php foreach ($events as $event):?>
                <?php $date = getdate(strtotime($event['date'])); ?>
                <div class="event">
                    <div class="date">
                        <div class="day">
                            <span class="day-text"><?=str_pad($date['mday'], 2, 0, STR_PAD_LEFT)?></span>
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
                        <button class="button button-view">View more</button>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>
