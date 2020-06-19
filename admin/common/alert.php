<?php
if (isset($_SESSION['flash_message'])) {
    $flashMessage = $_SESSION['flash_message'];
    $flashMessageClass = $_SESSION['flash_message_class'];
    unset($_SESSION['flash_message']);
    unset($_SESSION['flash_message_class']);
}
if($flashMessage) { ?>
    <div class="alert alert-<?php echo $flashMessageClass; ?>">
        <?php echo $flashMessage; ?>
    </div>
<?php } ?>
