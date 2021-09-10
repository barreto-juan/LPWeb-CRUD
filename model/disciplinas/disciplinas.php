<?php


    function createDisciplinas($curso, $nome, $semestre, $ano, $carga){
        global $con;
        $query = "INSERT INTO disciplinas(`id_curso`, `nome`, `semestre`, `ano`, `carga`) VALUES(\"$curso\", \"$nome\", \"$semestre\", \"$ano\", \"$carga\")";
        $sql = $con->query($query) or die($con->error);
            
        return $sql;
    }


    function readDisciplinas($nome){
        global $con;
        $query = "SELECT * FROM `disciplinas` WHERE `nome` LIKE '%$nome%'";
        $sql = $con->query($query) or die($con->error);

        return $sql;
    }


    function updateDisciplinas($curso, $nome, $semestre, $ano, $carga){
        global $con;
        $query = "UPDATE `disciplinas` SET `id_curso`=\"$curso\",`nome`=\"$nome\",`semestre`=\"$semestre\",`ano`=\"$ano\",`carga`=\"$carga\" WHERE `nome`=\"$nome\"";
        $sql = $con->query($query) or die($con->error);

        return $sql;

        
    }


    function deleteDisciplinas($id){
        global $con;
        $query = "DELETE FROM `disciplinas` WHERE `id`= $id";
        $sql = $con->query($query) or die($con->error);

        return $sql;
    }

    function viewAll($id){
        global $con;
        $query = "SELECT * FROM disciplinas WHERE id_curso = $id";
        $sql = $con->query($query) or die($con->error);

        return $sql;

    }