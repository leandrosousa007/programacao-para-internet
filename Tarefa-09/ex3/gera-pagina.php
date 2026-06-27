<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 3 - Página Dinâmica</title>
</head>
<body>

    <h1>Página HTML dinâmica</h1>

    <?php
    // Verifica se o parâmetro 'n' foi passado na URL e se é um valor numérico
    if (isset($_GET['n']) && is_numeric($_GET['n'])) {
        
        // Converte o valor recebido para inteiro
        $n = (int)$_GET['n'];
        
        // Executa o loop 'n' vezes, imprimindo o parágrafo em cada iteração
        for ($i = 0; $i < $n; $i++) {
            echo "<p>Programação para Internet</p>";
        }

    } else {
        // Mensagem padrão caso o usuário não informe o ?n= na URL
        echo "<p><em>Por favor, adicione <strong>?n=NUMERO</strong> ao final da URL para gerar os parágrafos.</em></p>";
    }
    ?>

</body>
</html>