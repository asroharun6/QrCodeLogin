<?php
session_start();

session_unset($_SESSION['username']);
session_unset($_SESSION['IsActive']);

session_destroy();
header ("location: index.php")

?>