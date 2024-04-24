<?php
require_once "./author.php";
require_once "./category.php";
require_once "./location.php";
require_once "./story.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$stories = Story::findAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/styles.css">
    <title>stories</title>
</head>
<body>
    <?php if (array_key_exists("flash", $_SESSION)) { ?>
        <p class="flash <?= $_SESSION["flash"]["type"] ?>">
            <?= $_SESSION["flash"]["message"] ?>
    </p>
    <?php unset($_SESSION["flash"]); ?>
    <?php } ?>
    <h2>stories</h2>
    <a href="index.php">Home</a>
    <p><a href="story_create_form.php">Create a new story</a></p>
    <?php if(empty($stories)){ ?>
        <p>There are no stories</p>
    <?php } else { ?>

        <table>
            <thead>
                <tr>
                    <th>id</th>
                    <th>headline</th>
                    <th>img_url</th>
                    <th>author_id</th>
                    <th>category_id</th>
                    <th>created_at</th>
                    <th>read_later</th>
                    <th>user_created</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($stories as $story) {?>
                    <tr>
                        <td><?= $story->id ?></td>
                        <td><?= $story->headline ?></td>
                        <td><?= $story->img_url ?></td>
                        <td><?= $story->author_id ?></td>
                        <td><?= $story->category_id ?></td>
                        <td><?= $story->created_at ?></td>
                        <td><?= $story->read_later ?></td>
                        <td><?= $story->user_created ?></td>
                    </tr>
                <?php }?>

            </tbody>
        </table>

    <?php } ?>
</body>
</html>