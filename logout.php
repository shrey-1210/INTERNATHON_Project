<?php
include "configure.php";

session_start();

session_unset();

session_destroy();

header("Location: {$hostname}/index.php");
?>