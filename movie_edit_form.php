<?php
require_once './etc/config.php';
require_once './etc/global.php';

try {
    if ($_SERVER["REQUEST_METHOD"] !== "GET") {
        throw new Exception("Invalid request method");
    }

    if (array_key_exists("id", $_GET)) {
        $id = $_GET["id"];
        $movie = Movie::findById($id);
        if ($movie === null) {
            throw new Exception("Movie not found");
        }
        $genre = explode(",", $movie->genre);
    } else {
        throw new Exception("Missing parameter: movie id");
    }

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
} catch (Exception $ex) {
    echo $ex->getMessage();
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" hret="styles/main.css" />
    <title>Edit Movie Form</title>
</head>

<body>
    <?php if (array_key_exists("flash", $_SESSION)) { ?>
        <p class="flash <?= $_SESSION["flash"]["type"] ?>">
            <? $_SESSION["flash"]["message"] ?>
        </p>
        <?php unset($_SESSION["flash"]); ?>
    <?php } ?>
    <h2>Edit movie</h2>
    <form action="movie_update.php" method="POST">
        <input type="hidden" name="id" value="<?= $movie->id ?>">
        <p>
            Name:
            <input type="text" name="title" value="<?= old("title", $movie->title) ?>">
            <span class="error">
                <?= error("title") ?><span>
        </p>
        <p>
            genre:
            <select name="genre">
                <option value="">Please choose a category...</option>"
                <option value="Action" <?= chosen("genre", "Action", $movie->genre) ? "selected" : "" ?>>Action</option>
                <option value="Adventure" <?= chosen("genre", "Adventure", $movie->genre) ? "selected" : "" ?>>Adventure
                </option>
                <option value="Comedy" <?= chosen("genre", "Comedy", $movie->genre) ? "selected" : "" ?>>Comedy</option>
                <option value="Crime" <?= chosen("genre", "Crime", $movie->genre) ? "selected" : "" ?>>Crime</option>
                <option value="Drama" <?= chosen("genre", "Drama", $movie->genre) ? "selected" : "" ?>>Drama</option>
                <option value="Family" <?= chosen("genre", "Family", $movie->genre) ? "selected" : "" ?>>Family</option>
                <option value="Fantasy" <?= chosen("genre", "Fantasy", $movie->genre) ? "selected" : "" ?>>Fantasy
                </option>
                <option value="Horror" <?= chosen("genre", "Horror", $movie->genre) ? "selected" : "" ?>>Horror</option>
                <option value="Mystery" <?= chosen("genre", "Mystery", $movie->genre) ? "selected" : "" ?>>Mystery
                </option>
                <option value="Romance" <?= chosen("genre", "Romance", $movie->genre) ? "selected" : "" ?>>Romance
                </option>
                <option value="Science Fiction" <?= chosen("genre", "Science Fiction", $movie->genre) ? "selected" : "" ?>>Science Fiction</option>
                <option value="Triller" <?= chosen("genre", "Triller", $movie->genre) ? "selected" : "" ?>>Triller
                </option>
            </select>
            <span class="error">
                <?= error("genre") ?><span>
        </p>

        <p>
            year:
            <input type="text" name="year" value="<?= old("year", $movie->year) ?>">
            <span class="error">
                <?= error("year") ?><span>
        </p>

        <p>
            Box Office (millions):
            <input type="text" name="box_office" value="<?= old("box_office", $movie->box_office) ?>">
            <span class="error">
                <?= error("box_office") ?><span>
        </p>

        <p>
            Director:
            <select name="director_id">
                <option value="">Please choose a director...</option>
                <option value="1" <?= chosen("director_id", "1", $movie->director_id) ? "selected" : "" ?>>Steven
                    Spielberg</option>
                <option value="2" <?= chosen("director_id", "2", $movie->director_id) ? "selected" : "" ?>>David Fincher
                </option>
                <option value="3" <?= chosen("director_id", "3", $movie->director_id) ? "selected" : "" ?>>Christopher
                    Nolan</option>
                <option value="4" <?= chosen("director_id", "4", $movie->director_id) ? "selected" : "" ?>>Quentin
                    Tarantino</option>
                <option value="5" <?= chosen("director_id", "5", $movie->director_id) ? "selected" : "" ?>>Peter Jackson
                </option>
                <option value="6" <?= chosen("director_id", "6", $movie->director_id) ? "selected" : "" ?>>Martin
                    Scorsese</option>
                <option value="7" <?= chosen("director_id", "7", $movie->director_id) ? "selected" : "" ?>>Tim Burton
                </option>
                <option value="8" <?= chosen("director_id", "8", $movie->director_id) ? "selected" : "" ?>>Robert
                    Zemeckis</option>
                <option value="9" <?= chosen("director_id", "9", $movie->director_id) ? "selected" : "" ?>>Ridley Scott
                </option>
                <option value="10" <?= chosen("director_id", "10", $movie->director_id) ? "selected" : "" ?>>Bryan Singer
                </option>
                <option value="11" <?= chosen("director_id", "11", $movie->director_id) ? "selected" : "" ?>>Chris
                    Columbus</option>
            </select>
            <span class="error">
                <?= error("director_id") ?><span>
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
</body>

</html>