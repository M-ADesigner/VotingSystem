<?php

class Votante
{

    public $data = [];

    public function __construct()
    {
        $query = "SELECT * FROM votante";

        $result = $GLOBALS['DB']->query($query);

        if ($result) {
            while ($data = $result->fetch_assoc()) {
                $this->data[] = $data;
            }
        }
    }

    public function getVotante()
    {
        return json_encode($this->data);
    }
}
