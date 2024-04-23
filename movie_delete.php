<?php
require_once './etc/config.php';
require_once './etc/global.php';

try {
    if ($_SERVER["REQUEST_METHOD"] !== "GET") {
        throw new Exception("Invalind request method");
    }

    if (array_key_exists("id", $_GET)) {
        $id = $_GET["id"];
        $movie = Movie::findById($id);
        if ($movie === null) {
            throw new Exception("Movie not found");
        }
    }
    else {
        throw new Exception("Missing parameter: movie id");
    }

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    $movie->delete();
    $_SESSION["flash"] = [
        "message" => "Movie deleted successfully",
        "type" => "success"
    ];
    redirect("index.php");
}
catch (Exception $ex) {
    echo $ex->getMessage();
    exit();
}

?>