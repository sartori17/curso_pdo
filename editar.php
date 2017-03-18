<?php
/**
 * Created by PhpStorm.
 * User: felipe
 * Date: 18/03/2017
 * Time: 14:36
 */
require_once 'Aluno.php';
require_once "conexaoDB.php";

if (isset($_POST['inputID'])) {
    $id = $_POST['inputID'];

    $conexao = conexaoDB();

    $aluno = new Aluno($conexao);

    $aluno -> setId($id)
        -> setNome($_POST['inputNome'])
        -> setNota($_POST['inputNota']);

    if ($aluno -> alterar()) {
        echo "Dados alterados com sucesso.<br>";
    } else {
        echo "Algo deu errado.<br>";
    }

} else {
    $id = $_GET['id'];
}

$conn = conexaoDB();

$query = "select * from alunos where id = :id;";

$stmt = $conn->prepare($query);
$stmt->bindParam(":id", $id, \PDO::PARAM_INT);
$stmt->execute();
$aluno = $stmt -> fetch(PDO::FETCH_ASSOC);

echo "<h2>Editar aluno</h2>";

$conteudo .= "<br>";
$conteudo .= "<form method=\"post\" action=\"editar.php\">";
$conteudo .= "ID: ".$aluno['id']."<br>";
$conteudo .= "<input type='hidden' id='inputID' name='inputID' value='".$aluno['id']."'><br>";
$conteudo .= "Nome: <input type='text' id='inputNome' name='inputNome' value='".$aluno['nome']."'><br><br>";
$conteudo .= "Nota: <input type='text' id='inputNota' name='inputNota' value='".$aluno['nota']."'><br><br>";
$conteudo .= "<button type=\"submit\" class=\"btn btn-default\">Enviar</button>";
$conteudo .= "</form>";
$conteudo .= " <a href='index.php' class='btn btn-sm'>listar todos</a>";
$conteudo .= " <a href='excluir.php?id=" . $aluno['id'] . "' class='btn btn-sm'>excluir</a>";

echo $conteudo;