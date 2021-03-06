<div class="form create-alunos">
    <form action="" method="post">
        <h1>Cadastrar aluno</h1>
        <hr>
        <label for="nome">Nome</label> <br>
        <input type="text" name="nome" id="nome" placeholder="Ex:. Jão da Silva"> <br>

        <label for="cpf">CPF</label> <br>
        <input type="text" name="cpf" id="cpf" maxlength="14" pattern="[0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2}" placeholder="Ex:. 123.456.789-10"> <br>

        <label for="curso">Curso</label> <br>
        <select name="curso" id="curso">
            <option value="">---</option>

            <?php 
                $query = "SELECT * FROM cursos";
                $sql = $con->query($query) or die($con->error);
    
                while($valores = mysqli_fetch_assoc($sql)){
                    echo "
                        <option value=". $valores["id"]. ">". $valores["nome"] ."</option>
                    ";
                }
            ?>
        </select> <br>
        
        <label for="turma">Turma</label> <br>
        <select name="turma" id="turma">
            <option value="">---</option>
            
            <?php
                $query = "SELECT * FROM turmas";
                $sql = $con->query($query) or die($con->error);
                
                while($valores = mysqli_fetch_assoc($sql)){
                    echo "
                        <option value=". $valores["id"] .">". $valores["turma"] ."</option>
                    ";
                }
            ?>
        
    </select> <br>
        
        <label for="email">Email</label> <br>
        <input type="email" name="email" id="email" placeholder="Ex:. admin@teste.com"> <br>

        <label for="telefone">Telefone</label> <br>
        <input type="tel" name="telefone" id="telefone" maxlenght="13" pattern="[0-9]{2} [0-9]{5}-[0-9]{4}" placeholder="Ex:. 35 98765-4321"> <br>

        <input type="submit" name="btn_cad_aluno" value="Cadastrar">
    </form>
</div>

<?php
    


    if (isset($_POST['btn_cad_aluno'])) {
        $erros = "";

        if (!$_POST['nome'])
            $erros .= "Campo (nome) não foi preenchido! <hr>";
        if(!$_POST['cpf'])
            $erros .= "Campo (CPF) não foi preenchido! <hr>";
        if(!$_POST['curso'])
            $erros .= "Campo (curso) não foi selecionado! <hr>";
        if(!$_POST['turma'])
            $erros .= "Campo (turma) não foi selecionado! <hr>";
        if(!$_POST['email'])
            $erros .= "Campo (email) não foi preenchido! <hr>";
        if(!$_POST['telefone'])
            $erros .= "Campo (telefone) não foi preenchido! <hr>";
        
        
        if (!is_string($_POST['nome']))
            $erros .= "Campo (nome) precisa ser composto de letras! <hr>";
        if (!is_string($_POST['cpf']))
            $erros .= "Campo (CPF) precisa ser composto por números e separadores! <hr>";
        if (!is_numeric($_POST['curso']))
            $erros .= "Campo (curso) precisa ser composto por um índice! <hr>";
        if (!is_numeric($_POST['turma']))
            $erros .= "Campo (turma) precisa ser composto por um índice! <hr>";
        if (!is_string($_POST['email']))
            $erros .= "Campo (email) precisa ser composto de letras, um arroba(@) e um domínio! <hr>";
        if (!is_string($_POST['telefone']))
            $erros .= "Campo (telefone) precisa ser composto por números e separadores! <hr>";
        
        
        if (strlen($_POST['nome']) < 10 )
            $erros .= "Campo (nome) com tamanho curto! (Mínimo de 10 caracteres) <hr>";
        
        if (strlen($erros) > 0){
            echo "
                <div class=\"alert\">
                    <div class=\"alert-error\">
                        <h1>ERRO</h1>  <hr>"
                        .$erros. 
                    "</div>
                </div>";
        }else{
            $nome = addslashes($_POST['nome']);
            $cpf = addslashes($_POST['cpf']);
            $curso = addslashes($_POST['curso']);
            $turma = addslashes($_POST['turma']);
            $email = addslashes($_POST['email']);
            $telefone = addslashes($_POST['telefone']);

            require_once "alunos.php";
            createAluno($nome, $cpf, $curso, $turma, $email, $telefone);

            if($sql && mysqli_affected_rows($con) == 0){
                echo "
                <div class=\"alert\">
                    <div class=\"alert-error\">
                        <h1>ERRO</h1>  <hr>
                        Não foi possível cadastrar o aluno!
                    </div>
                </div>";
                header("refresh");
                exit;
            }elseif($sql && mysqli_affected_rows($con) > 0){
                echo "
                <div class=\"alert\">
                    <div class=\"alert-sucess\">
                        <h1>ÊXITO</h1>  <hr>
                        Aluno cadastrado com sucesso!
                    </div>
                </div>";
                header("refresh");
                exit;
            }
        }
    }
