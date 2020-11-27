<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="public/css/reset.css">
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <script src="https://kit.fontawesome.com/09f69f3f15.js" crossorigin="anonymous"></script>
    <title>SEARCH PAGE</title>
</head>
<body>
    <div class="container">
        <nav>
            <header>
                <div class="logo-nav-header">
                    <img id="logo-header" src="public/img/logo.svg">
                    <ul>
                        <li><a href="">home</a></li>
                        <li class="active"><a href="">search</a></li>
                        <li><a href="">profile</a></li>
                    </ul>
                </div>
                <div class="profile-header">
                    <i class="fas fa-bell"></i>
                    <div class="profile-nav">
                        <img src="public/img/avatar.png">
                        <div class="profile-nav-username">username</div>
                    </div>
                    <div class="nav-logout">logout</div>
                </div>
                
            </header>
        </nav>
        <main class="home-main">
            <div class="home-heading">
                <i class="fas fa-search"></i>
                <p>find friends to play with<br>or just friends<br>whatever you like</p>
            </div>
            <form class="search-bar">
                <input type="text" name="search" placeholder="search for a game">
                <button id="search button"><i class="fas fa-search"></i></button>
            </form>
        </main>
    </div>
</body>
</html>