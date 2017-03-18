<?php

/**
 * Created by PhpStorm.
 * User: felipe
 * Date: 18/03/2017
 * Time: 10:48
 */
class Aluno
{
    private $db;
    private $id;
    private $nome;
    private $nota;

    public function __construct (\PDO $db) {
        $this -> db = $db;
    }

    public function listar () {
        $query = "SELECT * FROM alunos ORDER BY id;";

        $stmt = $this->db->query($query);
        //$stmt->errorInfo();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function inserir () {
        $query = "insert into alunos (nome, nota) VALUES (:nome, :nota);";
        $stmt = $this->db->prepare($query);
        $stmt ->bindValue (':nome', $this->getNome());
        $stmt ->bindValue (':nota', $this->getNota());
        if ($stmt->execute() ){
            return true;
        }
        return false;
    }

    public function alterar () {
        $query = "update alunos set nome = :nome, nota = :nota where id = :id;";
        $stmt = $this->db->prepare($query);
        $stmt ->bindValue (':nome', $this->getNome());
        $stmt ->bindValue (':nota', $this->getNota());
        $stmt ->bindValue (':id', $this->getId());

        if ($stmt->execute() ){
            return true;
        }

        return false;
    }

    public function deletar ($id) {
        $query = "delete from alunos where id = :id;";
        $stmt = $this->db->prepare($query);
        $stmt ->bindValue (':id', $id);
        if ($stmt->execute() ){
            return true;
        }
        return false;
    }

    public function find($id) {
        $query = "SELECT * FROM alunos WHERE id = :id ORDER BY name;";
        $stmt = $this->db->prepare($query);
        $stmt ->bindValue (':id', $id);
        $stmt ->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
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
}