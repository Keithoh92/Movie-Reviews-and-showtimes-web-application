<?php

namespace TuDublin;

class Movie
{
    private $id;
    private $title;
    private $genre;
    private $classification;
    private $rating;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        if (!empty($id) && is_numeric($id) && $id >= 1 && $id < 1000000) {
            $this->id = $id;
        }
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        if (!empty($title) && strlen($title) <= 45) {
            $this->title = $title;
        }
    }

    /**
     * @return mixed
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * @param mixed $genre
     */
    public function setGenre($genre)
    {
        if (!empty($genre) && strlen($genre) <= 45) {
            $this->genre = $genre;
        }
    }

    /**
     * @return mixed
     */
    public function getClassification()
    {
        return $this->classification;
    }

    /**
     * @param mixed $classification
     */
    public function setClassification($classification)
    {
        if (!empty($classification) && strlen($classification) <= 45) {
            $this->classification = $classification;
        }
    }

    /**
     * @return mixed
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * @param mixed $rating
     */
    public function setRating($rating)
    {
        if (!empty($rating) && is_numeric($rating) && $rating >= 1 && $rating <= 5) {
            $this->rating = $rating;
        }
    }

}