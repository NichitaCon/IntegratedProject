<?php

require_once "classes/FormValidator.php";
class StoryFormValidator extends FormValidator {
    public function __construct($data=[]) {
        parent::__construct($data);
    }

    public function validate() {
        if (!$this->isPresent("headline")) {
            $this->errors["headline"] = "Please enter a headline";
        }
        else if (!$this->minLength("headline", 6)) {
            $this->errors["headline"] = "Please enter a headline with at least 6 characters";
        }

        if (!$this->isPresent("article")) {
            $this->errors["article"] = "Please enter a article";
        }
        else if (!$this->minLength("article", 200)) {
            $this->errors["article"] = "Please enter a article with at least 200 characters";
        }



        
        // if (!$this->isPresent("year")) {
        //     $this->errors["year"] = "Please enter a year";
        // }
        // else if (!$this->isInteger("year")) {
        //     $this->errors["year"] = "year must be an integer";
        // }
        // else if (!$this->min("year", 1900)) {
        //     $this->errors["year"] = "year must be above the year 1900";
        // }

        if (!$this->isPresent("box_office")) {
            $this->errors["box_office"] = "Please enter a box_office";
        }
        else if (!$this->isInteger("box_office")) {
            $this->errors["box_office"] = "box_office must be an integer";
        }
        else if (!$this->min("box_office", 100)) {
            $this->errors["box_office"] = "box_office must be above the box_office 100";
        }

        $validGenre = ["Action", "Adventure", "Comedy", "Crime", "Drama", "Family", "Fantasy", "Horror", "Mystery", "Romance", "Science Fiction", "Triller" ];
        if (!$this->isPresent("genre")) {
            $this->errors["genre"] = "Please choose a genre";
        }
        else if (!$this->isElement("genre", $validGenre)) {
            $this->errors["genre"] = "Please choose a valid genre";
        }

        $validDirector = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11];
        if (!$this->isPresent("director_id")) {
            $this->errors["director_id"] = "Please choose a director";
        }
        else if (!$this->isElement("director_id", $validDirector)) {
            $this->errors["director_id"] = "Please choose a valid director";
        }
        

        return count($this->errors) === 0;
    }
}
?>