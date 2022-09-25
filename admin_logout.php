<?php
session_start();
// unset($_SESSION['admin']);
session_destroy();

?>
<script>
    window.location="index.php";
</script>