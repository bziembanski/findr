<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("head.php")?>
    <script type="text/javascript" src="/public/js/ratings.js" defer></script>
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
                    <img src="/public/upload/<?= $profile->getAvatar()?>">
                    <div class="profile-username-date-hour">
                        <a href="/user/<?=$profile->getUserId()?>" class="profile-username"><?= $profile->getUsername()?></a>
                        <div class="profile-date"><span>Joined:</span><?= $profile->getJoined()?></div>
                        <div class="profile-favourite"><span>Favourite game:</span><?= $profile->getFavouriteGame()?></div>
                        <a class="profile-edit-link <?=intval($_COOKIE["user"])!=$profile->getUserId() ? "none" : ""?>" href="/editProfile">
                            <i class="far fa-edit" aria-hidden="true"></i>
                        </a>
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
                <? include ("ratings.php")?>
            </section>
        </main>
    </div>
</body>
</html>