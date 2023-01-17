<?php

include 'banco.php'; //incluindo banco
session_start(); //iniciando sessão

$nome = $_POST['nome']; //atribuindo valor nome dado pelo usuario pelo metodo POST
$peso = $_POST['peso']; //atribuindo valor peso dado pelo usuario
$meta = $peso * 35;  //atribuindo valor da meta como a multiplicacao do peso do usuario por 35ml

$comando = "insert into tb_usuario values (default, '$nome', $peso, $meta)"; //inserindo dados na tabela do usuario
$resultado = $conn->query($comando); //fazendo consulta
$id = mysqli_insert_id($conn); //retornando id do usuario registrado agora

$_SESSION['id_usuario'] = $id; //criando variavel global para id

if ($resultado) { //se a consulta for igual a true
    header("Location: registros.html"); //redirecionamos o user para a proxima tela
} else {
    echo 'Erro'; //senao, erro
}


?>