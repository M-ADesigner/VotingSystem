<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $alias =  $_POST['alias'];
    $candidato = $_POST['candidato'];
    $comuna = $_POST['comuna'];
    $email = $_POST['email'];
    $nombreApellido = $_POST['nombreApellido'];
    $region = $_POST['region'];
    $rut = $_POST['rut'];

    



    echo json_encode($_POST);
}
