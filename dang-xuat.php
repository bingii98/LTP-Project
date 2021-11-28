<?php
session_start();
unset($_SESSION["2748_loggedin"]);
header("Location:dang-nhap");
?>