<?php
/**
 * O erro acontece porque o texto digitado no formulário vai direto para o comando do banco de dados sem nenhum filtro
 * Quando a gente envia "tolo'); DELETE FROM aluno; -- comment", o pedaço "');" fecha o comando INSERT original antes da hora
 * Com o ponto e vírgula finalizando a primeira ação, o banco entende o "DELETE" como um segundo comando válido e acaba apagando a tabela
 * O "-- comment" no final serve apenas para transformar o que sobrou do código original em um comentário, evitando que dê erro de sintaxe na tela
 */
require "../conexaoMysql.php";
$pdo = mysqlConnect();

$nome = $_POST["nome"] ?? "";
$telefone = $_POST["telefone"] ?? "";

try {

  /* Codigo vuneralavel a SQL Injection
  $sql = <<<SQL
  INSERT INTO aluno (nome, telefone)
  VALUES ('$nome', '$telefone');
  SQL;  
  
  $pdo->exec($sql);
*/

  //codigo seguro contra SQL Injection
  // A string do SQL agora usa interrogações (placeholders) no lugar das variáveis 
  $sql = <<<SQL
  INSERT INTO aluno (nome, telefone)
  VALUES (?, ?)
  SQL;

  // Prepara a declaração isolando a estrutura lógica 
  $stmt = $pdo->prepare($sql);
  
  // Executa passando os dados do usuário em um array 
  $stmt->execute([$nome, $telefone]);

  header("location: mostra-alunos.php");
  exit();
} 
catch (Exception $e) {  
  exit('Falha ao cadastrar os dados: ' . $e->getMessage());
}
?>