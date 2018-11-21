<?php

class BookModel{
    private $title;
    private $author;
    private $description;
    private $rating;
    private $voters;
    private $cover;

    function __construct($title, $author, $description, $rating, $voters, $cover) {
        $this->setTitle($title);
        $this->setAuthor($author);
        $this->setDescription($description);
        $this->setRating($rating);
        $this->setVoters($voters);
        $this->setCover($cover);
    }

    function setTitle($title) {
        $this->title = $title;
    }

    function getTitle() {
        return $this->title;
    }

    function setAuthor($author) {
        $this->author = $author;
    }

    function getAuthor() {
        return $this->author;
    }

    function setDescription($description) {
        $this->description = $description;
    }

    function getDescription() {
        return $this->description;
    }   

    function setRating($rating) {
        $this->rating = $rating;
    } 

    function getRating() {
        return $this->rating;
    }

    function setCover($cover) {
        $this->cover = $cover;
    } 

    function getCover() {
        return $this->cover;
    }
}

?>