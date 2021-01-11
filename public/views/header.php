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
        <div class="profile-nav">
            <?
            if(!isset($user)){
                $user = $ann;
            }?>
            <a href="/profile"><img src="/public/upload/<?=$user->getAvatar()?>"></a>
            <div class="profile-nav-username"><?=$user->getUsername()?></div>
        </div>
        <a href="/logout" class="nav-logout">logout</a>
    </div>

</header>