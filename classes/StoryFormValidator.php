<?php

require_once "classes/FormValidator.php";
class StoryFormValidator extends FormValidator {
    public function __construct($data=[]) {
        parent::__construct($data);
    }

    public function validate() {

        //Headline
        if (!$this->isPresent("headline")) {
            $this->errors["headline"] = "Please enter a headline";
        }
        else if (!$this->minLength("headline", 6)) {
            $this->errors["headline"] = "Please enter a headline with at least 6 characters";
        }
        else if (!$this->maxLength("headline", 63)) {
            $this->errors["headline"] = "Please enter a headline under 63 characters";
        }

        //article
        if (!$this->isPresent("article")) {
            $this->errors["article"] = "Please enter a article";
        }
        else if (!$this->minLength("article", 200)) {
            $this->errors["article"] = "Please enter a article with at least 200 characters";
        }
        else if (!$this->maxLength("article", 5000)) {
            $this->errors["article"] = "Please enter a article under 5000 characters";
        }
        

        //Image url
        if (!$this->isPresent("img_url")) {
            $this->errors["img_url"] = "Please enter a img_url";
        }
        else if (!$this->maxLength("img_url", 20)) {
            $this->errors["img_url"] = "Please enter a img_url under 20 characters";
        }

        //author id
        if (!$this->isPresent("author_id")) {
            $this->errors["author_id"] = "Please enter a author_id";
        }
        else if (!$this->maxLength("author_id", 3)) {
            $this->errors["author_id"] = "Please enter a author_id under 3 characters";
        }       

        //categoryid
        $validCategory = ["1", "2", "3", "4", "5"];
        if (!$this->isPresent("category_id")) {
            $this->errors["category_id"] = "Please choose a category";
        }
        else if (!$this->isElement("category_id", $validCategory)) {
            $this->errors["category_id"] = "Please choose a valid category_id";
        }

        //Created at
        if (!$this->isPresent("created_at")) {
            $this->errors["created_at"] = "Please enter a created_at";
        }
        else if (!$this->maxLength("created_at", 15)) {
            $this->errors["created_at"] = "Please enter a created_at under 15 characters";
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

        //Box office
        // if (!$this->isPresent("box_office")) {
        //     $this->errors["box_office"] = "Please enter a box_office";
        // }
        // else if (!$this->isInteger("box_office")) {
        //     $this->errors["box_office"] = "box_office must be an integer";
        // }
        // else if (!$this->min("box_office", 100)) {
        //     $this->errors["box_office"] = "box_office must be above the box_office 100";
        // }

        // $validDirector = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11];
        // if (!$this->isPresent("director_id")) {
        //     $this->errors["director_id"] = "Please choose a director";
        // }
        // else if (!$this->isElement("director_id", $validDirector)) {
        //     $this->errors["director_id"] = "Please choose a valid director";
        // }
        

        return count($this->errors) === 0;
    }
}
?>