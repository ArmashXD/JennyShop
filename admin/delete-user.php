<?php
include('include/config.php');

$sql = "DELETE FROM user_info WHERE user_Id='" . $_GET["user_Id"] . "'";
if (mysqli_query($con, $sql)) {
    header('location: manage-users.php');
    $_SESSION['delmsg'] = "Record Deleted !";
} else {
    echo "Error deleting record: " . mysqli_error($con);
}
