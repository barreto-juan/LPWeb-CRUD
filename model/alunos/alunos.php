<?php

    require_once "./conexao.php";

    function createAluno($nome, $cpf, $curso, $turma, $email, $telefone){
        global $con;
        $query = "INSERT INTO alunos(`nome`, `cpf`, `id_curso`, `id_turma`, `email`, `telefone`) VALUES(\"$nome\", \"$cpf\", \"$curso\", \"$turma\", \"$email\", \"$telefone\")";
        $sql = $con->query($query) or die($con->error);

        return $sql;
    }

    function readAluno($nome){
        global $con;
        $query = "SELECT * FROM `alunos` WHERE `nome` LIKE '%$nome%'";
        $sql = $con->query($query) or die($con->error);

        return $sql;
    }

    function updateAluno($nome, $cpf, $curso, $turma, $email, $telefone){
        global $con;
        $query = "UPDATE `alunos` SET `nome`=\"$nome\", `cpf`=\"$cpf\", `id_curso`=\"$curso\", `id_turma`=\"$turma\", `email`=\"$email\", `telefone`=\"$telefone\" WHERE `nome`=\"$nome\"";
        $sql = $con->query($query) or die($con->error);

        return $sql;
    }

    function deleteAluno($id){
        global $con;
        $query = "DELETE FROM `alunos` WHERE `id`=$id";
        $sql = $con->query($query) or die($con->error);

        return $sql;
    }

    function viewAll($curso){
        global $con;

        #EXEMPLO : select c.nome as cursos, a.nome as alunos from cursos c, alunos a where c.id = 4

        $query = "SELECT * FROM `alunos` WHERE `id_curso`=$curso";
        $sql = $con->query($query) or die($con->error);

        return $sql;
    }