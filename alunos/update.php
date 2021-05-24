<div class="form update-alunos">
    <form action="" method="post">
        <h1>Atualizar aluno</h1>
        <hr>

        <label for="nome">Nome</label> <br>
        <input type="text" name="nome" id="nome" placeholder="Ex:. (Atualizar)Jão da Silva"> <br>

        <label for="cpf">CPF</label> <br>
        <input type="text" name="cpf" id="cpf" maxlength="14" pattern="[0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2}" placeholder="Ex:. (Atualizar)123.456.789-10"> <br>

        <label for="curso">Curso</label> <br>
        <select name="curso" id="curso">
            <option value="">---</option>
            <option value="1">Técnico em Agropecuária</option>
            <option value="2">Técnico em Agrimensura</option>
            <option value="3">Técnico em Alimentos</option>
            <option value="4">Técnico em Informática</option>
            <option value="5">Técnico em Meio Ambiente</option>
        </select> <br>
        
        <label for="turma">Turma</label> <br>
        <select name="turma" id="turma">
            <option value="">---</option>
            <option value="1">3InfoA</option>
            <option value="2">3InfoB</option>
        </select> <br>
        
        <label for="email">Email</label> <br>
        <input type="email" name="email" id="email" placeholder="Ex:. (Atualizar)admin@teste.com"> <br>

        <label for="telefone">Telefone</label> <br>
        <input type="tel" name="telefone" id="telefone" maxlenght="13" pattern="[0-9]{2} [0-9]{5}-[0-9]{4}" placeholder="Ex:. (Atualizar)35 98765-4321"> <br>

        <input type="submit" name="btn_atu_aluno" value="Atualizar">
    </form>
</div>

<?php
    if(isset($_POST['btn_atu_aluno'])){
        if (!$_POST['nome'] or !$_POST['cpf'] or !$_POST['curso'] or !$_POST['turma'] or !$_POST['email'] or !$_POST['telefone']) {
            echo "<script>alert(\"Campo(s) preenchido(s) incorretamente!\");</script>";
            exit();
        }else{
            $nome = addslashes($_POST['nome']);
            $cpf = addslashes($_POST['cpf']);
            $curso = addslashes($_POST['curso']);
            $turma = addslashes($_POST['turma']);
            $email = addslashes($_POST['email']);
            $telefone = addslashes($_POST['telefone']);

            $query = "UPDATE `alunos` SET `nome`=\"$nome\", `cpf`=\"$cpf\", `id_curso`=\"$curso\", `id_turma`=\"$turma\", `email`=\"$email\", `telefone`=\"$telefone\" WHERE `nome`=\"$nome\"";
            
            $sql = mysqli_query($con, $query);

            if($sql && mysqli_affected_rows($con) == 0){
                echo "<script>alert(\"Aluno com o ($nome) não pode ser encontrado!\")</script>";
            }elseif($sql && mysqli_affected_rows($con) > 0){
                echo "<script>alert(\"Aluno ($nome) atualizado com sucesso!\")</script>";
            }else{
                echo "<script>alert(\"Não foi possível atualizar o aluno ($nome)!\")</script>";
            }

        }
    }


?>