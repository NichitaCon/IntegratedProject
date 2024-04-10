<?php
require_once "./author.php";
require_once "./category.php";
require_once "./location.php";
require_once "./story.php";
 
$myId = $_GET['id'];
 
$movieRow = Story::findById($myId);
$category = Category::findById($movieRow->category_id);
$author = Author::findById($movieRow->author_id);
?>
 
<html lang="en">
<head>
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="CSS/reset.css" />
<link rel="stylesheet" href="CSS/grid.css" />
<link rel="stylesheet" href="CSS/style.css" />
<link rel="stylesheet" href="CSS/main_article.css" />

<title>newspaper</title>


</head>
<body>
<div class="container">
<div class="width-7">
<div class="article">
<h3><?= $category->name ?></h3>
<a href="singlePage.php?id=<?= $movieRow->id ?>"><h2><?= $movieRow->headline ?></h2></a>
<div class="imgage"><img src="<?= $movieRow->img_url ?>" /></div>
<div class="text"><?= $movieRow->article ?></div>
<a><?= $author->first_name . " " . $author->last_name . " in " . Location::findById($movieRow->location_id)->name ?></a>
</div>
</div>
</div>
</body>
</html>

