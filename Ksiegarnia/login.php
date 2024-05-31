<?php
session_start();
if(isset($_SESSION['log']))
{
    header('location:index.php');
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/login.css">
</head>
<body>
    <?php
        require 'header3.php';
        if(isset($_POST['email']) && isset($_POST['haslo']))
        {
            require 'connect.php';
            $email = $_POST['email'];
            $haslo = $_POST['haslo'];
            $zapytanie = "SELECT * FROM klient WHERE AdresEmail='$email' AND haslo='$haslo'";
            $wynik = mysqli_query($conn,$zapytanie);
            $row = mysqli_fetch_row($wynik);
            if (mysqli_num_rows($wynik) > 0) 
            {
                $_SESSION['log'] = $row[0];
                if($row[0] == 1)
                {
                    header('location: client.php');
                    exit();
                }   
                else
                {
                    header('location: index.php');
                    exit();
                }
            } 
            else 
            {
                echo "Błąd logowania. Użytkownik o podanych danych nie istnieje.";
            }
            mysqli_close($conn);
        } 
    ?>
    <main>
        <form action="login.php" method="post">
            <div id="logowanie">Logowanie</div>
            <div class="nazw"><b>Email:</b></div>
            <div><input type=text name="email" value="" size="25" require></div>
            <div class="nazw"><b>Hasło:</b></div>
            <div><input type=password name='haslo' value="" size="25" require></div>
            <div><input type="submit" value="Zaloguj sie"></div>
        </form>
    </main>
    
</body>
</html>