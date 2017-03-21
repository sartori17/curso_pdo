<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<?php
/**
 * Created by PhpStorm.
 * User: felipe
 * Date: 18/03/2017
 * Time: 14:36
 */
session_start();
require_once 'Aluno.php';
require_once 'ServiceDb.php';
require_once "conexaoDB.php";

if (isset($_POST['inputID'])) {
    $id = $_POST['inputID'];

    $conexao = conexaoDB();

    $aluno = new Aluno($conexao);
    $db = new ServiceDb($conexao, $aluno);

    $aluno -> setId($id);

    $fields = array("nome" => $_POST['inputNome'],
                    "nota" => $_POST['inputNota']);
    if ($db -> alterar($fields)) {
        echo "Dados alterados com sucesso.<br>";
    } else {
        echo "Algo deu errado.<br>";
    }

} else {
    $id = $_GET['id'];
}

$conexao = conexaoDB();
$aluno = new Aluno();
$db = new ServiceDb($conexao, $aluno);

$aluno = $db -> find("id", $id);

echo "<h2>Editar aluno</h2>";

$conteudo = "";
$conteudo .= "<br>";
$conteudo .= "<form method=\"post\" action=\"editar.php\">";
$conteudo .= "ID: {$aluno['id']}<br>";
$conteudo .= "<input type='hidden' id='inputID' name='inputID' value='{$aluno['id']}'><br>";
$conteudo .= "Nome: <input type='text' id='inputNome' name='inputNome' value='{$aluno['nome']}'><br><br>";
$conteudo .= "Nota: <input type='text' id='inputNota' name='inputNota' value='{$aluno['nota']}'><br><br>";
$conteudo .= "<button type=\"submit\" class=\"btn btn-default\">Enviar</button>";
$conteudo .= "</form>";
$conteudo .= " <a href='listar_aluno.php' class='btn btn-sm'>listar todos</a>";
$conteudo .= " <a href='excluir.php?id=" . $aluno['id'] . "' class='btn btn-sm'>excluir</a>";

echo $conteudo;

require_once ('rodape.php');