<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="/public/css/reset.css">
    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
    <script src="https://kit.fontawesome.com/09f69f3f15.js" crossorigin="anonymous"></script>
    <title>EDIT PROFILE</title>
</head>
<body>
<div class="container">
    <nav>
        <?php include("header.php")?>
    </nav>
    <main class="edit-profile-main">
            <img src="/public/img/avatar.png">
            <form action="/editProfile" enctype="multipart/form-data" method="POST" class="edit-profile-inputs">
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