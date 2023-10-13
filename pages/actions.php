<?php
require_once('../core/db.php');
require_once('../core/votante.php');

$GLOBALS['DB'] = new Db();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $votante = new Votante();

  $responseData = array(
    'rut'                   => $_POST['rut'],
    'nombreApellido'        => $_POST['nombreApellido'],
    'alias'                 => $_POST['alias'],
    'email'                 => $_POST['email'],
    'candidato'             => $_POST['candidato'],
    'region_id'             => $_POST['region'],
    'comuna_id'             => $_POST['comuna'],
    'checkboxSelecionados'  => implode(",", $_POST['checkboxSelecionados'])
  );


  $confirmVotante = $votante->getRutVotante($_POST['rut']);

  if ($confirmVotante === true) {
    $result = $votante->insertNewVotante($responseData);
    if ($result === true) {
      echo json_encode(200);
    } else {
      echo json_encode(209);
    }
  } else {
    echo json_encode(209);
  }
}
