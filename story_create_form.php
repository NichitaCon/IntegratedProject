<?php
require_once "./author.php";
require_once "./category.php";
require_once "./location.php";
require_once "./story.php";
require_once "etc/global.php";


if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
echo "<pre>";
if (array_key_exists("form-data", $_SESSION)) {
    print_r($_SESSION["form-data"]);
}
if (array_key_exists("form-errors", $_SESSION)) {
    print_r($_SESSION["form-errors"]);
}
echo "</pre>";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
        <link
            href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap"
            rel="stylesheet">
        <link rel="stylesheet" href="CSS/reset.css" />
        <link rel="stylesheet" href="CSS/grid.css" />
        <link rel="stylesheet" href="CSS/style.css" />
        <title>Story - Create Form</title>
    </head>
    <header>
        <a href="index.php"><h1>Global lens</h1></a>
    </header>
    <body>
        <?php if (array_key_exists("flash", $_SESSION)) { ?>
            <p class="flash <?= $_SESSION["flash"]["type"] ?>">
            <?= $_SESSION["flash"]["message"] ?>
        </p>
        <?php unset($_SESSION["flash"]); ?>
        <?php } ?>
        <div class="container newStory">
            <h2 class="width-12">Create new story</h2>
            <form action="stories_store.php" method="POST">
                <p>
                    Headline: 
                    <input type="text" name="headline" value="<?= old("headline") ?>">
                    <span class="error"><?= error("headline") ?><span>
                </p>
                <p>
                    article: 
                    <input type="text" name="article" value="<?= old("article") ?>">
                    <span class="error"><?= error("article") ?><span> 
                </p>
                <p>
                    img url: 
                    <input type="text" name="img_url" value="<?= old("img_url") ?>">
                    <span class="error"><?= error("img_url") ?><span>
                </p>
                <p>
                    First Name: 
                    <input type="text" name="first_name" value="<?= old("first_name") ?>">
                    <span class="error"><?= error("first_name") ?></span>
                </p>
                <p>
                    Last Name: 
                    <input type="text" name="last_name" value="<?= old("last_name") ?>">
                    <span class="error"><?= error("last_name") ?></span>
                </p>
                <!-- <p>
                    author_id: 
                    <input type="text" name="author_id" value="<?= old("author_id") ?>">
                    <span class="error"><?= error("author_id") ?><span>
                </p> -->
                <p>
                    Category Name:
                    <input type="text" name="category_name" value="<?= old("category_name") ?>">
                    <span class="error"><?= error("category_name") ?></span>
                </p>
                <p>
                    created at: 
                    <input type="text" name="created_at" value="<?= old("created_at") ?>">
                    <span class="error"><?= error("created_at") ?><span>
                </p>
                <button type="submit" class="StoreButton">Store</button>
            </form>
        </div>
        
    </body>
    <footer class="storeFooter">
        <div class="container">
            <div class="width-3">
                <img src="./images/iadtLogo.png" alt="">
            </div>
            <div class="width-5"></div>
            <div class="width-4 flexy">
            <p>Made by Nichita Condrea</p>
            <a href="debug.php">Link to "debugging/test" site</a>
            </div>
        </div>
    </footer>
</html>
<?php
if (array_key_exists("form-data", $_SESSION)) {
    unset($_SESSION["form-data"]);
}
if (array_key_exists("form-errors", $_SESSION)) {
    unset($_SESSION["form-errors"]);
}
?>