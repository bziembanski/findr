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
                    <li><a href="">search</a></li>
                    <li class="active"><a href="">profile</a></li>
                </ul>
            </div>
            <div class="profile-header">
                <i class="fas fa-bell"></i>
                <div class="profile-nav">
                    <a href="/profile"><img src="public/img/avatar.png"></a>
                    <div class="profile-nav-username">username</div>
                </div>
                <div class="nav-logout">logout</div>
            </div>

        </header>
    </nav>
    <main class="edit-profile-main">
            <img src="public/img/avatar.png">
            <div class="edit-profile-inputs">
                <label class="edit-profile-username">Username<input type="text" placeholder="Username" name="username"></label>
                <label class="edit-profile-favourite">Favourite game<input type="text" placeholder="Favourite game" name="favourite_game"></label>
                <label class="edit-profile-avatar">Avatar<input type="file" accept="image/jpeg" name="avatar"></label>
            </div>
    </main>
</div>
</body>
</html>