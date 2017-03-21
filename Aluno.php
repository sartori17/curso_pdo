<?php
/**
 * Created by PhpStorm.
 * User: felipe
 * Date: 18/03/2017
 * Time: 10:48
 */

require_once 'EntidadeInterface.php';

class Aluno implements EntidadeInterface
{

    private $table = "alunos";
    private $id;
    private $nome;
    private $nota;


    /**
     * @param string $table
     */
    public function setTable($table)
    {
        $this->table = $table;
        return $this;
    }

    /**
     * @return string
     */
    public function getTable()
    {
        return $this->table;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNota()
    {
        return $this->nota;
    }

    /**
     * @param mixed $nota
     */
    public function setNota($nota)
    {
        $this->nota = $nota;
        return $this;
    }

    public function listar()
    {
        // TODO: Implement listar() method.
    }

    public function find($id)
    {
        // TODO: Implement find() method.
    }
}