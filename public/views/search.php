<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="/public/css/reset.css">
    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
    <script src="https://kit.fontawesome.com/09f69f3f15.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="/public/js/search.js" defer></script>
    <title>SEARCH PAGE</title>
</head>
<body>
    <div class="container">
        <nav>
            <?php include("header.php")?>
        </nav>
        <main class="search-main">
            <section class="search-filters">
                <h2>filters</h2>
                <div class="search-bar">
                    <input type="text" name="search" placeholder="search for a game">
                    <button id="search button"><i class="fas fa-search"></i></button>
                </div>
                <div class="filter-container opened">
                    <div class="search-filter">
                        <p>search filter</p>
                        <i class="far fa-caret-square-down"></i>
                    </div>
                    <div class="filters">
                        <label class="filter">
                            <input type="checkbox" name="filter" checked>
                            <p>option selected</p>
                        </label>
                        <label class="filter">
                            <input type="checkbox" name="filter">
                            <p>option not selected</p>
                        </label>
                        <label class="filter">
                            <input type="checkbox" name="filter">
                            <p>option not selected</p>
                        </label>
                        <label class="filter">
                            <input type="checkbox" name="filter">
                            <p>option not selected</p>
                        </label>
                    </div>
                </div>
                <div class="filter-container opened">
                    <div class="search-filter">
                        <p>search filter</p>
                        <i class="far fa-caret-square-down"></i>
                    </div>
                    <div class="filters">
                        <label class="filter">
                            <input type="checkbox" name="filter" checked>
                            <p>option selected</p>
                        </label>
                        <label class="filter">
                            <input type="checkbox" name="filter">
                            <p>option not selected</p>
                        </label>
                        <label class="filter">
                            <input type="checkbox" name="filter">
                            <p>option not selected</p>
                        </label>
                        <label class="filter">
                            <input type="checkbox" name="filter">
                            <p>option not selected</p>
                        </label>
                    </div>
                </div>
                <div class="filter-container opened">
                    <div class="search-filter">
                        <p>search filter</p>
                        <i class="far fa-caret-square-down"></i>
                    </div>
                    <div class="filters">
                        <label class="filter">
                            <input type="checkbox" name="filter" checked>
                            <p>option selected</p>
                        </label>
                        <label class="filter">
                            <input type="checkbox" name="filter">
                            <p>option not selected</p>
                        </label>
                        <label class="filter">
                            <input type="checkbox" name="filter">
                            <p>option not selected</p>
                        </label>
                        <label class="filter">
                            <input type="checkbox" name="filter">
                            <p>option not selected</p>
                        </label>
                    </div>
                </div>
                <div class="filter-container opened">
                    <div class="search-filter">
                        <p>search filter</p>
                        <i class="far fa-caret-square-down"></i>
                    </div>
                    <div class="filters">
                        <label class="filter">
                            <input type="checkbox" name="filter" checked>
                            <p>option selected</p>
                        </label>
                        <label class="filter">
                            <input type="checkbox" name="filter">
                            <p>option not selected</p>
                        </label>
                        <label class="filter">
                            <input type="checkbox" name="filter">
                            <p>option not selected</p>
                        </label>
                        <label class="filter">
                            <input type="checkbox" name="filter">
                            <p>option not selected</p>
                        </label>
                    </div>
                </div>
                <div class="filter-container">
                    <div class="search-filter">
                        <p>search filter</p>
                        <i class="far fa-caret-square-down"></i>
                    </div>
                    <div class="filters">
                        <label class="filter">
                            <input type="checkbox" name="filter" checked>
                            <p>option selected</p>
                        </label>
                        <label class="filter">
                            <input type="checkbox" name="filter">
                            <p>option not selected</p>
                        </label>
                        <label class="filter">
                            <input type="checkbox" name="filter">
                            <p>option not selected</p>
                        </label>
                        <label class="filter">
                            <input type="checkbox" name="filter">
                            <p>option not selected</p>
                        </label>
                        <label class="filter">
                            <input type="checkbox" name="filter">
                            <p>option not selected</p>
                        </label>
                        <label class="filter">
                            <input type="checkbox" name="filter">
                            <p>option not selected</p>
                        </label>
                        <label class="filter">
                            <input type="checkbox" name="filter">
                            <p>option not selected</p>
                        </label>
                    </div>
                </div>

            </section>
            <section class="announcements">
                <?php foreach ($anns as $ann): ?>
                <a href="/ann/<?= $ann->getId() ?>" class="announcement">
                    <img src="/public/upload/<?= $ann->getAvatar() ?>">
                    <div class="announcement-username-date">
                        <p class="announcement-username"><?= $ann->getUsername() ?></p>
                        <p class="announcement-date"><?= $ann->getDate() ?></p>
                        <p class="announcement-hour"><?= $ann->getTime() ?></p>
                    </div>
                    <div class="announcement-content">
                        <p class="announcement-game-name"><?= $ann->getGameName() ?></p>
                        <p class="announcement-desc"><?= $ann->getDescription() ?></p>
                    </div>
                </a>
                <?php endforeach;?>
            </section>
        </main>
    </div>
</body>
</html>
<template id="ann-template">
    <a class="announcement">
        <img src="">
        <div class="announcement-username-date">
            <p class="announcement-username">username</p>
            <p class="announcement-date">date</p>
            <p class="announcement-hour">time</p>
        </div>
        <div class="announcement-content">
            <p class="announcement-game-name">gameName</p>
            <p class="announcement-desc">desc</p>
        </div>
    </a>
</template>