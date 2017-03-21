<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<?php
/**
 * Created by PhpStorm.
 * User: felipe
 * Date: 19/03/2017
 * Time: 21:42
 */
session_start();
require_once "conexaoDB.php";
require_once "Aluno.php";
require_once "ServiceDb.php";

$conexao = conexaoDB();

$alunos = new Aluno();

$alunos =  new ServiceDb($conexao, $alunos);

echo "<h2>Listando todos os alunos</h2>";

echo "<div> <a href='index.php' class='btn btn-sm'>home</a></div>";
echo "<div> <a href='incluir.php' class='btn btn-sm'>incluir novo registro</a></div>";
echo "<table class='table table-striped table-hover table-condensed'>";
echo "<tr>
<td>#</td>
<td>Nome</td>
<td>Nota</td>
<td>Opções</td>
</tr>";

foreach ($alunos -> listar() as $aluno) {
    echo "<tr>";
    echo "<td> {$aluno['id']}</td>";
    echo "<td>{$aluno['nome']}</td>";
    echo "<td>{$aluno['nota']}</td>";
    echo "<td>";
    echo "<a href='exibir.php?id={$aluno['id']}' class='btn btn-sm btn-primary'>exibir</a>";
    echo "<a href='editar.php?id={$aluno['id']}' class='btn btn-sm btn-info'>editar</a>";
    echo "<a href='excluir.php?id={$aluno['id']}' class='btn btn-sm btn-danger'>excluir</a>";
    echo "</td>";
    echo "</tr>";
}
echo "</table>";

require_once ('rodape.php');