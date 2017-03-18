<?php
/**
 * Created by PhpStorm.
 * User: felipe
 * Date: 18/03/2017
 * Time: 14:35
 */

require_once "conexaoDB.php";

$id = $_GET['id'];
$conn = conexaoDB();

$query = "select * from alunos where id = :id;";

$stmt = $conn->prepare($query);
$stmt->bindParam(":id", $id, \PDO::PARAM_INT);
$stmt->execute();
$aluno = $stmt -> fetch(PDO::FETCH_ASSOC);

echo "<h2>Listando aluno</h2>";

$conteudo .= "<br>";
$conteudo .= "ID: ".$aluno['id']."<br>";
$conteudo .= "Nome: ".$aluno['nome']."<br>";
$conteudo .= "Nota: ".$aluno['nota']."<br>";
$conteudo .= "<br>";
$conteudo .= " <a href='index.php' class='btn btn-sm'>listar todos</a>";
$conteudo .= " <a href='editar.php?id=" . $aluno['id'] . "' class='btn btn-sm'>editar</a>";
$conteudo .= " <a href='excluir.php?id=" . $aluno['id'] . "' class='btn btn-sm'>excluir</a>";

echo $conteudo;