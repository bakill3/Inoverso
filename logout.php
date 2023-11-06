<?php
include 'header.php';
session_destroy();
header('Location: index.php');
exit(0);
?>