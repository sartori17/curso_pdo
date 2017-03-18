<?php
/**
 * Created by PhpStorm.
 * User: felipe
 * Date: 18/03/2017
 * Time: 15:21
 */

require_once 'Aluno.php';
require_once "conexaoDB.php";

if (isset($_POST['inputNome'])) {
    $conexao = conexaoDB();

    $aluno = new Aluno($conexao);

    $aluno -> setId($id)
        -> setNome($_POST['inputNome'])
        -> setNota($_POST['inputNota']);

    if ($aluno -> inserir()) {
        echo "Dados inseridos com sucesso.<br>";
    } else {
        echo "Algo deu errado.<br>";
    }

}

echo "<h2>Incluir aluno</h2>";

$conteudo .= "<br>";
$conteudo .= "<form method=\"post\" action=\"incluir.php\">";
$conteudo .= "Nome: <input type='text' id='inputNome' name='inputNome' ><br><br>";
$conteudo .= "Nota: <input type='text' id='inputNota' name='inputNota' ><br><br>";
$conteudo .= "<button type=\"submit\" class=\"btn btn-default\">Enviar</button>";
$conteudo .= "</form>";
$conteudo .= " <a href='index.php' class='btn btn-sm'>listar todos</a>";

echo $conteudo;