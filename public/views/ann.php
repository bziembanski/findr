<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("head.php")?>
    <script type="text/javascript" src="/public/js/ratings.js" defer></script>
    <script type="text/javascript" src="/public/js/ann.js" defer></script>
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
                    <i class="fas fa-times close-ann-filters"></i>
                    <div class="ann-filter">
                        <p class="ann-search-filter">search filter:</p>
                        <p class="ann-search-information">information</p>
                    </div>
                    <div class="ann-filter">
                        <p class="ann-search-filter">search filter:</p>
                        <p class="ann-search-information">information</p>
                    </div>
                </section>
                <section class="ann-content">
                    <i class="show-ann-filters fas fa-filter"></i>
                    <div class="ann-user-profile-info">
                        <img src="/public/upload/<?=$ann->getAvatar()?>">
                        <div class="ann-username-date-hour">
                            <a href="/user/<?=$ann->getUserId()?>" class="ann-username"><?=$ann->getUsername()?></a>
                            <div class="ann-date"><?=$ann->getDate()?></div>
                            <div class="ann-hour"><?=$ann->getTime()?></div>
                            <i class="fas fa-trash <?=intval($_COOKIE["user"])!=$ann->getUserId() && $_COOKIE["role"]!="admin" ? "none" : ""?>"></i>
                        </div>
                    </div>
                    <div class="ann-gamename-desc">
                        <div class="ann-game-name"><?=$ann->getGamename()?></div>
                        <div class="ann-desc"><?=$ann->getDescription()?></div>
                    </div>
                    <div class="ann-invite-button">
                        <button id="invite-button" value="<?=$ann->getId()?>">
                            <span id="invite-text">invite me</span>
                            <span id="invite-icon"><i class="fas fa-user-plus"></i></span>
                        </button>
                    </div>
                </section>
                <section class="ann-ratings-section">
                    <? include ("ratings.php") ?>
                </section>
            </div>
        </main>
    </div>
</body>
</html>