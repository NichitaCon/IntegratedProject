<?php
require_once "./author.php";
require_once "./category.php";
require_once "./location.php";
require_once "./story.php";

$mainStory = Story::findAll($options = array('limit' => 25, 'offset' => 0));



$photoBlock = Story::findByCategory(1, $options = array('limit' => 5, 'offset' => 0));

$photoBlockS1 = $photoBlock[0];
$photoBlockS2 = $photoBlock[1];
$photoBlockS3 = $photoBlock[2];
$photoBlockS4 = $photoBlock[3];
$photoBlockS5 = $photoBlock[4];

$techBlock = Story::findByCategory(2, $options = array('limit' => 5, 'offset' => 0));

$techBlockS1 = $techBlock[0];
$techBlockS2 = $techBlock[1];
$techBlockS3 = $techBlock[2];
$techBlockS4 = $techBlock[3];
$techBlockS5 = $techBlock[4];

$socialBlock = Story::findByCategory(3, $options = array('limit' => 5, 'offset' => 0));

$socialBlockS1 = $socialBlock[0];
$socialBlockS2 = $socialBlock[1];
$socialBlockS3 = $socialBlock[2];
$socialBlockS4 = $socialBlock[3];
$socialBlockS5 = $socialBlock[4];

$worldBlock = Story::findByCategory(4, $options = array('limit' => 5, 'offset' => 0));

$worldBlockS1 = $worldBlock[0];
$worldBlockS2 = $worldBlock[1];
$worldBlockS3 = $worldBlock[2];
$worldBlockS4 = $worldBlock[3];
$worldBlockS5 = $worldBlock[4];

$psychBlock = Story::findByCategory(5, $options = array('limit' => 5, 'offset' => 0));

$psychBlockS1 = $psychBlock[0];
$psychBlockS2 = $psychBlock[1];
$psychBlockS3 = $psychBlock[2];
$psychBlockS4 = $psychBlock[3];
$psychBlockS5 = $psychBlock[4];

// echo $socialBlockS1->headline;


$authorId = 7;
$stories = Story::findByAuthor($authorId, $options = array('limit' => 3, 'offset' => 2));

// $myId = 5;
// $mainStory = Story::findById($myId);

$mainStoryID1 = 8;
$mainStoryID2 = 7;
$mainStoryID3 = 13;
$mainStoryID4 = 14;
$mainStoryID5 = 18;
$mainStoryID6 = 21;
$mainStoryID7 = 1;

$mainStory1 = Story::findById($mainStoryID1);
$mainStory2 = Story::findById($mainStoryID2);
$mainStory3 = Story::findById($mainStoryID3);
$mainStory4 = Story::findById($mainStoryID4);
$mainStory5 = Story::findById($mainStoryID5);
$mainStory6 = Story::findById($mainStoryID6);
$mainStory7 = Story::findById($mainStoryID7);

// echo $mainStory1->headline;
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
    <title>Global Lens</title>
</head>

<body>
    <header>
        <h1>Global lens</h1>
    </header>
    <section class="add_new">
        <div class="container">
            <a href="index(php).php">link to other site</a>
        </div>
    </section>
    <section class="topStory">
        <div class="container">
            <div class="width-12 flex">
            <!-- largeComponent -->
            <?php foreach($photoBlock as $key => $value) { ?>

                <?php if($key==2 || $key==3) { ?>
                    <a href="singlepage.php?id=<?=$value->id ?>" class="portrude largeComponent">
                <?php } else { ?>
                    <a href="singlepage.php?id=<?=$value->id ?>" class="portrude longComponent">
                <?php } ?>

                    <style>
                        .topStory .largeComponent {
                            background-image: url("images/<?= $value->img_url ?>");
                        }
                    </style>
                <div class="whiteBox">
                    <h2><?= substr($value->headline, 0, 63) ?></h2>
                    <div class="category">
                        <p class="author"><?= Author::findById($value->author_id)->first_name . " " . Author::findById($value->author_id)->last_name ?></p>
                        <p class="date"><?= substr($value->created_at, 0, 52) ?></p>
                    </div>
                </div>
            </a>
                    <?php } ?>
            <!-- tallComponent -->
          
                    </div>
        </div>
    </section>


    <section class="topStory">
        <div class="container">
            <!-- largeComponent -->
            <a href="singlepage.php?id=<?=$mainStory1->id ?>" class="width-6 portrude largeComponent">
                    <style>
                        .topStory .largeComponent {
                            background-image: url("images/<?= $mainStory1->img_url ?>");
                        }
                    </style>
                <div class="whiteBox">
                    <h2><?= substr($mainStory1->headline, 0, 63) ?></h2>
                    <div class="category">
                        <p class="author"><?= Author::findById($mainStory1->author_id)->first_name . " " . Author::findById($mainStory1->author_id)->last_name ?></p>
                        <p class="date"><?= substr($mainStory1->created_at, 0, 52) ?></p>
                    </div>
                </div>
            </a>

            <!-- tallComponent -->
            <a href="singlepage.php?id=<?=$mainStory2->id ?>" class="width-3 portrude tallComponent">
                    <style>
                        .topStory .tallComponent {
                            background-image: url("images/<?= $mainStory2->img_url ?>");
                        }
                    </style>
                <div class="whiteBox">
                    <h2><?= substr($mainStory2->headline, 0, 63) ?></h2>
                    <div class="category">
                        <p class="author"><?= Author::findById($mainStory2->author_id)->first_name . " " . Author::findById($mainStory2->author_id)->last_name ?></p>
                        <p class="date"><?= substr($mainStory2->created_at, 0, 52) ?></p>
                    </div>
                </div>
            </a>

            <div class="width-3 space-between">
                <!-- cardComponent -->
                <a href="singlepage.php?id=<?=$mainStory3->id ?>" class="width-3 portrude cardComponent ver1">
                    <style>
                        .topStory .cardComponent.ver1 {
                            background-image: url("images/<?= $mainStory3->img_url ?>");
                        }
                    </style>
                    <div class="whiteBox">
                    <h2><?= substr($mainStory3->headline, 0, 63) ?></h2>
                    <div class="category">
                        <p class="author"><?= Author::findById($mainStory3->author_id)->first_name . " " . Author::findById($mainStory3->author_id)->last_name ?></p>
                        <p class="date"><?= substr($mainStory3->created_at, 0, 52) ?></p>
                    </div>
                </div>
                </a>

                <!-- mediumComponent -->
                <a href="singlepage.php?id=<?=$mainStory4->id ?>" class="width-3 portrude mediumComponent ver1">
                    <style>
                        .topStory .mediumComponent.ver1 {
                            background-image: url("images/<?= $mainStory4->img_url ?>");
                        }
                    </style>
                    <div class="whiteBox">
                        <h2><?= substr($mainStory4->headline, 0, 63) ?></h2>
                        <div class="category">
                            <p class="author"><?= Author::findById($mainStory4->author_id)->first_name . " " . Author::findById($mainStory4->author_id)->last_name ?></p>
                            <p class="date"><?= substr($mainStory4->created_at, 0, 52) ?></p>
                        </div>
                    </div>
                </a>
            </div>

            <!-- mediumComponent -->
            <a href="singlepage.php?id=<?=$mainStory5->id ?>" class="width-3 portrude mediumComponent ver2">
            <style>
                        .topStory .mediumComponent.ver2 {
                            background-image: url("images/<?= $mainStory5->img_url ?>");
                        }
                    </style>
                <div class="whiteBox">
                    <h2><?= substr($mainStory5->headline, 0, 63) ?></h2>
                    <div class="category">
                        <p class="author"><?= Author::findById($mainStory5->author_id)->first_name . " " . Author::findById($mainStory5->author_id)->last_name ?></p>
                        <p class="date"><?= substr($mainStory5->created_at, 0, 52) ?></p>
                    </div>
                </div>
            </a>

            <!-- longComponent -->
            <a href="singlepage.php?id=<?=$mainStory6->id ?>" class="width-6 portrude longComponent">
                    <style>
                        .topStory .longComponent {
                            background-image: url("images/<?= $mainStory6->img_url ?>");
                        }
                    </style>
                <div class="whiteBox">
                    <h2><?= substr($mainStory6->headline, 0, 63) ?></h2>
                    <div class="category">
                        <p class="author"><?= Author::findById($mainStory6->author_id)->first_name . " " . Author::findById($mainStory6->author_id)->last_name ?></p>
                        <p class="date"><?= substr($mainStory6->created_at, 0, 52) ?></p>
                    </div>
                </div>
            </a>
            <!-- cardComponent -->
            <a href="singlepage.php?id=<?=$mainStory7->id ?>" class="width-3 portrude cardComponent ver2">
                    <style>
                        .topStory .cardComponent.ver2 {
                            background-image: url("images/<?= $mainStory7->img_url ?>");
                        }
                    </style>
                <div class="whiteBox">
                    <h2><?= substr($mainStory7->headline, 0, 63) ?></h2>
                    <div class="category">
                        <p class="author"><?= Author::findById($mainStory7->author_id)->first_name . " " . Author::findById($mainStory7->author_id)->last_name ?></p>
                        <p class="date"><?= substr($mainStory7->created_at, 0, 52) ?></p>
                    </div>
                </div>
            </a>
        </div>
    </section>



    <!-- Photography section -->
    <section class="Photography whiteBG">
        <div class="container">
            <h2 class="sub-title width-12">
                Photography
            </h2>
            <!-- Tall component left side 1-->
            <?php { ?>
                    
                <a href="singlepage.php?id=<?=$photoBlockS1->id ?>" class="width-3 portrude tallComponent ver1">  
                    <style>
                        .Photography .tallComponent {
                            background-image: url("images/<?= $photoBlockS1->img_url ?>");
                        }
                    </style>
                    <div class="whiteBox">
                        <h2><?= substr($photoBlockS1->headline, 0, 63) ?></h2>
                        <div class="category">
                            <p class="author">
                                <?= Author::findById($photoBlockS1->author_id)->first_name . " " . Author::findById($photoBlockS1->author_id)->last_name ?>
                            </p>
                            <p class="date"><?= substr($photoBlockS1->created_at, 0, 52) ?></p>
                        </div>
                    </div>
                </a>
                
                <?php } ?>
            

            <!-- Top section -->
            <div class="width-9 combined">
                <div class="width-9 holder top">
                    <a href="singlepage.php?id=<?=$photoBlockS2->id ?>" class="width-3 portrude mediumComponent">
                        <style>
                            .Photography .mediumComponent {
                                background-image: url("images/<?= $photoBlockS2->img_url ?>");
                            }
                        </style>
                        <div class="whiteBox">
                            <h2><?= substr($photoBlockS2->headline, 0, 63) ?></h2>
                            <div class="category">
                                <p class="author">
                                    <?= Author::findById($photoBlockS2->author_id)->first_name . " " . Author::findById($photoBlockS2->author_id)->last_name ?>
                                </p>
                                <p class="date"><?= substr($photoBlockS2->created_at, 0, 52) ?></p>
                            </div>
                        </div>

                    </a>

                    <a href="singlepage.php?id=<?=$photoBlockS3->id ?>" class="width-6 portrude longComponent ver1">
                        <style>
                            .Photography .longComponent.ver1 {
                                background-image: url("images/<?= $photoBlockS3->img_url ?>");
                            }
                        </style>
                        <div class="whiteBox">
                            <h2><?= substr($photoBlockS3->headline, 0, 63) ?></h2>
                            <div class="category">
                                <p class="author">
                                    <?= Author::findById($photoBlockS3->author_id)->first_name . " " . Author::findById($photoBlockS3->author_id)->last_name ?>
                                </p>
                                <p class="date"><?= substr($photoBlockS3->created_at, 0, 52) ?></p>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- bottom section -->
                <div class="width-9 holder">
                    <a href="singlepage.php?id=<?=$photoBlockS4->id ?>" class="width-6 portrude longComponent ver2">
                        <style>
                            .Photography .longComponent.ver2 {
                                background-image: url("images/<?= $photoBlockS4->img_url ?>");
                            }
                        </style>
                        <div class="whiteBox">
                            <h2><?= substr($photoBlockS4->headline, 0, 63) ?></h2>
                            <div class="category">
                                <p class="author">
                                    <?= Author::findById($photoBlockS4->author_id)->first_name . " " . Author::findById($photoBlockS4->author_id)->last_name ?>
                                </p>
                                <p class="date"><?= substr($photoBlockS4->created_at, 0, 52) ?></p>
                            </div>
                        </div>
                    </a>

                    <!-- cardComponent -->
                    <a href="singlepage.php?id=<?=$photoBlockS1->id ?>" class="width-3 portrude cardComponent">
                        <style>
                            .Photography .cardComponent {
                                background-image: url("images/<?= $photoBlockS5->img_url ?>");
                            }
                        </style>
                        <div class="whiteBox">
                            <h2><?= substr($photoBlockS5->headline, 0, 63) ?></h2>
                            <div class="category">
                                <p class="author">
                                    <?= Author::findById($photoBlockS5->author_id)->first_name . " " . Author::findById($photoBlockS5->author_id)->last_name ?>
                                </p>
                                <p class="date"><?= substr($photoBlockS5->created_at, 0, 52) ?></p>
                            </div>
                        </div>
                    </a>
                </div>

            </div>


        </div>
    </section>

    <!-- technology section -->
    <section class="technology">
        <div class="container">
            <h2 class="sub-title width-12">
                Technology
            </h2>

            <!-- Top section -->
            <div class="width-9 combined">
                <div class="width-9 holder top">

                    <a href="singlepage.php?id=<?=$techBlockS2->id ?>" class="width-3 portrude mediumComponent">
                        <style>
                            .technology .mediumComponent {
                                background-image: url("images/<?= $techBlockS2->img_url ?>");
                            }
                        </style>
                        <div class="whiteBox">
                            <h2><?= substr($techBlockS2->headline, 0, 63) ?></h2>
                            <div class="category">
                                <p class="author">
                                    <?= Author::findById($techBlockS2->author_id)->first_name . " " . Author::findById($techBlockS2->author_id)->last_name ?>
                                </p>
                                <p class="date"><?= substr($techBlockS2->created_at, 0, 52) ?></p>
                            </div>
                        </div>

                    </a>

                    <a href="singlepage.php?id=<?=$techBlockS3->id ?>" class="width-6 portrude longComponent ver1">
                        <style>
                            .technology .longComponent.ver1 {
                                background-image: url("images/<?= $techBlockS3->img_url ?>");
                            }
                        </style>
                        <div class="whiteBox">
                            <h2><?= substr($techBlockS3->headline, 0, 63) ?></h2>
                            <div class="category">
                                <p class="author">
                                    <?= Author::findById($techBlockS3->author_id)->first_name . " " . Author::findById($techBlockS3->author_id)->last_name ?>
                                </p>
                                <p class="date"><?= substr($techBlockS3->created_at, 0, 52) ?></p>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- bottom section -->
                <div class="width-9 holder">

                    <a href="singlepage.php?id=<?=$techBlockS4->id ?>" class="width-6 portrude longComponent ver2">
                        <style>
                            .technology .longComponent.ver2 {
                                background-image: url("images/<?= $techBlockS4->img_url ?>");
                            }
                        </style>
                        <div class="whiteBox">
                            <h2><?= substr($techBlockS4->headline, 0, 63) ?></h2>
                            <div class="category">
                                <p class="author">
                                    <?= Author::findById($techBlockS4->author_id)->first_name . " " . Author::findById($techBlockS4->author_id)->last_name ?>
                                </p>
                                <p class="date"><?= substr($techBlockS4->created_at, 0, 52) ?></p>
                            </div>
                        </div>
                    </a>

                    <!-- cardComponent -->
                    <a href="singlepage.php?id=<?=$techBlockS1->id ?>" class="width-3 portrude cardComponent">
                        <style>
                            .technology .cardComponent {
                                background-image: url("images/<?= $techBlockS1->img_url ?>");
                            }
                        </style>
                        <div class="whiteBox">
                            <h2><?= substr($techBlockS1->headline, 0, 63) ?></h2>
                            <div class="category">
                                <p class="author">
                                    <?= Author::findById($techBlockS1->author_id)->first_name . " " . Author::findById($techBlockS1->author_id)->last_name ?>
                                </p>
                                <p class="date"><?= substr($techBlockS1->created_at, 0, 52) ?></p>
                            </div>
                        </div>
                    </a>
                </div>

            </div>

            <!-- Tall component right side -->
                <a href="singlepage.php?id=<?=$techBlockS5->id ?>" class="width-3 portrude tallComponent ver1">
                    <style>
                        .technology .tallComponent {

                            background-image: url("images/<?= $techBlockS5->img_url ?>");

                        }
                    </style>
                    <div class="whiteBox">
                        <h2><?= substr($techBlockS5->headline, 0, 63) ?></h2>
                        <div class="category">
                            <p class="author">
                                <?= Author::findById($techBlockS5->author_id)->first_name . " " . Author::findById($techBlockS5->author_id)->last_name ?>
                            </p>
                            <p class="date"><?= substr($techBlockS5->created_at, 0, 52) ?></p>
                        </div>
                    </div>
                </a>


        </div>
    </section>

    <!-- social section -->
    <section class="social whiteBG">
        <div class="container">
            <h2 class="sub-title width-12">
                Social media
            </h2>
            <!-- Tall component left side 1-->
                <a href="singlepage.php?id=<?=$socialBlockS1->id ?>" class="width-3 portrude tallComponent ver1">
                    <style>
                        .social .tallComponent {

                            background-image: url("images/<?= $socialBlockS1->img_url ?>");

                        }
                    </style>
                    <div class="whiteBox">
                        <h2><?= substr($socialBlockS1->headline, 0, 62) ?></h2>
                        <div class="category">
                            <p class="author">
                                <?= Author::findById($socialBlockS1->author_id)->first_name . " " . Author::findById($socialBlockS1->author_id)->last_name ?>
                            </p>
                            <p class="date"><?= substr($socialBlockS1->created_at, 0, 52) ?></p>
                        </div>
                    </div>
                </a>

            <!-- Top section -->
            <div class="width-9 combined">
                
                <div class="width-9 holder top">

                    <a href="singlepage.php?id=<?=$socialBlockS2->id ?>" class="width-3 portrude mediumComponent">
                        <style>
                            .social .mediumComponent {
                                background-image: url("images/<?= $socialBlockS2->img_url ?>");
                            }
                        </style>
                        <div class="whiteBox">
                            <h2><?= substr($socialBlockS2->headline, 0, 63) ?></h2>
                            <div class="category">
                                <p class="author">
                                    <?= Author::findById($socialBlockS2->author_id)->first_name . " " . Author::findById($socialBlockS2->author_id)->last_name ?>
                                </p>
                                <p class="date"><?= substr($socialBlockS2->created_at, 0, 52) ?></p>
                            </div>
                        </div>

                    </a>

                    <a href="singlepage.php?id=<?=$socialBlockS3->id ?>" class="width-6 portrude longComponent ver1">
                        <style>
                            .social .longComponent.ver1 {
                                background-image: url("images/<?= $socialBlockS3->img_url ?>");
                            }
                        </style>
                        <div class="whiteBox">
                            <h2><?= substr($socialBlockS3->headline, 0, 63) ?></h2>
                            <div class="category">
                                <p class="author">
                                    <?= Author::findById($socialBlockS3->author_id)->first_name . " " . Author::findById($socialBlockS3->author_id)->last_name ?>
                                </p>
                                <p class="date"><?= substr($socialBlockS3->created_at, 0, 52) ?></p>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- bottom section -->
                <div class="width-9 holder">
                    <a href="singlepage.php?id=<?=$socialBlockS4->id ?>" class="width-6 portrude longComponent ver2">
                        <style>
                            .social .longComponent.ver2 {
                                background-image: url("images/<?= $socialBlockS4->img_url ?>");
                            }
                        </style>
                        <div class="whiteBox">
                            <h2><?= substr($socialBlockS4->headline, 0, 63) ?></h2>
                            <div class="category">
                                <p class="author">
                                    <?= Author::findById($socialBlockS4->author_id)->first_name . " " . Author::findById($socialBlockS4->author_id)->last_name ?>
                                </p>
                                <p class="date"><?= substr($socialBlockS4->created_at, 0, 52) ?></p>
                            </div>
                        </div>
                    </a>

                    <!-- cardComponent -->
                    <a href="singlepage.php?id=<?=$socialBlockS5->id ?>" class="width-3 portrude cardComponent">
                        <style>
                            .social .cardComponent {
                                background-image: url("images/<?= $socialBlockS5->img_url ?>");
                            }
                        </style>
                        <div class="whiteBox">
                            <h2><?= substr($socialBlockS5->headline, 0, 70) ?></h2>
                            <div class="category">
                                <p class="author">
                                    <?= Author::findById($socialBlockS5->author_id)->first_name . " " . Author::findById($socialBlockS5->author_id)->last_name ?>
                                </p>
                                <p class="date"><?= substr($socialBlockS5->created_at, 0, 52) ?></p>
                            </div>
                        </div>
                    </a>
                </div>

            </div>


        </div>
    </section>


    <!-- world section -->
    <section class="world">
        <div class="container">
            <h2 class="sub-title width-12">
                World
            </h2>

            <!-- Top section -->
            <div class="width-9 combined">
                <div class="width-9 holder top">

                    <a href="singlepage.php?id=<?=$worldBlockS2->id ?>" class="width-3 portrude mediumComponent">
                        <style>
                            .world .mediumComponent {
                                background-image: url("images/<?= $worldBlockS2->img_url ?>");
                            }
                        </style>
                        <div class="whiteBox">
                            <h2><?= substr($worldBlockS2->headline, 0, 63) ?></h2>
                            <div class="category">
                                <p class="author">
                                    <?= Author::findById($worldBlockS2->author_id)->first_name . " " . Author::findById($worldBlockS2->author_id)->last_name ?>
                                </p>
                                <p class="date"><?= substr($worldBlockS2->created_at, 0, 52) ?></p>
                            </div>
                        </div>

                    </a>

                    <a href="singlepage.php?id=<?=$worldBlockS3->id ?>" class="width-6 portrude longComponent ver1">
                        <style>
                            .world .longComponent.ver1 {
                                background-image: url("images/<?= $worldBlockS3->img_url ?>");
                            }
                        </style>
                        <div class="whiteBox">
                            <h2><?= substr($worldBlockS3->headline, 0, 63) ?></h2>
                            <div class="category">
                                <p class="author">
                                    <?= Author::findById($worldBlockS3->author_id)->first_name . " " . Author::findById($worldBlockS3->author_id)->last_name ?>
                                </p>
                                <p class="date"><?= substr($worldBlockS3->created_at, 0, 52) ?></p>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- bottom section -->
                <div class="width-9 holder">
                    <a href="singlepage.php?id=<?=$worldBlockS4->id ?>" class="width-6 portrude longComponent ver2">
                        <style>
                            .world .longComponent.ver2 {
                                background-image: url("images/<?= $worldBlockS4->img_url ?>");
                            }
                        </style>
                        <div class="whiteBox">
                            <h2><?= substr($worldBlockS4->headline, 0, 63) ?></h2>
                            <div class="category">
                                <p class="author">
                                    <?= Author::findById($worldBlockS4->author_id)->first_name . " " . Author::findById($worldBlockS4->author_id)->last_name ?>
                                </p>
                                <p class="date"><?= substr($worldBlockS4->created_at, 0, 52) ?></p>
                            </div>
                        </div>
                    </a>

                    <!-- cardComponent -->
                    <a href="singlepage.php?id=<?=$worldBlockS1->id ?>" class="width-3 portrude cardComponent">
                        <style>
                            .world .cardComponent {
                                background-image: url("images/<?= $worldBlockS1->img_url ?>");
                            }
                        </style>
                        <div class="whiteBox">
                            <h2><?= substr($worldBlockS1->headline, 0, 63) ?></h2>
                            <div class="category">
                                <p class="author">
                                    <?= Author::findById($worldBlockS1->author_id)->first_name . " " . Author::findById($worldBlockS1->author_id)->last_name ?>
                                </p>
                                <p class="date"><?= substr($worldBlockS1->created_at, 0, 52) ?></p>
                            </div>
                        </div>
                    </a>
                </div>

            </div>

            <!-- Tall component right side -->
                <a href="singlepage.php?id=<?=$worldBlockS5->id ?>" class="width-3 portrude tallComponent ver1">
                    <style>
                        .world .tallComponent {
                            background-image: url("images/<?= $worldBlockS5->img_url ?>");
                        }
                    </style>
                    <div class="whiteBox">
                        <h2><?= substr($worldBlockS5->headline, 0, 63) ?></h2>
                        <div class="category">
                            <p class="author">
                                <?= Author::findById($worldBlockS5->author_id)->first_name . " " . Author::findById($worldBlockS5->author_id)->last_name ?>
                            </p>
                            <p class="date"><?= substr($worldBlockS5->created_at, 0, 52) ?></p>
                        </div>
                    </div>
                </a>


        </div>
    </section>

    <!-- psychology section -->
    <section class="psychology whiteBG">
        <div class="container">
            <h2 class="sub-title width-12">
                Psychology
            </h2>

            <!-- Tall component left side 1-->
                <a href="singlepage.php?id=<?=$psychBlockS5->id ?>" class="width-3 portrude tallComponent ver1">
                    <style>
                        .psychology .tallComponent {
                            background-image: url("images/<?= $psychBlockS5->img_url ?>");
                        }
                    </style>
                    <div class="whiteBox">
                        <h2><?= substr($psychBlockS5->headline, 0, 63) ?></h2>
                        <div class="category">
                            <p class="author">
                                <?= Author::findById($psychBlockS5->author_id)->first_name . " " . Author::findById($psychBlockS5->author_id)->last_name ?>
                            </p>
                            <p class="date"><?= substr($psychBlockS5->created_at, 0, 52) ?></p>
                        </div>
                    </div>
                </a>

            <!-- Top section -->
            <div class="width-9 combined">
                <div class="width-9 holder top">

                    <a href="singlepage.php?id=<?=$psychBlockS2->id ?>" class="width-3 portrude mediumComponent">
                        <style>
                            .psychology .mediumComponent {
                                background-image: url("images/<?= $psychBlockS2->img_url ?>");
                            }
                        </style>
                        <div class="whiteBox">
                            <h2><?= substr($psychBlockS2->headline, 0, 63) ?></h2>
                            <div class="category">
                                <p class="author">
                                    <?= Author::findById($psychBlockS2->author_id)->first_name . " " . Author::findById($psychBlockS2->author_id)->last_name ?>
                                </p>
                                <p class="date"><?= substr($psychBlockS2->created_at, 0, 52) ?></p>
                            </div>
                        </div>

                    </a>

                    <a href="singlepage.php?id=<?=$psychBlockS3->id ?>" class="width-6 portrude longComponent ver1">
                        <style>
                            .psychology .longComponent.ver1 {
                                background-image: url("images/<?= $psychBlockS3->img_url ?>");
                            }
                        </style>
                        <div class="whiteBox">
                            <h2><?= substr($psychBlockS3->headline, 0, 63) ?></h2>
                            <div class="category">
                                <p class="author">
                                    <?= Author::findById($psychBlockS3->author_id)->first_name . " " . Author::findById($psychBlockS3->author_id)->last_name ?>
                                </p>
                                <p class="date"><?= substr($psychBlockS3->created_at, 0, 52) ?></p>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- bottom section -->
                <div class="width-9 holder">
                    <a href="singlepage.php?id=<?=$psychBlockS4->id ?>" class="width-6 portrude longComponent ver2">
                        <style>
                            .psychology .longComponent.ver2 {
                                background-image: url("images/<?= $psychBlockS4->img_url ?>");
                            }
                        </style>
                        <div class="whiteBox">
                            <h2><?= substr($psychBlockS4->headline, 0, 63) ?></h2>
                            <div class="category">
                                <p class="author">
                                    <?= Author::findById($psychBlockS4->author_id)->first_name . " " . Author::findById($psychBlockS4->author_id)->last_name ?>
                                </p>
                                <p class="date"><?= substr($psychBlockS4->created_at, 0, 52) ?></p>
                            </div>
                        </div>
                    </a>

                    <!-- cardComponent -->
                    <a href="singlepage.php?id=<?=$psychBlockS1->id ?>" class="width-3 portrude cardComponent">
                        <style>
                            .psychology .cardComponent {
                                background-image: url("images/<?= $psychBlockS1->img_url ?>");
                            }
                        </style>
                        <div class="whiteBox">
                            <h2><?= substr($psychBlockS1->headline, 0, 63) ?></h2>
                            <div class="category">
                                <p class="author">
                                    <?= Author::findById($psychBlockS1->author_id)->first_name . " " . Author::findById($psychBlockS1->author_id)->last_name ?>
                                </p>
                                <p class="date"><?= substr($psychBlockS1->created_at, 0, 52) ?></p>
                            </div>
                        </div>
                    </a>
                </div>

            </div>


        </div>
    </section>

    <footer>
        Footer!
    </footer>
</body>

</html>