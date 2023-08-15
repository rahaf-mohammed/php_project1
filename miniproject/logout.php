<?php
@include 'config.php';

session_start();
session_unset();
session_destory();

header('location:login.php');


?>