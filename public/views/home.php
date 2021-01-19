<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("head.php")?>
    <title>HOME PAGE</title>
</head>
<body>
    <div class="container">
        <nav>
            <?php include("header.php")?>
        </nav>
        <main class="home-main">
            <div class="home-heading">
                <i class="fas fa-search"></i>
                <p>find friends to play with<br>or just friends<br>whatever you like</p>
            </div>
            <form method="POST" action="/search" class="search-bar">
                <input type="text" name="search" placeholder="search for a game">
                <button id="search button"><i class="fas fa-search"></i></button>
            </form>
        </main>
    </div>
</body>
</html>