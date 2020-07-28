<?php
session_start();
session_destroy();
//session_destroy();
?>
<script language="javascript">
    alert("Logged Out !");
    document.location = "../index.php";
</script>