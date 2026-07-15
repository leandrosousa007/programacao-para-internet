<?php
require "../conexaoMysql.php";
$pdo = mysqlConnect();

try {
  $sql = <<<SQL
  SELECT codigo, nome, email, senhahash, estadoCivil, dataNascimento, funcao
  FROM funcionario
  SQL;

  $stmt = $pdo->query($sql);
} 
catch (Exception $e) {
  exit('Ocorreu uma falha: ' . $e->getMessage());
}
?>
<!doctype html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Funcionários Cadastrados</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <style>
    body {
      padding-top: 2rem;
    }
  </style>  
</head>

<body>

  <div class="container">
    <h3>Funcionários Cadastrados</h3>
    <table class="table table-striped table-hover">
      <tr>
        <th>Código</th>
        <th>Nome</th>
        <th>E-mail</th>
        <th>Função</th>
        <th>Nascimento</th>
        <th>Estado Civil</th>
        <th>SenhaHash</th>
      </tr>

      <?php
      while ($row = $stmt->fetch()) {

        // Limpa os dados antes de inseri-los na página HTML
        $codigo = htmlspecialchars($row['codigo']);
        $nome = htmlspecialchars($row['nome']);
        $email = htmlspecialchars($row['email']);
        $funcao = htmlspecialchars($row['funcao']);
        $estadoCivil = htmlspecialchars($row['estadoCivil']);

        // Formata a data igual ao exemplo do professor
        $data = new DateTime($row['dataNascimento']);
        $dataFormatoDiaMesAno = $data->format('d-m-Y');

        echo <<<HTML
          <tr>
            <td>$codigo</td> 
            <td>$nome</td> 
            <td>$email</td>
            <td>$funcao</td>
            <td>$dataFormatoDiaMesAno</td>
            <td>$estadoCivil</td>
            <td>{$row['senhahash']}</td>
          </tr>      
        HTML;
      }
      ?>

    </table>
    <a href="../index.html">Menu de opções</a>
  </div>

</body>

</html>