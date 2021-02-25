<?php

namespace TuDublin;

use Mattsmithdev\PdoCrudRepo\DatabaseTableRepository;

class ReviewRepository extends DatabaseTableRepository
{
    public function __construct()
    {
        parent::__construct('TuDublin', 'Review', 'review');
    }
}