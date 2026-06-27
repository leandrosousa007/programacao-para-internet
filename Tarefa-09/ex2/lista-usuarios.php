<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Página Dinâmica - Listagem Segura</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>

  <div class="container mt-5">

    <h3 class="mb-4">Usuários Carregados do Arquivo <i>usuarios.txt</i></h3>

    <div class="table-responsive">
      <table class="table table-striped">
        <thead class="table-dark">
          <tr>
            <th>Nome</th>
            <th>CPF</th>
            <th>E-mail</th>
            <th>CEP</th>
            <th>Endereço</th>
            <th>Bairro</th>
            <th>Cidade</th>
            <th>Estado</th>
          </tr>
        </thead>

        <tbody>
          <?php
          require "usuarios.php";
          $arrayUsuarios = carregaUsuarios();
          
          foreach ($arrayUsuarios as $usuario) {
            // Aplicando proteção contra XSS
            $nome = htmlspecialchars($usuario->nome);
            $cpf = htmlspecialchars($usuario->cpf);
            $email = htmlspecialchars($usuario->email);
            $cep = htmlspecialchars($usuario->cep);
            $endereco = htmlspecialchars($usuario->endereco);
            $bairro = htmlspecialchars($usuario->bairro);
            $cidade = htmlspecialchars($usuario->cidade);
            $estado = htmlspecialchars($usuario->estado);

            // Utilizamos a sintaxe Heredoc (<<<HTML) conforme o exemplo do seu professor
            echo <<<HTML
              <tr>
                <td>$nome</td>
                <td>$cpf</td>
                <td>$email</td>
                <td>$cep</td>
                <td>$endereco</td>
                <td>$bairro</td>
                <td>$cidade</td>
                <td>$estado</td>
              </tr>
            HTML;
          }
          ?>
        </tbody>
      </table>
    </div>
    
    <a href="novo-usuario.html" class="btn btn-secondary mt-3">Voltar ao cadastro</a>
  </div>

</body>

</html>