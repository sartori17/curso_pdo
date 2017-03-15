<?php
/**
 * Created by PhpStorm.
 * User: felipe
 * Date: 14/03/2017
 * Time: 22:31
 */

require_once "conexaoDB.php";

$conn = conexaoDB();

$query = "select * from alunos;";

$stmt = $conn->prepare($query);
$stmt->execute();
$alunos = $stmt -> fetchAll(PDO::FETCH_ASSOC);

echo "<h2>Listando todas as notas</h2>";
foreach ($alunos as $aluno) {
    $conteudo .= "<div>";
    $conteudo .= "ID: ".$aluno['id'];
    $conteudo .= "<br>Nome: ".$aluno['nome'];
    $conteudo .= "<br>Nota: ".$aluno['nota'];
    $conteudo .= "</div><br>";
}
echo $conteudo;

$conteudo = "";

$query = "select * from alunos order by nota desc limit 3;";

$stmt = $conn->prepare($query);
$stmt->execute();
$alunos = $stmt -> fetchAll(PDO::FETCH_OBJ);

echo "<h2>Listando as 3 maiores notas</h2>";
foreach ($alunos as $aluno) {
    $conteudo .= "<div>";
    $conteudo .= "ID: ".$aluno->id;
    $conteudo .= "<br>Nome: ".$aluno->nome;
    $conteudo .= "<br>Nota: ".$aluno->nota;
    $conteudo .= "</div><br>";
}
echo $conteudo;