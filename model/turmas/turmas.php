<?php


    function createTurmas($curso, $nome, $ano, $totalAlunos){
        global $con;
        $query = "INSERT INTO turmas(`id_curso`, `nome`, `ano`, `total_aluno`) VALUES(\"$curso\", \"$nome\", \"$ano\", \"$totalAlunos\")";
        $sql = $con->query($query) or die($con->error);
            
        return $sql;
    }


    function readTurmas($nome){
        global $con;
        $query = "SELECT * FROM `turmas` WHERE `nome` LIKE '%$nome%'";
        $sql = $con->query($query) or die($con->error);

        return $sql;
    }


    function updateTurmas($curso, $nome, $ano, $totalAlunos){
        global $con;
        $query = "UPDATE `turmas` SET `id_curso`=\"$curso\",`nome`=\"$nome\",`ano`=\"$ano\",`total_alunos`=\"$totalAlunos\" WHERE `nome`=\"$nome\"";
        $sql = $con->query($query) or die($con->error);

        return $sql;

        
    }


    function deleteTurmas($id){
        global $con;
        $query = "DELETE FROM `turmas` WHERE `id`= $id";
        $sql = $con->query($query) or die($con->error);

        return $sql;
    }

    function viewAll($id){
        global $con;
        $query = "SELECT * FROM turmas WHERE id_curso = $id";
        $sql = $con->query($query) or die($con->error);

        return $sql;

    }
