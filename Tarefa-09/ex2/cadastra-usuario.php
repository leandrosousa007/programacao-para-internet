<?php

require "usuarios.php";

// coleta os dados do formulário
$nome = $_POST["nome"] ?? "";
$cpf = $_POST["cpf"] ?? "";
$email = $_POST["email"] ?? "";
$senha = $_POST["senha"] ?? "";
$cep = $_POST["cep"] ?? "";
$endereco = $_POST["endereco"] ?? "";
$bairro = $_POST["bairro"] ?? "";
$cidade = $_POST["cidade"] ?? "";
$estado = $_POST["estado"] ?? "";

// cria um novo usuário e acrescenta no arquivo de texto
adicionaUsuario($nome, $cpf, $email, $senha, $cep, $endereco, $bairro, $cidade, $estado);

// redireciona o navegador para a página de listagem
header("location: lista-usuarios.php");

?>