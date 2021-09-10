<?php

    require_once "./conexao.php";

    function createCurso($nome){
        global $con;
        $query = "INSERT INTO cursos(`nome`) VALUES(\"$nome\")";
        $sql = $con->query($query) or die($con->error);

        return $sql;
    }

    function readCurso($nome){
        global $con;
        $query = "SELECT * FROM `cursos` WHERE `nome` LIKE '%$nome%'";
        $sql = $con->query($query) or die($con->error);

        return $sql;
    }

    function updateCurso($id, $nome){
        global $con;
        $query = "UPDATE `cursos` SET `nome`=\"$nome\" WHERE `id`=\"$id\"";
        $sql = $con->query($query) or die($con->error);
        
        return $sql;
    }

    function deleteCurso($id){
        global $con;
        $query = "DELETE FROM `cursos` WHERE `id`=$id";
        $sql = $con->query($query) or die($con->error);
        
        return $sql;
    }

    function viewAll(){
        global $con;
        $query = "SELECT * FROM `cursos`";
        $sql = $con->query($query) or die($con->error);
        
        return $sql;
    }