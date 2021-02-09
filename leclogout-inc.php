<?php

session_start();
session_unset();
session_destroy();

//echo "Logout Successful";
header("refresh:3;url=leclogin.php");