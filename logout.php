<?php
session_start();
unset($_SESSION["id"]);
unset($_SESSION["niveau"]);
header("Location:index.php");
?>