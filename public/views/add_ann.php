<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("head.php")?>
    <title>ADD ANNOUNCEMENT PAGE</title>
</head>
<body>
<div class="container">
    <nav>
        <?php include("header.php")?>
    </nav>
    <main class="add-ann-main">
        <form action="/addAnn" method="POST" class="add-ann-inputs">
            <h1>Add Announcement</h1>
            <div class="messages">
                <?php
                if (isset($messages)){
                    foreach($messages as $message){
                        echo $message;
                    }
                }
                ?>
            </div>
            <label class="add-ann-game-name">Game name<input type="text" name="gameName"></label>
            <label class="add-ann-game-username">Ingame username<input type="text" name="gameUsername"></label>
            <label class="add-ann-desc">Description<textarea maxlength="100" placeholder="Tell us something about your play style, rank etc." name="desc"></textarea></label>
            <button>Add</button>
        </form>
    </main>
</div>
</body>
</html>