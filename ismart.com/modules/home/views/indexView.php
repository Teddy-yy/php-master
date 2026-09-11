<?php
    $username = $_SESSION['username'];
?>

<p>Xin chào <?php echo $username?><a href="<?php echo base_url("?mod=users&action=logout") ?>">Thoát</a></p>