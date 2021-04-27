<div class="form create-alunos">
    <form action="" method="post">
        <h1>Cadastrar aluno</h1>
        <hr>
        <label for="nome">Nome</label> <br>
        <input type="text" name="nome" id="nome" required placeholder="Ex:. Jão da Silva"> <br>

        <label for="cpf">CPF</label> <br>
        <input type="text" name="cpf" id="cpf" maxlength="14" pattern="[0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2}"
       required placeholder="Ex:. 123.456.789-10"> <br>
        
        <label for="curso">Curso</label> <br>
        <select name="curso" id="curso">
            <option value="vazio">---</option>
            <option value="Técnico em Agropecuária">Técnico em Agropecuária</option>
            <option value="Técnico em Agrimensura">Técnico em Agrimensura</option>
            <option value="Técnico em Alimentos">Técnico em Alimentos</option>
            <option value="Técnico em Informática">Técnico em Informática</option>
            <option value="Técnico em Meio Ambiente">Técnico em Meio Ambiente</option>
        </select> <br>
        
        <label for="email">Email</label> <br>
        <input type="email" name="email" id="email" required placeholder="Ex:. admin@teste.com"> <br>

        <label for="telefone">Telefone</label> <br>
        <input type="tel" name="telefone" id="telefone" maxlenght="13" pattern="[0-9]{2} [0-9]{5}-[0-9]{4}" required placeholder="Ex:. 35 98765-4321"> <br>

        <input type="submit" name="btn_cad_aluno" value="Cadastrar">
    </form>
</div>

<?php
    if(isset($_POST['btn_cad_aluno'])){
        if (!$_POST['nome'] or !$_POST['cpf'] or !$_POST['curso'] or !$_POST['email'] or !$_POST['telefone']) {
            echo "<script>alert(\"Campos preenchidos incorretamente!\")</script>";
        }else{
            $nome = addslashes($_POST['nome']);
            $cpf = addslashes($_POST['cpf']);
            $curso = addslashes($_POST['curso']);
            $email = addslashes($_POST['email']);
            $telefone = addslashes($_POST['telefone']);

            //echo "<script>alert(\"Nome=>$nome\\nCPF=>$cpf\\nCurso=>$curso\\nEmail=>$email\\nTelefone=>$telefone\");</script>"; 
            

            $query = "INSERT INTO alunos(`nome`, `cpf`, `curso`, `email`, `telefone`) VALUES(\"$nome\", \"$cpf\", \"$curso\", \"$email\", \"$telefone\")";
            $sql = mysqli_query($con, $query);

            if($sql){
                echo"<script>alert(\"Usuário cadastrado com sucesso!\");</script>";
            }else{
                echo"<script>alert(\"Não foi possível cadastrar esse usuário\");</script>";
            }

        }
    }


?>