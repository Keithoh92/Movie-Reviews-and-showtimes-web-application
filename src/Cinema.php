<?php

namespace TuDublin;

class Cinema
{
    private $id;
    private $name;
    private $location;

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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        if (!empty($name) && strlen($name) <= 45) {
            $this->name = $name;
        }
    }

    /**
     * @return mixed
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param mixed $location
     */
    public function setLocation($location)
    {
        if (!empty($location && strlen($location) <= 45)) {
            $this->location = $location;
        }
    }


}