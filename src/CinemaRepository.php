<?php

namespace TuDublin;

use Mattsmithdev\PdoCrudRepo\DatabaseTableRepository;

class CinemaRepository extends DatabaseTableRepository
{
    public function __construct()
    {
        parent::__construct('TuDublin', 'Cinema', 'cinema');
    }

    public function getCinemaNameById($cinemaId)
    {
        $cinema = $this->getOneById($cinemaId);
        return $cinema->getName();
    }
}