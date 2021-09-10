<div class="form update-alunos">
    <form action="" method="post">
        <h1>Atualizar aluno</h1>
        <hr>

        <label for="nome">Nome</label> <br>
        <input type="text" name="nome" id="nome" placeholder="Ex:. (Atualizar) Jão da Silva"> <br>

        <label for="cpf">CPF</label> <br>
        <input type="text" name="cpf" id="cpf" maxlength="14" pattern="[0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2}" placeholder="Ex:. (Atualizar) 123.456.789-10"> <br>

        <label for="curso">Curso</label> <br>
        <select name="curso" id="curso">
            <option value="">---</option>
            
            <?php
                $query = "SELECT * FROM `cursos`";
                $sql = $con->query($query) or die($con->error);

                while ($valores = mysqli_fetch_array($sql))
                    echo "<option value=". $valores["id"] .">". $valores["nome"] ."</option>";
            
            ?>

        </select> <br>
        
        <label for="turma">Turma</label> <br>
        <select name="turma" id="turma">
            <option value="">---</option>
            
            <?php
                $query = "SELECT * FROM `turmas`";
                $sql = $con->query($query) or die($con->error);

                while ($valores = mysqli_fetch_array($sql))
                    echo "<option value=". $valores["id"] .">". $valores["turma"] ."</option>";
            
            ?>

        </select> <br>
        
        <label for="email">Email</label> <br>
        <input type="email" name="email" id="email" placeholder="Ex:. (Atualizar) admin@teste.com"> <br>

        <label for="telefone">Telefone</label> <br>
        <input type="tel" name="telefone" id="telefone" maxlenght="13" pattern="[0-9]{2} [0-9]{5}-[0-9]{4}" placeholder="Ex:. (Atualizar) 35 98765-4321"> <br>

        <input type="submit" name="btn_atu_aluno" value="Atualizar">
    </form>
</div>

<?php

    if (isset($_POST['btn_atu_aluno'])) {
        $erros = "";
        
        if (!$_POST['nome'])
            $erros .= "Campo (atualizar) nome não preenchido! <hr>";
        if(!$_POST['cpf'])
            $erros .= "Campo (atualizar) CPF não preenchido! <hr>";
        if(!$_POST['curso'])
            $erros .= "Campo (atualizar) curso não preenchido! <hr>";
        if(!$_POST['turma'])
            $erros .= "Campo (atualizar) turma não preenchido! <hr>";
        if(!$_POST['email'])
            $erros .= "Campo (atualizar) email não preenchido! <hr>";
        if(!$_POST['telefone'])
            $erros .= "Campo (atualizar) telefone não preenchido! <hr>";
        
        
        if (!is_string($_POST['nome']))
            $erros .= "Campo (atualizar) nome precisa ser uma string! <hr>";
        if(!is_string($_POST['cpf']))
            $erros .= "Campo (atualizar) cpf precisa ser uma string! <hr>";
        if(!is_numeric($_POST['curso']))
            $erros .= "Campo (atualizar) curso precisa ser um valor numérico! <hr>";
        if(!is_numeric($_POST['turma']))
            $erros .= "Campo (atualizar) turma precisa ser um valor numérico! <hr>";
        if (!is_string($_POST['email']))
            $erros .= "Campo (atualizar) email precisa ser uma string! <hr>";
        if (!is_string($_POST['telefone']))
            $erros .= "Campo (atualizar) telefone precisa ser uma string! <hr>";
        if (strlen($_POST['nome']) < 10 )
            $erros .= "Campo (atualizar) nome com valor muito curto (Mínimo de 10 caracteres)! <hr>";
        
        
        if (strlen($erros) > 0){
            echo "
                <div class=\"alert\">
                    <div class=\"alert-error\">
                        <h1>ERRO</h1>  <hr>
                        ". $erros ."
                    </div>
                </div>";
                header("refresh");
                exit;
        }else{
            $nome = addslashes($_POST['nome']);
            $cpf = addslashes($_POST['cpf']);
            $curso = addslashes($_POST['curso']);
            $turma = addslashes($_POST['turma']);
            $email = addslashes($_POST['email']);
            $telefone = addslashes($_POST['telefone']);

            require_once "alunos.php";
            updateAluno($nome, $cpf, $curso, $turma, $email, $telefone);

            if(mysqli_affected_rows($con) == 0){
                echo "
                <div class=\"alert\">
                    <div class=\"alert-error\">
                        <h1>ERRO</h1>  <hr>
                        Aluno com o nome ($nome) não pode ser encontrado!
                    </div>
                </div>";
                header("refresh");
                exit;
            }elseif(mysqli_affected_rows($con) > 0){
                echo "
                <div class=\"alert\">
                    <div class=\"alert-sucess\">
                        <h1>ÊXITO</h1>  <hr>
                        Aluno atualizado com sucesso!
                    </div>
                </div>";
                header("refresh");
                exit;
            }

        }
    }
