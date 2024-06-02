<?php

session_start();
unset($_SESSION['mainid']);
header("location:login.php");


?>