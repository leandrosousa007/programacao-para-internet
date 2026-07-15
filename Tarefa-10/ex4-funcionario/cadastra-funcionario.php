<?php
require "../conexaoMysql.php";
$pdo = mysqlConnect();

$nome = $_POST["nome"] ?? "";
$email = $_POST["email"] ?? "";
$senha = $_POST["senha"] ?? "";
$funcao = $_POST["funcao"] ?? "";
$dataNascimento = $_POST["dataNascimento"] ?? "";
$estadoCivil = $_POST["estadoCivil"] ?? "";

// Calcula o hash da senha para não armazenar em texto claro (Requisito do trabalho)
$senhaHash = password_hash($senha, PASSWORD_DEFAULT);

try {
  // A coluna "codigo" é omitida, pois é auto_increment
  $sql = <<<SQL
  INSERT INTO funcionario (nome, email, senhahash, estadoCivil, dataNascimento, funcao)
  VALUES (?, ?, ?, ?, ?, ?)
  SQL;

  // Utiliza Prepared Statements para prevenir ataques de SQL Injection
  $stmt = $pdo->prepare($sql);
  
  $stmt->execute([
    $nome, 
    $email, 
    $senhaHash, 
    $estadoCivil, 
    $dataNascimento, 
    $funcao
  ]);

  // Direciona automaticamente para a página de listagem após o cadastro
  header("location: mostra-funcionarios.php");
  exit();
} 
catch (Exception $e) {  
  exit('Falha ao cadastrar funcionário: ' . $e->getMessage());
}
?>