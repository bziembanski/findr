<div id="<?=$current?>" class="profile-ratings-section-heading">
    Rating
    <?
    function isUp($rating){
        return $rating->isRatingType();
    }
    $up = round((count(array_filter($ratings, "isUp"))/count($ratings))*100);
    ?>
    <i class="far fa-thumbs-up">
        <span id="ratings-up-percent"><?=$up?>%</span>
    </i>
    <i class="far fa-thumbs-down">
        <span></span>
    </i>
</div>
<div class="ratings">
    <? foreach ($ratings as $rating): ?>
        <div class="ann-rating">
            <img src="/public/upload/<?=$rating->getAvatar()?>">
            <a href="/user/<?=$rating->getUserId()?>" class="ann-rating-username"><?=$rating->getUsername()?></a>
            <i class="far fa-thumbs-<?=$rating->isRatingType() ? 'up': 'down'?>"></i>
            <p class="ann-rating-date"><?=explode(" ", $rating->getDate(),)[0]?></p>
        </div>
    <? endforeach;?>
</div>

<template id="rating-template">
    <div class="ann-rating">
        <img src="/public/upload/>">
        <p class="ann-rating-username">username</p>
        <i class="far"></i>
        <p class="ann-rating-date">date</p>
    </div>
</template>