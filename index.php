<?php
require_once "./author.php";
require_once "./category.php";
require_once "./location.php";
require_once "./story.php";

$mainStorie = Story::findAll($options = array('limit' => 1, 'offset' => 9));

$travelBlock = Story::findByCategory(3, $options = array('limit' => 9, 'offset' => 0));

$photoBlock = Story::findByCategory(1, $options = array('limit' => 5, 'offset' => 0));

$photoBlockS1 = $photoBlock[0];
$photoBlockS2 = $photoBlock[1];
$photoBlockS3 = $photoBlock[2];
$photoBlockS4 = $photoBlock[3];
$photoBlockS5 = $photoBlock[4];

echo $photoBlockS2 -> img_url;


$authorId = 7;
$stories = Story::findByAuthor($authorId, $options = array('limit' => 3, 'offset' => 2));

$myId = 5;
$mainStory = Story::findById($myId);  
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
    <section class="components">
        <div class="container">
            <!-- largeComponent -->
            <div class="width-6 portrude largeComponent">
                <div class="whiteBox">
                    <h2>Strong US growth boosts expectation that Fed will delay cutting rates</h2>
                    <div class="category">
                        <p class="author">US interest rates</p>
                        <p class="date">3 HOURS AGO</p>
                    </div>
                </div>
            </div>

            <!-- tallComponent -->
            <div class="width-3 portrude tallComponent">
                <div class="whiteBox">
                    <h2>Strong US growth boosts expectation that Fed will delay cutting rates</h2>
                    <div class="category">
                        <p class="author">US interest rates</p>
                        <p class="date">3 HOURS AGO</p>
                    </div>
                </div>
            </div>

            <div class="width-3 space-between">
                <!-- cardComponent -->
                <div class="width-3 portrude cardComponent">
                    <div class="whiteBox">
                        <h2>Strong US growth boosts expectation that Fed will delay cutting rates</h2>
                        <div class="category">
                            <p class="author">US interest rates</p>
                            <p class="date">3 HOURS AGO</p>
                        </div>
                    </div>
                </div>

                <!-- mediumComponent -->
                <div class="width-3 portrude mediumComponent">
                    <div class="whiteBox">
                        <h2>Strong US growth boosts expectation that Fed will delay cutting rates</h2>
                        <div class="category">
                            <p class="author">US interest rates</p>
                            <p class="date">3 HOURS AGO</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- mediumComponent -->
            <div class="width-3 portrude mediumComponent">
                <div class="whiteBox">
                    <h2>Strong US growth boosts expectation that Fed will delay cutting rates</h2>
                    <div class="category">
                        <p class="author">US interest rates</p>
                        <p class="date">3 HOURS AGO</p>
                    </div>
                </div>
            </div>

            <!-- longComponent -->
            <div class="width-6 portrude longComponent">
                <div class="whiteBox">
                    <h2>Strong US growth boosts expectation that Fed will delay cutting rates</h2>
                    <div class="category">
                        <p class="author">US interest rates</p>
                        <p class="date">3 HOURS AGO</p>
                    </div>
                </div>
            </div>
            <!-- cardComponent -->
            <div class="width-3 portrude cardComponent">
                <div class="whiteBox">
                    <h2>Strong US growth boosts expectation that Fed will delay cutting rates</h2>
                    <div class="category">
                        <p class="author">US interest rates</p>
                        <p class="date">3 HOURS AGO</p>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- Photography session -->
    <section class="Photography">
        <div class="container">
            <h2 class="sub-title width-12">
                Photography
            </h2>

            <!-- Tall component left side 1-->
            <?php  { ?>
            <div class="width-3 portrude tallComponent">
                <style>
                    .tallComponent {
                        background-image: url("images/<?=$photoBlockS1 -> img_url ?>");
                    }
                </style>
                <div class="whiteBox">
                    <h2><?= substr($photoBlockS1->headline, 0 , 52) ?></h2>
                    <div class="category">
                        <p class="author"><?= Author::findById($photoBlockS1->author_id)->first_name . " " . Author::findById($photoBlockS1->author_id)->last_name ?></p>
                        <p class="date">3 HOURS AGO</p>
                    </div>
                </div>
                
            </div>

            <!-- Top section -->
            <div class="width-9 combined">
                <div class="width-9 holder top">
                    <div class="width-3 portrude mediumComponent">
                        <style>
                            .mediumComponent {
                                background-image: url("images/<?=$photoBlockS2 -> img_url ?>");
                            }
                        </style>
                        <div class="whiteBox">
                            <h2>Strong US growth boosts expectation that Fed will delay cutting rates</h2>
                            <div class="category">
                                <p class="author">US interest rates</p>
                                <p class="date">3 HOURS AGO</p>
                            </div>
                        </div>
                    </div>
                    <div class="width-6 portrude longComponent">
                        <style>
                            .longComponent {
                                background-image: url("images/<?=$photoBlockS3 -> img_url ?>");
                            }
                        </style>
                        <div class="whiteBox">
                            <h2>Strong US growth boosts expectation that Fed will delay cutting rates</h2>
                            <div class="category">
                                <p class="author">US interest rates</p>
                                <p class="date">3 HOURS AGO</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- bottom section -->
                <div class="width-9 holder">
                    <div class="width-6 portrude longComponent">
                        <div class="whiteBox">
                            <h2>Strong US growth boosts expectation that Fed will delay cutting rates</h2>
                            <div class="category">
                                <p class="author">US interest rates</p>
                                <p class="date">3 HOURS AGO</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- cardComponent -->
                    <div class="width-3 portrude cardComponent">
                        <div class="whiteBox">
                            <h2>Strong US growth boosts expectation that Fed will delay cutting rates</h2>
                            <div class="category">
                                <p class="author">US interest rates</p>
                                <p class="date">3 HOURS AGO</p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>


        </div>
    </section>
</body>

</html>