<?php

namespace TuDublin;

use Mattsmithdev\PdoCrudRepo\DatabaseTableRepository;

class ShowtimeRepository extends DatabaseTableRepository
{
    public function __construct()
    {
        parent::__construct('TuDublin', 'Showtime', 'showtime');
    }
}