<?php

include 'banco.php';
session_start();

$id = $_SESSION['id_usuario'];
$hoje = date('d-m-Y');


$comando = "SELECT * FROM tb_dias WHERE id_usuario = $id AND data_dia = '$hoje'";
$resultado = $conn->query($comando);

$dia = null;

foreach($resultado as $row) {
    $dia = $row;
}

if($dia == null){
    $comando = "INSERT INTO tb_dias values('$hoje', default, 0, $id)";
    $resultado = $conn->query($comando);
    $id_dias = mysqli_insert_id($conn);

    $dia = array(
        'data_dia' => $hoje,
        'id_dias' => $id_dias,
        'consumido_dia' => 0,
        'id_usuario' => $id
    );
}

echo json_encode($dia);

?>