<?php

/**
 * Created by PhpStorm.
 * User: felipe
 * Date: 18/03/2017
 * Time: 16:51
 */
interface EntidadeInterface
{
    public function getId();
    public function setId($id);

    public function getTable();
    public function setTable($table);
}