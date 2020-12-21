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
            <form action="editProfile" enctype="multipart/form-data" method="POST" class="edit-profile-inputs">
                <div class="messages">
                    <?php
                    if (isset($messages)){
                        foreach($messages as $message){
                            echo $message;
                        }
                    }
                    ?>
                </div>
                <label class="edit-profile-username">Username<input type="text" placeholder="Username" name="username"></label>
                <label class="edit-profile-favourite">Favourite game<input type="text" placeholder="Favourite game" name="favourite_game"></label>
                <label class="edit-profile-avatar">Avatar<input type="file" accept="image/jpeg, image/png" name="avatar"></label>
                <button>Save</button>
            </form>
    </main>
</div>
</body>
</html>