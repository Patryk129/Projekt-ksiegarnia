<?php
    require 'admin.php';
    require 'connect.php';
    $id = $_POST['id_ksiazki']; 
    $query= "DELETE FROM ksiazka WHERE id_ksiazki = '$id' ";
    $result = mysqli_query($conn,$query);
    mysqli_close($conn);
    header('ksiazka.php')
    ?>