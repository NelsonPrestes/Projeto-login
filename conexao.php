<?php

$servidor="localhost";
$usuario="root";
$senha="";
$banco="login";


$conexao = new mysqli($servidor, $usuario, $senha, $banco);

if($conexao->error) {
    die("Falha ao conectar ao banco de dados: " . $conexao->error);
}


?>










