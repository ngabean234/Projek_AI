<?php
session_start();
unset($_SESSION['admin']);

echo "<script>window.location='../index.php';</script>";
?> 