<?php 
class Movie {
    public $id;
    public $title;
    public $genre;
    public $year;
    public $box_office;
    public $director_id;

    public function __construct($props = null) {
        if ($props != null) {
            if (array_key_exists("id", $props)) {
                $this->id = $props["id"];
            }
            $this->title = $props["title"];
            $this->genre = $props["genre"];
            $this->year = $props["year"];
            $this->box_office = $props["box_office"];
            $this->director_id = $props["director_id"];
        }
    }

    public static function findAll() {
        $movies = array();

        try {
            $db = new DB();
            $conn = $db->open();

            $sql = "SELECT * FROM movies";
            $stmt = $conn->prepare($sql);
            $status = $stmt->execute();

            if (!$status) {
                $error_info = $stmt->errorInfo();
                $message = sprintf(
                    "SQLSTATE error code: %d; error message %s",
                    $error_info[0],
                    $error_info[2]
                );
                throw new Exception($message);
            }

            if ($stmt->rowCount() !== 0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                while ($row !== FALSE) {
                    $movie = new Movie($row);
                    $movies[] = $movie;

                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                }
            }
        }
        finally {
            if ($db !== null && $db->isOpen()) {
                $db->close();
            }
        }

        return $movies;
    }

    public static function findById($id) {
        $movie = null;
        try {
            $db = new DB();
            $conn = $db->open();
            $sql = "SELECT * FROM movies WHERE id = :id";
            $params = [
                ":id" => $id
            ];
            $stmt = $conn->prepare($sql);
            $status = $stmt->execute($params);
            if (!$status) {
                $error_info = $stmt->errorInfo();
                $message = sprintf(
                    "SQLSTATE error code: %d; error message: %s",
                    $error_info[0],
                    $error_info[2]
                );
                throw new Exception($message);
            }

            if ($stmt->rowCount() !== 0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $movie = new Movie($row);
            }
        }
        finally {
            if ($db !== null && $db->isOpen()) {
                $db->close();
            }
        }
        return $movie;
    }

    public function save() {
        try {
            $db = new DB();
            $conn = $db->open();

            $params = [
                ":title" => $this->title,
                ":genre" => $this->genre,
                ":year" => $this->year,
                ":box_office" => $this->box_office,
                ":director_id" => $this->director_id
            ];

            if ($this->id === null) {
                $sql =
                    "INSERT INTO movies " .
                    "(title, genre, year, box_office, director_id) VALUES " .
                    "(:title, :genre, :year, :box_office, :director_id)";
            }

            else {
                $sql = "UPDATE movies SET " .
                       "title = :title, " .
                       "genre = :genre, " .
                       "year = :year, " .
                       "box_office = :box_office, " .
                       "director_id = :director_id " .
                       "WHERE id = :id" ;

                $params[":id"] = $this->id;
            }
            $stmt = $conn->prepare($sql);
            $status = $stmt->execute($params);

            if (!$status) {
                $error_info = $stmt->errorInfo();
                $message = sprintf(
                    "SQLSTATE error code: %d; error message: %s",
                    $error_info[0],
                    $error_info[2]
                );
                throw new Exception($message);
            }
            if ($stmt->rowCount() !== 1) {
                throw new Exception("Failed to save movie.");
            }

            if ($this->id === null) {
                $this->id = $conn->lastInsertId();
            }
        }
        finally {
            if ($db !== null && $db->isOpen()) {
                $db->close();
            }
        }
    }

    public function delete() {
        $db = null;
        try {
            if ($this->id !== null) {
                $db = new DB();
                $conn = $db->open();

                $sql = "DELETE FROM movies WHERE id = :id" ;
                $params = [
                    ":id" => $this->id
                ];
                $stmt = $conn->prepare($sql);
                $status = $stmt->execute($params);

                if (!$status) {
                    $error_info = $stmt->errorInfo();
                    $message = sprintf(
                        "SQLSTATE error code: %d; error message: %s",
                        $error_info[0],
                        $error_info[2]
                    );
                    throw new Exception($message);
                }
                
                if ($stmt->rowCount() !== 1) {
                    throw new Exception("Failed to delete profile.");
                }
                $this->id = null;
            }
        }
        finally {
            if ($db !== null && $db->isOpen()) {
                $db->close();
            }
        }
    }
}
