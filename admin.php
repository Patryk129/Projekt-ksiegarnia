<?php
session_start();
if(isset($_SESSION['log']))
{
    $id = $_SESSION['log'];
    require 'connect.php';
    $query = "Select admin from klient where id_klienta = $id";
    $result = mysqli_query($conn,$query);
    $row = mysqli_fetch_array($result);
    mysqli_close($conn);
    if($row['admin']!=1)
    {
        header('location: index.php');
        exit; 
    }
}
else
{
    header('location: index.php');
    exit;
}
?>