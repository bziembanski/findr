<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="/public/css/reset.css">
    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
    <script src="https://kit.fontawesome.com/09f69f3f15.js" crossorigin="anonymous"></script>
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
                            <div class="ann-username"><?=$ann->getUsername()?></div>
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
                    <div class="ann-ratings-section-heading">Rating <i class="far fa-thumbs-up"></i> <i class="far fa-thumbs-down"></i></div>
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
            </div>
        </main>
    </div>
</body>
</html>