<?php

include 'banco.php'; //incluindo banco
session_start(); //iniciando sessao

$id = $_SESSION['id_usuario']; //atribuindo a variavel global do id em id
$hoje = date('d-m-Y'); //atribuindo o dia de hoje na variavel
$consumo = $_POST['consumo']; //recebendo valor do metodo POST

$comando = "SELECT * FROM tb_dias WHERE id_usuario = $id AND data_dia = '$hoje'"; 
//consultando todos os valores da tabela dias onde id_usuario seja igual ao id e data_dia seja igual a variavel hoje
$resultado = $conn->query($comando); //fazendo consulta

$dia = null; //definindo dia como vazio

foreach($resultado as $row) {  //para cada item da variavel resultado coloque numa linha
    $dia = $row; //dia é igual aos dados atribuidos em linha
}

if($dia == null){ //se o dia for igual a nada
    $comando = "INSERT INTO tb_dias values('$hoje', default, $consumo, $id)";
    //inserir valores hoje, default(o banco autoincrementa), a quantidade de ml a registrar e o id do usuario
    $resultado = $conn->query($comando); //fazendo consulta
    $id_dias = mysqli_insert_id($conn); //retornando id registrado

    $dia = array( //criação de uma array para armazenar os seguintes dados dentro da variavel dia
        'data_dia' => $hoje,
        'id_dias' => $id_dias,
        'consumido_dia' => $consumo,
        'id_usuario' => $id
    );
} else{ //senao
    $comando = "UPDATE tb_dias SET consumido_dia = consumido_dia + $consumo WHERE id_usuario = $id AND data_dia = '$hoje'";
    //atualize a tabela dias, defina consumido_dia como o valor já registrado em consumido dia mais o novo valor a ser somado
    
    $resultado = $conn->query($comando); //fazendo consulta

    $dia['consumido_dia'] = $dia['consumido_dia'] + $consumo; //atribuindo a conta a variavel dia
}

echo json_encode($dia);
header ("Location: registros.html"); //redirecionando para a mesma pagina html

?>