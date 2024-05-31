<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koszyk - Księgarnia Internetowa</title>
    <!-- <link rel="stylesheet" href="styles.css"> -->
    
</head>
<body>
    <header>
        <div class="container">
            <h1>Księgarnia Internetowa - Administracja</h1>
            <a href="wyloguj.php"><button>Wyloguj</button></a>
        </div>
    </header>

    <main>
        <div class="container">
            <section class="cart">
                <h2>Twój Koszyk</h2>
                <?php
                if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
                    echo '<ul>';
                    foreach ($_SESSION['cart'] as $key => $book) {
                        echo '<li>';
                        echo $book['title'] . ' - ' . $book['price'] . ' PLN';
                        echo ' <a href="remove_from_cart.php?key=' . $key . '">Usuń</a>';
                        echo '</li>';   
                    }
                    echo '</ul>';
                } else {
                    echo '<p>Twój koszyk jest pusty.</p>';
                }
                ?>
            </section>
        </div>
    </main>
</body>
</html>
