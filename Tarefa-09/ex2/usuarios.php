<?php

class Usuario
{
  public $nome;
  public $cpf;
  public $email;
  public $senha;
  public $cep;
  public $endereco;
  public $bairro;
  public $cidade;
  public $estado;

  function __construct($nome, $cpf, $email, $senha, $cep, $endereco, $bairro, $cidade, $estado)
  {
    $this->nome = $nome;
    $this->cpf = $cpf;
    $this->email = $email;
    $this->senha = $senha;
    $this->cep = $cep;
    $this->endereco = $endereco;
    $this->bairro = $bairro;
    $this->cidade = $cidade;
    $this->estado = $estado;
  }
}

function adicionaUsuario($nome, $cpf, $email, $senha, $cep, $endereco, $bairro, $cidade, $estado)
{
  // Abre o arquivo de texto para escrita no final
  $arq = fopen("usuarios.txt", "a");

  // Remove quebras de linha que o usuário pode ter digitado nos campos de texto para não quebrar o arquivo
  $nome = str_replace(["\n", "\r"], "", $nome);
  $endereco = str_replace(["\n", "\r"], "", $endereco);

  // Grava separando os dados por ponto-e-vírgula
  fwrite($arq, "{$nome};{$cpf};{$email};{$senha};{$cep};{$endereco};{$bairro};{$cidade};{$estado}\n");

  // Fecha o arquivo
  fclose($arq);
}

function carregaUsuarios()
{
  $arrayUsuarios = [];

  // Abre o arquivo usuarios.txt para leitura
  $arq = fopen("usuarios.txt", "r");
  if (!$arq)
    return $arrayUsuarios;

  // Lê linha por linha
  while (!feof($arq)) {
    $linha = trim(fgets($arq));

    if ($linha != "") {
      // Separa os dados na linha e garante 9 posições com array_pad
      list($nome, $cpf, $email, $senha, $cep, $endereco, $bairro, $cidade, $estado) = array_pad(explode(';', $linha), 9, null);

      $novoUsuario = new Usuario($nome, $cpf, $email, $senha, $cep, $endereco, $bairro, $cidade, $estado);
      $arrayUsuarios[] = $novoUsuario;
    }
  }

  fclose($arq);
  return $arrayUsuarios;
}
?>