<?php
require_once "./author.php";
require_once "./category.php";
require_once "./location.php";
require_once "./story.php";

// $stories = Story::findAll($options = array('limit' => 2, 'offset' => 2));

// $authorId = 7;
// $stories = Story::findByAuthor($authorId, $options = array('limit' => 3, 'offset' => 2));  (offset changes the article)

// $categoryId = 4;
// $stories = Story::findByCategory($categoryId, $options = array('limit' => 3, 'offset' => 2));


 $movieRow = Story::findByCategory(2, $options = array('limit' => 4, 'offset' => 0));

 $musicVertical = Story::findByCategory(4, $options = array('limit' => 3, 'offset' => 0));

 $foodSection = Story::findByCategory(5, $options = array('limit' => 3, 'offset' => 0));
 
//  $stories = Story::findAll($options = array('limit' => 2, 'offset' => 2));

 $mainStorie = Story::findAll($options = array('limit' => 1, 'offset' => 9));

 $travelBlock = Story::findByCategory(3, $options = array('limit' => 9, 'offset' => 0));


 $myId = 5;
 $mainStory = Story::findById($myId);  

?>

<!-- <a href="singlePage.php/?id=<?=$s->id ?>">Hello</a> -->
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

    <header>
        <div class="header">
            <div class="container">
                <div class="width-12">
                    <h1>newsgram</h1>
                </div>     
            </div>
            <hr>
           </div>
        </div>
    </header>


    <!-- main this is our single story-->
    <div class="main_article">       
    <a href="singlePage.php/?id=<?=$s->id ?>"><h1><?= $mainStory->headline ?></h1></a>
        <?= substr($mainStory->article, 0 , 200) ?>
        
    </div> 
    <style>
        .main_article{
            height: 650px;
            background-image: url(<?= $mainStory->img_url ?>);
            background-repeat: no-repeat;
            background-size: cover;
        }

    </style>
    

    <!-- first section -->
    <div class="container">
    <?php foreach ($mainStorie as $s) { ?>
        <div class="newContainer width-7">
        <div class="width-7 article1">
        <img src="<?= $s->img_url ?>" alt="">
         <a href="singlePage.php/?id=<?=$s->id ?>"><h1><?= $s->headline ?></h1></a>
           <?= substr($s->article, 0 , 200) ?>
        </div>
        <?php } ?>
        </div>

        <div class="width-1">

        </div>
    
 <div class="grid4 width-4">
        <div class="vericalArticle ">
            <img src="images/img_id_4.jpg" alt="">
            <h3>Billie Eilish dresses as vintage Barbie for 2024 Grammys performance</h3>
    </div> 

    

           <!-- <div class="picture">
            <img src="images/img_id_21.webp" alt="">
        </div>
        <div class="vericalArticle">
            <p>ASTRONOMY</p>
            <h3>Astronomers have snapped a new photo of the black hole in galaxy M87</h3>
        </div>

        <div class="picture">
            <img src="images/img_id_6.jpg" alt="">
        </div>
        <div class="vericalArticle">
            <p>FILM</p>
            <h3>Tom Holland is playing Romeo in a ‘Romeo And Juliet’ stage production</h3>
        </div>  -->
      </div>
</div>  

    <!-- second section  -->
    <div class="article2">
        <div class="container">

        <?php foreach ($movieRow as $s) { ?>
            <div class="width-3"> 
                <?= Category::findById($s->category_id)->name ?>
                <img src="<?= $s->img_url ?>" alt="">
                <a href="singlePage.php/?id=<?=$s->id ?>"><h3><?= $s->headline ?></h3></a> 
                <p><?= substr($s->article,0,200) ?></p>
                <p><?= Author::findById($s->author_id)->first_name . " " . Author::findById($s->author_id)->last_name . " in " .
        Location::findById($s->location_id)->name ?></p>
            </div>

        <?php } ?>
        </div>
    </div>


    <!-- third sect --> 

    <div class="article3">
        <div class="container">
           
        <?php foreach ($travelBlock as $s) { ?>
            <div class="width-4 ">
            <?= Category::findById($s->category_id)->name ?>
                <img src="<?= $s->img_url ?>" alt="">
                    <a href="singlePage.php/?id=<?=$s->id ?>"><h4><?= $s->headline ?></h4></a>
            </div>
            <?php } ?>
         </div> 
    </div>  

    <!-- fourth section -->
    <div class="container">
    <?php foreach ($foodSection as $key => $value) { ?>
        
        <?php if  ($key%2 !=0):  ?>
             <div class="width-12 wideArticleRev">
        <?php else: ?>
            <div class="width-12 wideArticle">
        <?php endif; ?>
       
             <img src="<?= $value->img_url ?>" alt="">    
            <div class="content">
                <a href="singlePage.php/?id=<?=$s->id ?>"><h2><?= $value->headline ?></h2></a>
                <?= substr($value->article, 0 , 400) ?>
             </div> 
        </div>
    <?php } ?>  
    </div>

    <footer>
        <div class="footer">
            <div class="container">
                <div class="width-12">
                    
                </div>
            </div>
        </div>

    </footer>
</body>

</html>