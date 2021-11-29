<?php if (isset($_SESSION['error_message'])): ?>
    <div class="error">
        <img src="../img/error.png">
        <span><?= $_SESSION['error_message'] ?></span>
    </div>
<?php unset($_SESSION['error_message']); ?>
<?php endif;?>