<?php

namespace TuDublin;

use Mattsmithdev\PdoCrudRepo\DatabaseTableRepository;

class MovieRepository extends DatabaseTableRepository
{
    public function __construct()
    {
        parent::__construct('TuDublin', 'Movie', 'movie');
    }

    public function getMovieTitleById($movieId)
    {
        $movie = $this->getOneById($movieId);
        return $movie->getTitle();
    }
}