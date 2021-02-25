<?php

namespace TuDublin;

class Showtime
{
    private $id;
    private $movieId;
    private $cinemaId;
    private $date;
    private $time;

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
        if (!empty($id) && is_numeric($id) && $id > 0 && $id < 1000000) {
            $this->id = $id;
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
        if (!empty($movieId) && is_numeric($movieId) && $movieId > 0 && $movieId < 1000000) {
            $this->movieId = $movieId;
        }
    }

    /**
     * @return mixed
     */
    public function getCinemaId()
    {
        return $this->cinemaId;
    }

    /**
     * @param mixed $cinemaId
     */
    public function setCinemaId($cinemaId)
    {
        if (!empty($cinemaId) && is_numeric($cinemaId) && $cinemaId > 0 && $cinemaId < 1000000) {
            $this->cinemaId = $cinemaId;
        }
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        if (!empty($date)) {
            list($year,$month,$day) = explode('-',$date);
            if (checkdate($month,$day,$year)){
                $this->date = $date;
            }
        }
    }

    /**
     * @return mixed
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @param mixed $time
     */
    public function setTime($time)
    {
        if (!empty($time)) {
            list($hour,$min) = explode(':',$time);
            if ($hour >= 0 && $hour < 24 && $min >= 0 && $min < 60){
                $this->time = "$hour:$min";
            }
        }
    }

}