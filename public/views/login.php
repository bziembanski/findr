<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="public/css/reset.css">
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <title>LOGIN PAGE</title>
</head>
<body>
    <div class="container login">
        <div class="logo-container">
            <div class="logo-svg">
                <img src="public/img/logo.svg">
            </div>
            <div class="logo-text">find new gamer friends</div>
        </div>
        <div class="forms-container">
            <div class="sing-up-form">
                <form>
                    <input name="username" type="text" placeholder="username">
                    <input name="email" type="text" placeholder="email">
                    <input name="password" type="password" placeholder="password">
                    <input name="password-repeate" type="password" placeholder="repeate password">
                    <button>sign up</button>
                </form>
            </div>
            
            <div class="log-in-form">
                <form action="login" method="POST">
                    <div class="messages">
                        <?php 
                            if (isset($messages)){
                                foreach($messages as $message){
                                    echo $message;
                                }
                            }
                        ?>
                    </div>
                    <input name="username-email" type="text" placeholder="email or username">
                    <input name="password" type="password" placeholder="password">
                    <button>log in</button>
                </form>
            </div>
            
        </div>
    </div>
</body>
</html>