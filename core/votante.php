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

    public function insertNewVotante($array)
    {
        $query = "INSERT INTO
      `votante` ( ";

        foreach ($array as $key => $val) {
            $keyImplode[] = "`$key`\n";
            $valImplode[] = "'$val'\n";
        }
        $query .= implode(",", $keyImplode) . " ) VALUES ( " . implode(",", $valImplode) . " );";

        $result = $GLOBALS['DB']->query($query);

        return ($result === true) ? true : false;
    }

    public function getRutVotante($rut)
    {
        $query = "SELECT rut FROM votante WHERE rut = '$rut'";
        $result = $GLOBALS['DB']->query($query);

        if ($result->num_rows > 0) {
            return false;
        } else {
            return true;
        }
    }
}
