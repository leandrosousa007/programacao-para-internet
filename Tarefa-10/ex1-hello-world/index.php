<?php
/** 
 * Explicação
 * Utilizando XAMPP, com apache mysql ligados.
 * Criei o banco de dados ppi_tarefa10 no MySQL, e executei o script para criação e inserção de dados na tabela aluno.
 * Alterei o arquivo conexaoMysql.php para conectar ao banco, com os novos dados.
 * Fiz o teste de conexão.
 */

require "../conexaoMysql.php";// requere o arquivo de conexão com o banco de dados
$pdo = mysqlConnect();// chama a função de conexão com o banco de dados, que retorna um objeto PDO

try {
  // Consulta SQL para selecionar os dados da tabela aluno
  $sql = <<<SQL
    SELECT nome, telefone
    FROM aluno
  SQL;

  // Executa a consulta SQL e obtém os resultados
  $stmt = $pdo->query($sql);
} 
catch (Exception $e) {
  // Caso ocorra algum erro na execução da consulta SQL, exibe uma mensagem de erro e encerra o script
  exit('Ocorreu uma falha: ' . $e->getMessage());
}

?>
<!doctype html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <!-- 1: Tag de responsividade -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Hello World - Listagem de Dados em Tabela do MySQL</title>

  <!-- 2: Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <h3>Dados na tabela <b>aluno</b></h3>
    <table class="table table-striped table-hover">
      <tr>
        <th>Nome</th>
        <th>Telefone</th>
      </tr>
      <?php
      // Itera sobre os resultados da consulta SQL e exibe os dados em uma tabela HTML
      while ($row = $stmt->fetch()) 
      {
        // Converte os caracteres especiais em entidades HTML para evitar problemas de segurança, 
        //como XSS
        $nome = htmlspecialchars($row['nome']);
        $telefone = htmlspecialchars($row['telefone']);

        // Exibe os dados em uma linha da tabela HTML
        echo <<<HTML
        <tr>
          <td>$nome</td> 
          <td>$telefone</td>
        </tr>      
        HTML;
      }
      ?>
    </table>
    <a href="../index.html">Menu de opções</a>
  </div>

</body>

</html>