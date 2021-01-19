<header>
    <div class="logo-nav-header">
        <img id="logo-header" src="/public/img/logo.svg">
        <ul>
            <li><a href="/home">home</a></li>
            <li><a href="/search">search</a></li>
            <li><a href="/profile">profile</a></li>
        </ul>
    </div>
    <div class="profile-header">
        <i class="fas fa-bell"></i>
        <a href="/addAnn" class="fas fa-plus"></a>
        <div class="profile-nav">
            <a href="/profile"><span class="inline-helper"></span><img src="/public/upload/<?=$_COOKIE["avatar"]?>"></a>
            <a href="/profile" class="profile-nav-username"><?=$_COOKIE["username"]?></a>
        </div>
        <a href="/logout" class="nav-logout">logout</a>
    </div>

</header>
<div class="notifications-pop-up" tabindex="-1"></div>
<template id="notification-template">
    <div class="notification">
        <div class="notification-wrapper">
            <a><img></a>
            <i class="fas fa-check"></i>
            <i class="fas fa-times"></i>
        </div>
        <p class="notification-content"></p>
    </div>
</template>