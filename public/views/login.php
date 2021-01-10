<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="/public/css/reset.css">
    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
    <script type="text/javascript" src="/public/js/script.js" defer></script>
    <title>LOGIN PAGE</title>
</head>
<body>
    <div class="container login">
        <div class="logo-container">
            <div class="logo-svg">
                <img src="/public/img/logo.svg">
            </div>
            <div class="logo-text">find new gamer friends</div>
        </div>
        <div class="forms-container">
            <div class="sing-up-form">
                <form id="sign-up-form" action="/register" method="POST">
                    <div class="messages">
                        <?php
                        if (isset($register_messages)){
                            foreach($register_messages as $message){
                                echo $message;
                            }
                        }
                        ?>
                    </div>
                    <input name="username" type="text" placeholder="username">
                    <input name="email" type="text" placeholder="email">
                    <input name="password" type="password" placeholder="password">
                    <input name="password-repeate" type="password" placeholder="repeate password">
                    <button>sign up</button>
                </form>
            </div>
            
            <div class="log-in-form">
                <form id="log-in-form" action="login" method="POST">
                    <div class="messages">
                        <?php 
                            if (isset($login_messages)){
                                foreach($login_messages as $message){
                                    echo $message;
                                }
                            }
                        ?>
                    </div>
                    <input name="email" type="text" placeholder="email">
                    <input name="password" type="password" placeholder="password">
                    <button>log in</button>
                </form>
            </div>
            
        </div>
    </div>
</body>
</html>