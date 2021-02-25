<?php

namespace TuDublin;
use Mattsmithdev\PdoCrudRepo\DatabaseManager;
use PDO;

class SearchFunctions
{
    private $dbm;
    private $connection;

    public function __construct()
    {
        $this->dbm = new DatabaseManager();
        $this->connection = $this->dbm->getDbh();
    }

    public function searchShowTimes($criteria) // $location, $cinemaId, $movieId
    {
        $conditions = $criteria[0];
        $parameters = $criteria[1];

        $sql = "SELECT * FROM cinema c INNER JOIN showtime s on c.id = s.cinemaId INNER JOIN movie m on s.movieId = m.id";

        if ($conditions) {
            $sql .= " WHERE ".implode(" AND ", $conditions);
        }

        $statement = $this->connection->prepare($sql);
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $statement->execute($parameters);
        $showTimes = $statement->fetchAll();
        return $showTimes;
    }

    public function searchReviews($criteria)
    {
        $conditions = $criteria[0];
        $parameters = $criteria[1];

        $sql = "SELECT * FROM movie m INNER JOIN review r on m.id = r.movieId INNER JOIN user u ON r.userId = u.id";

        if ($conditions) {
            $sql .= " WHERE ".implode(" AND ", $conditions);
        }

        $statement = $this->connection->prepare($sql);
        $statement->setFetchMode(PDO::FETCH_BOTH);
        $statement->execute($parameters);
        $reviewResults = $statement->fetchAll();
        return $reviewResults;
    }

    public function toArrayForMovieSearch($location, $cinemaId, $movieId, $rating, $genre, $startTime)
    {
        $conditions = [];
        $parameters = [];

        if (!empty($location)) {
            $conditions[] = 'location = :location';
            $parameters[":location"] = $location;
        }
        if (!empty($cinemaId)) {
            $conditions[] = 'cinemaId = :cinemaId';
            $parameters[":cinemaId"] = $cinemaId;
        }
        if (!empty($movieId)) {
            $conditions[] = 'movieId = :movieId';
            $parameters[":movieId"] = $movieId;
        }
        if (!empty($rating)) {
            $conditions[] = 'rating = :rating';
            $parameters[":rating"] = $rating;
        }
        if (!empty($genre)) {
            $conditions[] = 'genre = :genre';
            $parameters[":genre"] = $genre;
        }
        if (!empty($startTime)) {
            $conditions[] = 'time BETWEEN :startTime';
            $conditions[] = ':endTime';
            $parameters[":startTime"] = $startTime . ':00:00';
            $parameters[":endTime"]   = $startTime . ':59:59';
        }

        $criteria = [];
        $criteria[] = $conditions;
        $criteria[] = $parameters;

        return $criteria;
    }

    public function toArrayForReviewSearch($movieId, $rating, $helpfulness)
    {
        $conditions = [];
        $parameters = [];

        if (!empty($movieId)) {
            $conditions[] = 'movieId = :movieId';
            $parameters[":movieId"] = $movieId;
        }
        if (!empty($rating)) {
            $conditions[] = 'rating = :rating';
            $parameters[":rating"] = $rating;
        }

        if (!empty($helpfulness)) {
            $conditions[] = 'helpfulness = :helpfulness';
            $parameters[":helpfulness"] = $helpfulness;
        }

        $criteria = [];
        $criteria[] = $conditions;
        $criteria[] = $parameters;

        return $criteria;
    }
}