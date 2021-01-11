<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="/public/css/reset.css">
    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
    <script src="https://kit.fontawesome.com/09f69f3f15.js" crossorigin="anonymous"></script>
    <title>PROFILE PAGE</title>
</head>
<body>
    <div class="container">
        <nav>
            <?php include("header.php")?>
        </nav>
        <main class="profile-main">
            <section class="profile-content">
                <div class="profile-user-profile-info">
                    <img src="/public/upload/<?= $user->getAvatar()?>">
                    <div class="profile-username-date-hour">
                        <div class="profile-username"><?= $user->getUsername()?></div>
                        <div class="profile-date"><span>Joined:</span><?= $user->getJoined()?></div>
                        <div class="profile-favourite"><span>Favourite game:</span><?= $user->getFavouriteGame()?></div>
                        <a class="profile-edit-link" href="/editProfile"><i class="far fa-edit" aria-hidden="true"></i></a>
                    </div>
                </div>
                <div class="profile-anns">
                    <? foreach ($anns as $ann): ?>
                    <a href="/ann/<?=$ann->getId()?>" class="announcement">
                        <div class="announcement-username-date">
                            <p class="announcement-username"><?=$ann->getUsername()?></p>
                            <p class="announcement-date"><?=$ann->getDate()." ".$ann->getTime()?></p>
                        </div>
                        <div class="announcement-content">
                            <p class="announcement-game-name"><?=$ann->getGameName()?></p>
                            <p class="announcement-desc"><?=$ann->getDescription()?></p>
                        </div>
                    </a>
                    <?endforeach;?>
                </div>
            </section>
            <section class="profile-ratings-section">
                <div class="profile-ratings-section-heading">Rating <i class="far fa-thumbs-up"></i> <i class="far fa-thumbs-down"></i></div>
                <div class="ratings">
                    <? foreach ($ratings as $rating): ?>
                        <div class="ann-rating">
                            <img src="/public/upload/<?=$rating->getAvatar()?>">
                            <p class="ann-rating-username"><?=$rating->getUsername()?></p>
                            <i class="far fa-thumbs-<?=$rating->isRatingType() ? 'up': 'down'?>"></i>
                            <p class="ann-rating-date"><?=explode(" ", $rating->getDate(),)[0]?></p>
                        </div>
                    <? endforeach;?>
                </div>
            </section>
            
        </main>
    </div>
</body>
</html>