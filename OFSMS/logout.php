
<?php
session_start();
unset($_SESSION['ofsmsuid']);
//session_destroy();
header('location:signup.php');

?>