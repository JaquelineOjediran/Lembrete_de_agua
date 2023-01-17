<?php 
$servername = "localhost"; //servidor
$database = "bd_usuario"; //banco de dados
$username = "root"; //usuario
$password = "12345678"; //senha

$conn = mysqli_connect($servername, $username, $password, $database); //conexao

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error()); //mensagem de erro
}
