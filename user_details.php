<?php
if (isset($_SESSION['login'])) {
    echo "<script>window.location.href= 'index.php'</script>";
}
include('views/header.php');
?>
<?php include('views/user_details.php') ?>

<?php include('views/footer.php'); ?>