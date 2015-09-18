<?php
session_start();
session_destroy();
header("Location:acesso/login.php");
?>