<header>
    <div class="container">
        <h1>Księgarnia Internetowa</h1>
    </div>
    <form action="index.php" method="post" id="search">
        <input type="text" name="search" id="wyszukiwarka">
        <input type="submit" value="Szukaj">
    </form>
    <nav>
        <ul>
            <?php 
            if(isset($_SESSION['log']))
            {
                $id = $_SESSION['log'];
                require 'connect.php';
                $query10 = "Select admin from klient where id_klienta = $id";
                $result10 = mysqli_query($conn,$query10);
                $row10 = mysqli_fetch_array($result10);
                mysqli_close($conn);
                if($row10['admin']==1)
                {
                    echo "<li><a href='client.php'>Administracja </a></li>" ;
                }
            }
            ?>
            <li><a href="zamowienie.php">Zamowienie </a></li>
            <li><a href="wyloguj.php" id="wyloguj">Wyloguj</a></li>
        </ul>
    </nav>
</header>