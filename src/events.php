<?php require_once "src/header.php"; ?>
<span class="events-title">Events</span>
<form class="events-sorter">
    <div class="point">
        <label>Event category</label>
        <select class="category parameter"></select>
    </div>
    <div class="point">
        <label>Sort by</label>
        <select class="sorted parameter"></select>
    </div>
    <div class="point">
        <label>Show</label>
        <input class="count parameter" type="number">
        <label class="small-label">events per page</label>
    </div>
    <div class="point">
        <input class="search parameter" type="search" placeholder="Search event...">
        <button type="submit">
            <img src="../img/search.png">
        </button>
    </div>
</form>

<div class="events-list">
    <div class="task">
        <div class="date">
            <div class="day">
                <span class="day-text">05</span>
            </div>
            <div class="month-time">
                <span class="month-text">August</span>
                <span class="time-text">11:00-14:00</span>
            </div>
        </div>

        <div class="info">
            <span class="title-text">Formation of the organizational structure of the company in the face of uncertainty.</span>
            <div class="description">
                <span class="description-text">Online master-class</span>
            </div>
        </div>

        <button class="button-view">View more</button>
    </div>
    <div class="task">
        <div class="date">
            <div class="day">
                <span class="day-text">05</span>
            </div>
            <div class="month-time">
                <span class="month-text">August</span>
                <span class="time-text">11:00-14:00</span>
            </div>
        </div>

        <div class="info">
            <span class="title-text">Formation</span>
            <div class="description">
                <span class="description-text">Online master-class</span>
            </div>
        </div>

        <button class="button-view">View more</button>
    </div>
</div>
