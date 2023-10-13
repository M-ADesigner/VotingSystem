<?php 

class Db
{
    private $conn;

    public function __construct()
    {
        $this->conn = mysqli_connect('localhost', 'root', '', 'sistemavotos');

        // Verificar si la conexión se realizó con éxito
        if ($this->conn->connect_error) {
            die('Error de conexión: ' . $this->conn->connect_error);
        }
        // Configurar el juego de caracteres
        $this->conn->set_charset("utf8mb4");
    }

    public function query($query)
    {
        $result = $this->conn->query($query);
        return $result;
    }
}
