
<?php if (isset($_SESSION['success_message'])): ?>
    <div class="info success">
        <img src="../images/success.png">
        <span><?= $_SESSION['success_message'] ?></span>
    </div>
    <?php unset($_SESSION['success_message']); ?>
<?php endif;?>

<?php if (isset($_SESSION['error_message'])): ?>
    <div class="info error">
        <img src="../images/error.png">
        <span><?= $_SESSION['error_message'] ?></span>
    </div>
<?php unset($_SESSION['error_message']); ?>
<?php endif;?>