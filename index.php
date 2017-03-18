<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<?php
/**
 * Created by PhpStorm.
 * User: felipe
 * Date: 14/03/2017
 * Time: 22:31
 */

require_once "conexaoDB.php";
require_once "Aluno.php";

$conexao = conexaoDB();

$alunos = new Aluno($conexao);

echo "<h2>Listando todos os alunos</h2>";
$conteudo .= "<br>";
$conteudo .= "<div> <a href='incluir.php' class='btn btn-sm'>incluir novo registro</a></div>";
$conteudo .= "<table class='table table-striped table-hover table-condensed' >";
$conteudo .= "<tr>
<td>#</td>
<td>Nome</td>
<td>Nota</td>
<td>Opções</td>

</tr>";
foreach ($alunos->listar() as $aluno) {
    $conteudo .= "<tr>";
    $conteudo .= "<td> " . $aluno['id'] . "</td>";
    $conteudo .= "<td>" . $aluno['nome'] . "</td>";
    $conteudo .= "<td>" . $aluno['nota'] . "</td>";
    $conteudo .= "<td> <a href='exibir.php?id=" . $aluno['id'] . "' class='btn btn-sm'>exibir</a>";
    $conteudo .= " <a href='editar.php?id=" . $aluno['id'] . "' class='btn btn-sm'>editar</a>";
    $conteudo .= " <a href='excluir.php?id=" . $aluno['id'] . "' class='btn btn-sm'>excluir</a></td>";
    $conteudo .= "</tr>";
}
$conteudo .= "</table><br>";

echo $conteudo;