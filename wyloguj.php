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
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Koniec sesji</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    <p>Wylogowales sie ze strony.</p>
    <a href = "index.php">Startowa</a>
    
</body>
</html>