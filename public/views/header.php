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
            <?
            if(!isset($user)){
                $user = $ann;
            }?>
            <a href="/profile"><span class="inline-helper"></span><img src="/public/upload/<?=$user->getAvatar()?>"></a>
            <a href="/profile" class="profile-nav-username"><?=$user->getUsername()?></a>
        </div>
        <a href="/logout" class="nav-logout">logout</a>
    </div>

</header>