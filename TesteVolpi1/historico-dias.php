<?php

include 'banco.php';
session_start();

$id = $_SESSION['id_usuario'];

$comando = "SELECT * FROM tb_dias WHERE id_usuario = $id";
$resultado = $conn->query($comando);

$dias = [];

while( $dia = mysqli_fetch_assoc( $resultado)){
    $dias[] = $dia; 
} //é o que vai fazer aparecer em sequencia, todos os dias registrados que uma pessoa tem

echo json_encode($dias);

?>