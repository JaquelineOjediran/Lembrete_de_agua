<?php

include 'banco.php';
session_start();

$id = $_SESSION['id_usuario'];

$comando = "SELECT * FROM tb_usuario WHERE id_usuario = $id";
$resultado = $conn->query($comando);

$usuario = null;

foreach($resultado as $row) {
    $usuario = $row;
}

echo json_encode($usuario);

?>