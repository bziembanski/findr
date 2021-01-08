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
            <?php include("header.php")?>
        </nav>
        <main class="profile-main">
            <section class="profile-content">
                <div class="profile-user-profile-info">
                    <img src="public/upload/<?= $user->getAvatar()?>">
                    <div class="profile-username-date-hour">
                        <div class="profile-username"><?= $user->getUsername()?></div>
                        <div class="profile-date"><span>Joined:</span><?= $user->getJoined()?></div>
                        <div class="profile-favourite"><span>Favourite game:</span><?= $user->getFavouriteGame()?></div>
                        <a class="profile-edit-link" href="/edit_profile"><i class="far fa-edit" aria-hidden="true"></i></a>
                    </div>
                </div>
                <div class="profile-anns">
                    <div class="announcement">
                        <div class="announcement-username-date">
                            <p class="announcement-username">Username</p>
                            <p class="announcement-date">2020-12-24 9:37 PM</p>
                        </div>
                        <div class="announcement-content">
                            <p class="announcement-game-name">Name of the game</p>
                            <p class="announcement-desc">Description of type of the gameplay, information about rank in game, current level etc.</p>
                        </div>
                    </div>
                    <div class="announcement">
                        <div class="announcement-username-date">
                            <p class="announcement-username">Username</p>
                            <p class="announcement-date">2020-12-24 9:37 PM</p>
                        </div>
                        <div class="announcement-content">
                            <p class="announcement-game-name">Name of the game</p>
                            <p class="announcement-desc">Description of type of the gameplay, information about rank in game, current level etc.</p>
                        </div>
                    </div>
                    <div class="announcement">
                        <div class="announcement-username-date">
                            <p class="announcement-username">Username</p>
                            <p class="announcement-date">2020-12-24 9:37 PM</p>
                        </div>
                        <div class="announcement-content">
                            <p class="announcement-game-name">Name of the game</p>
                            <p class="announcement-desc">Description of type of the gameplay, information about rank in game, current level etc.</p>
                        </div>
                    </div>
                    <div class="announcement">
                        <div class="announcement-username-date">
                            <p class="announcement-username">Username</p>
                            <p class="announcement-date">2020-12-24 9:37 PM</p>
                        </div>
                        <div class="announcement-content">
                            <p class="announcement-game-name">Name of the game</p>
                            <p class="announcement-desc">Description of type of the gameplay, information about rank in game, current level etc.</p>
                        </div>
                    </div>
                    <div class="announcement">
                        <div class="announcement-username-date">
                            <p class="announcement-username">Username</p>
                            <p class="announcement-date">2020-12-24 9:37 PM</p>
                        </div>
                        <div class="announcement-content">
                            <p class="announcement-game-name">Name of the game</p>
                            <p class="announcement-desc">Description of type of the gameplay, information about rank in game, current level etc.</p>
                        </div>
                    </div>
                    <div class="announcement">
                        <div class="announcement-username-date">
                            <p class="announcement-username">Username</p>
                            <p class="announcement-date">2020-12-24 9:37 PM</p>
                        </div>
                        <div class="announcement-content">
                            <p class="announcement-game-name">Name of the game</p>
                            <p class="announcement-desc">Description of type of the gameplay, information about rank in game, current level etc.</p>
                        </div>
                    </div>
                    <div class="announcement">
                        <div class="announcement-username-date">
                            <p class="announcement-username">Username</p>
                            <p class="announcement-date">2020-12-24 9:37 PM</p>
                        </div>
                        <div class="announcement-content">
                            <p class="announcement-game-name">Name of the game</p>
                            <p class="announcement-desc">Description of type of the gameplay, information about rank in game, current level etc.</p>
                        </div>
                    </div>
                    <div class="announcement">
                        <div class="announcement-username-date">
                            <p class="announcement-username">Username</p>
                            <p class="announcement-date">2020-12-24 9:37 PM</p>
                        </div>
                        <div class="announcement-content">
                            <p class="announcement-game-name">Name of the game</p>
                            <p class="announcement-desc">Description of type of the gameplay, information about rank in game, current level etc.</p>
                        </div>
                    </div>
                    <div class="announcement">
                        <div class="announcement-username-date">
                            <p class="announcement-username">Username</p>
                            <p class="announcement-date">2020-12-24 9:37 PM</p>
                        </div>
                        <div class="announcement-content">
                            <p class="announcement-game-name">Name of the game</p>
                            <p class="announcement-desc">Description of type of the gameplay, information about rank in game, current level etc.</p>
                        </div>
                    </div>
                    <div class="announcement">
                        <div class="announcement-username-date">
                            <p class="announcement-username">Username</p>
                            <p class="announcement-date">2020-12-24 9:37 PM</p>
                        </div>
                        <div class="announcement-content">
                            <p class="announcement-game-name">Name of the game</p>
                            <p class="announcement-desc">Description of type of the gameplay, information about rank in game, current level etc.</p>
                        </div>
                    </div>
                    <div class="announcement">
                        <div class="announcement-username-date">
                            <p class="announcement-username">Username</p>
                            <p class="announcement-date">2020-12-24 9:37 PM</p>
                        </div>
                        <div class="announcement-content">
                            <p class="announcement-game-name">Name of the game</p>
                            <p class="announcement-desc">Description of type of the gameplay, information about rank in game, current level etc.</p>
                        </div>
                    </div>
                </div>
            </section>
            <section class="profile-ratings-section">
                <div class="profile-ratings-section-heading">Rating <i class="far fa-thumbs-up"></i> <i class="far fa-thumbs-down"></i></div>
                <div class="profile-ratings">
                    <div class="profile-rating">
                        <img src="public/img/avatar.png">
                        <p class="profile-rating-username">username</p>
                        <i class="far fa-thumbs-up"></i>
                        <p class="profile-rating-date">2020-12-24</p>
                    </div>
                    <div class="profile-rating">
                        <img src="public/img/avatar.png">
                        <p class="profile-rating-username">username</p>
                        <i class="far fa-thumbs-up"></i>
                        <p class="profile-rating-date">2020-12-24</p>
                    </div>
                    <div class="profile-rating">
                        <img src="public/img/avatar.png">
                        <p class="profile-rating-username">username</p>
                        <i class="far fa-thumbs-up"></i>
                        <p class="profile-rating-date">2020-12-24</p>
                    </div>
                    <div class="profile-rating">
                        <img src="public/img/avatar.png">
                        <p class="profile-rating-username">username</p>
                        <i class="far fa-thumbs-up"></i>
                        <p class="profile-rating-date">2020-12-24</p>
                    </div>
                    <div class="profile-rating down">
                        <img src="public/img/avatar.png">
                        <p class="profile-rating-username">username</p>
                        <i class="far fa-thumbs-down"></i>
                        <p class="profile-rating-date">2020-12-24</p>
                    </div>
                    <div class="profile-rating">
                        <img src="public/img/avatar.png">
                        <p class="profile-rating-username">username</p>
                        <i class="far fa-thumbs-up"></i>
                        <p class="profile-rating-date">2020-12-24</p>
                    </div>
                    <div class="profile-rating">
                        <img src="public/img/avatar.png">
                        <p class="profile-rating-username">username</p>
                        <i class="far fa-thumbs-up"></i>
                        <p class="profile-rating-date">2020-12-24</p>
                    </div>
                    <div class="profile-rating">
                        <img src="public/img/avatar.png">
                        <p class="profile-rating-username">username</p>
                        <i class="far fa-thumbs-up"></i>
                        <p class="profile-rating-date">2020-12-24</p>
                    </div>
                    <div class="profile-rating">
                        <img src="public/img/avatar.png">
                        <p class="profile-rating-username">username</p>
                        <i class="far fa-thumbs-up"></i>
                        <p class="profile-rating-date">2020-12-24</p>
                    </div>
                    <div class="profile-rating">
                        <img src="public/img/avatar.png">
                        <p class="profile-rating-username">username</p>
                        <i class="far fa-thumbs-up"></i>
                        <p class="profile-rating-date">2020-12-24</p>
                    </div>
                    <div class="profile-rating">
                        <img src="public/img/avatar.png">
                        <p class="profile-rating-username">username</p>
                        <i class="far fa-thumbs-up"></i>
                        <p class="profile-rating-date">2020-12-24</p>
                    </div>
                </div>
            </section>
            
        </main>
    </div>
</body>
</html>