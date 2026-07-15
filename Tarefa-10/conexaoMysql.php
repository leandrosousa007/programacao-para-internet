<?php

function mysqlConnect()
{
  $db_host = "localhost";
  $db_username = "root";// usuario padrao do XAMPP
  $db_password = "";
  $db_name = "ppi_tarefa10";

  $options = [
    PDO::ATTR_EMULATE_PREPARES => false, // desativa a execução emulada de prepared statements
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION // ativa o lançamento de exceções em casos de erros
  ];

  try {
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8mb4", $db_username, $db_password, $options);
    return $pdo;
  } 
  catch (Exception $e) {
    exit('Ocorreu uma falha na conexão com o MySQL: ' . $e->getMessage());
  }
}

?>
