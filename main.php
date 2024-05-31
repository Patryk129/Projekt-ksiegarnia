<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Księgarnia Internetowa</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>Księgarnia Internetowa</h1>
            <nav>
                <ul>
                    <li><a href="index.php">Strona Główna</a></li>
                    <li><a href="#">O Nas</a></li>
                    <li><a href="#">Kontakt</a></li>
                    <li><a href="bookstore.php">Książki</a></li>
                    <li><a href="cart.php">Koszyk (<?php echo isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0; ?>)</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <div class="container">
            <section class="promo">
                <h2>Oferty Promocyjne</h2>
                <p>Sprawdź nasze najnowsze promocje na książki!</p>
            </section>

            <section class="search">
                <h2>Wyszukiwarka</h2>
                <form action="bookstore.php" method="GET">
                    <input type="text" name="search" placeholder="Wyszukaj książki">
                    <input type="submit" value="Szukaj">
                </form>
            </section>

            <section class="books">
                <h2>Nasze Książki</h2>
                <div class="book-list">
                    <?php include 'bookstore.php'; ?>
                </div>
            </section>
        </div>
    </main>

    <footer>
        <div class="container">
            <p>&copy; 2024 Księgarnia Internetowa. Wszelkie prawa zastrzeżone.</p>
        </div>
    </footer>
</body>
</html>
