<?php

namespace TuDublin;

class Review
{
    private $id;
    private $helpfulness = 0;
    private $reviewTitle;
    private $text;
    private $userId;
    private $movieId;
    private $ratingCount = 0;

    public function updateHelpfulness($value)
    {
        if (!empty($value) && is_numeric($value) && $value >= 1 && $value <= 5 &&
                $this->ratingCount < 999999) {
            $this->ratingCount++;
            $this->helpfulness = round(($this->helpfulness + $value)/$this->ratingCount);
        }
    }

    /**
     * @return mixed
     */
    public function getRatingCount()
    {
        return $this->ratingCount;
    }

    /**
     * @param mixed $ratingCount
     */
    public function setRatingCount($ratingCount)
    {
        if (!empty($ratingCount) && is_numeric($ratingCount)&& $ratingCount >= 0 && $ratingCount
            < 1000000) {
            $this->ratingCount = $ratingCount;
        }
    }

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
        if (!empty($id) && is_numeric($id) && $id < 1000000) {
            $this->id = $id;
        }
    }

    /**
     * @return mixed
     */
    public function getHelpfulness()
    {
        return $this->helpfulness;
    }

    /**
     * @param mixed $helpfulness
     */
    public function setHelpfulness($helpfulness)
    {
        if (!empty($helpfulness) && is_numeric($helpfulness) && $helpfulness >= 0 && $helpfulness <=
            5) {
            $this->helpfulness = $helpfulness;
        }
    }

    /**
     * @return mixed
     */
    public function getReviewTitle()
    {
        return $this->reviewTitle;
    }

    /**
     * @param mixed $reviewTitle
     */
    public function setReviewTitle($reviewTitle)
    {
        if (!empty($reviewTitle) && strlen($reviewTitle) <= 25) {
            $this->reviewTitle = $reviewTitle;
        }
    }

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param mixed $text
     */
    public function setText($text)
    {
        if (!empty($text) && strlen($text) <= 1000) {
            $this->text = $text;
        }
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param mixed $userId
     */
    public function setUserId($userId)
    {
        if (!empty($userId) && is_numeric($userId) && $userId < 1000000) {
            $this->userId = $userId;
        }
    }

    /**
     * @return mixed
     */
    public function getMovieId()
    {
        return $this->movieId;
    }

    /**
     * @param mixed $movieId
     */
    public function setMovieId($movieId)
    {
        if (!empty($movieId) && is_numeric($movieId) && $movieId < 1000000) {
            $this->movieId = $movieId;
        }
    }

}