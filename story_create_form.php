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
        <link rel="stylesheet" href="styles/styles.css">
        <title>Movies - Create Form</title>
    </head>
    <body>
        <?php if (array_key_exists("flash", $_SESSION)) { ?>
            <p class="flash <?= $_SESSION["flash"]["type"] ?>">
            <?= $_SESSION["flash"]["message"] ?>
        </p>
        <?php unset($_SESSION["flash"]); ?>
        <?php } ?>
        <h2>Create Movie Form</h2>
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
                img_url: 
                <input type="text" name="img_url" value="<?= old("img_url") ?>">
                <span class="error"><?= error("img_url") ?><span>
            </p>
            <p>
                author_id: 
                <input type="text" name="author_id" value="<?= old("author_id") ?>">
                <span class="error"><?= error("author_id") ?><span>
            </p>
            <p>
                category:
                <select name="category_id">
                    <option value="">Please choose a category...</option>
                    <option value="1" <?= chosen("category_id", "1") ? "selected" : "" ?>>Photography</option>
                    <option value="2" <?= chosen("category_id", "2") ? "selected" : "" ?>>Technology</option>
                    <option value="3" <?= chosen("category_id", "3") ? "selected" : "" ?>>Social Media</option>
                    <option value="4" <?= chosen("category_id", "4") ? "selected" : "" ?>>World</option>
                    <option value="5" <?= chosen("category_id", "5") ? "selected" : "" ?>>Psychology</option>
                </select>
                <span class="error"><?= error("category_id") ?><span>
            </p>
            <p>
                created_at: 
                <input type="text" name="created_at" value="<?= old("created_at") ?>">
                <span class="error"><?= error("created_at") ?><span>
            </p>
            <button type="submit">Store</button>
        </form>
    </body>
</html>
<?php
if (array_key_exists("form-data", $_SESSION)) {
    unset($_SESSION["form-data"]);
}
if (array_key_exists("form-errors", $_SESSION)) {
    unset($_SESSION["form-errors"]);
}
?>