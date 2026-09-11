<?php
    $username = $_SESSION['username'];

    get_header();
?>

<p>Xin chào <?php echo $username?><a href="<?php echo base_url("?mod=users&action=logout") ?>">Thoát</a></p>

<?php get_footer(); ?>