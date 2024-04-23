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
    <p><a href="story_create_form.php">Create a new story</a></p>
    <?php if(empty($stories)){ ?>
        <p>There are no stories</p>
    <?php } else { ?>

        <table>
            <thead>
                <tr>
                    <th>headline</th>
                    <th></th>
                    <th>img_url</th>
                    <th>author_id</th>
                    <th>category_id</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach($stories as $story) {?>
                    <tr>
                        <td>
                        <a href="story_view.php?id=<?= $story->id ?>">
                            <?= $story->headline ?>
                        </a>
                        </td>
                        <td><?= $story->headline ?></td>
                        <td><?= $story->img_url ?></td>
                        <td><?= $story->author_id ?></td>
                        <td><?= $story->category_id ?></td>
                        <td>
                            <a href="story_edit_form.php?id=<?= $story->id ?>">Edit</a>
                            <a href="story_delete.php?id=<?= $story->id ?>">
                                Delete
                            </a>
                        </td>
                    </tr>
                <?php }?>

            </tbody>
        </table>

    <?php } ?>
</body>
</html>