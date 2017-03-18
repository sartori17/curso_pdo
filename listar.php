
<?php
/**
 * Created by PhpStorm.
 * User: felipe
 * Date: 18/03/2017
 * Time: 10:55
 */

require_once 'Cliente.php';
require_once 'conexaoDB.php';

$conexao = conexaoDB();

$cliente = new Cliente($conexao);

$cliente -> setNome('Felipe Ssartori')
    -> setEmail('sartori@sartori.com');

$cliente -> setId(1)
    -> setNome('Felipe Ssartori')
    -> setEmail('sartori@sartori.com');

$cliente -> alterar();

//$cliente -> setNome('Felipe Ssartori')
//    -> setEmail('sartori@sartori.com')
//    -> inserir();

foreach ($cliente -> listar() as $c) {
    echo $c['nome']."<br>";
}

//$cliente -> deletar(1);