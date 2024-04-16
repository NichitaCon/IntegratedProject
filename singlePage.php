<?php
require_once "./author.php";
require_once "./category.php";
require_once "./location.php";
require_once "./story.php";
 
$myId = $_GET['id'];
 
$singleStory = Story::findById($myId);
$category = Category::findById($singleStory->category_id);
$author = Author::findById($singleStory->author_id);
?>
 
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
    <link rel="stylesheet" href="CSS/singlePageStyle.css" />
    <title>Global Lens</title>
</head>
<body>
    <header>
        <a href="index.php"><h1>Global lens</h1></a>
    </header>

    <div class="container">
        <div class="width-4 newsImage">
            <img class="portrude" src="images/<?= $singleStory->img_url ?>" />
        </div>
        <div class="width-8">
            <div class="article">
                <!-- <h3><?= $category->name ?></h3> -->
                <h2><?= $singleStory->headline ?></h2>
                <div class="text">
                    <?= $singleStory->article ?>
                </div>
                <p class="author"><?= "By " . $author->first_name . " " . $author->last_name ?></p>
            </div>
        </div>
    </div>

    <footer>
        Footer!
    </footer>
</body>
</html>

