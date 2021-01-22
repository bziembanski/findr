<div id="<?=$current?>" class="profile-ratings-section-heading">
    Rating
    <?
    function isUp($rating){
        return $rating->isRatingType();
    }
    if(count($ratings)==0)
        $up = 0;
    else
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
            <a href="/user/<?=$rating->getUserId()?>"><img src="/public/upload/<?=$rating->getAvatar()?>"></a>
            <i class="far fa-thumbs-<?=$rating->isRatingType() ? 'up': 'down'?>"></i>
            <p class="ann-rating-date"><?=explode(" ", $rating->getDate())[0]?></p>
        </div>
    <? endforeach;?>
</div>

<template id="rating-template">
    <div class="ann-rating">
        <a><img></a>
        <i class="far"></i>
        <p class="ann-rating-date">date</p>
    </div>
</template>