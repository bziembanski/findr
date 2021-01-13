<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="/public/css/reset.css">
    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
    <script src="https://kit.fontawesome.com/09f69f3f15.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="/public/js/ratings.js" defer></script>
    <title>ANNOUNCEMENT</title>
</head>
<body>
    <div class="container">
        <nav>
            <?php include("header.php")?>
        </nav>
        <main class="ann-main">
            <div class="ann-main-container">
                <section class="ann-filters">
<!--                    <div class="ann-filter">-->
<!--                        <p class="ann-search-filter">search filter:</p>-->
<!--                        <p class="ann-search-information">information</p>-->
<!--                    </div>-->
<!--                    <div class="ann-filter">-->
<!--                        <p class="ann-search-filter">search filter:</p>-->
<!--                        <p class="ann-search-information">information</p>-->
<!--                    </div>-->
                </section>
                <section class="ann-content">
                    <div class="ann-user-profile-info">
                        <img src="/public/upload/<?=$ann->getAvatar()?>">
                        <div class="ann-username-date-hour">
                            <a href="/user/<?=$ann->getUserId()?>" class="ann-username"><?=$ann->getUsername()?></a>
                            <div class="ann-date"><?=$ann->getDate()?></div>
                            <div class="ann-hour"><?=$ann->getTime()?></div>
                        </div>
                    </div>
                    <div class="ann-gamename-desc">
                        <div class="ann-game-name"><?=$ann->getGamename()?></div>
                        <div class="ann-desc"><?=$ann->getDescription()?></div>
                    </div>
                    <div class="ann-invite-button">
                        <button id="invite-button">invite me</button>
                    </div>
                </section>
                <section class="ann-ratings-section">
                    <? include ("ratings.php")?>
                </section>
            </div>
        </main>
    </div>
</body>
</html>