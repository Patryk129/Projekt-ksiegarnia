<?php
session_start();
if(isset($_SESSION['log']))
{
    unset($_SESSION['log']);
    header('location: index.php');
    exit;
}
else
{
    header('location: index.php');
    exit;
}
$s = session_destroy();
?>