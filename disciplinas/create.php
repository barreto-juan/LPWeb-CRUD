<div class="form create-alunos">
    <form action="" method="post">
        <h1>Cadastrar disciplina</h1>
        <hr>
        <label for="nome">Nome</label> <br>
        <input type="text" name="nome" id="nome" required placeholder="Ex:. Língua Portuguesa"> <br>

        <label for="curso">Curso</label> <br>
        <select name="curso" id="curso">
            <option value="">---</option>
            <option value="Técnico em Agropecuária">Técnico em Agropecuária</option>
            <option value="Técnico em Agrimensura">Técnico em Agrimensura</option>
            <option value="Técnico em Alimentos">Técnico em Alimentos</option>
            <option value="Técnico em Informática">Técnico em Informática</option>
            <option value="Técnico em Meio Ambiente">Técnico em Meio Ambiente</option>
        </select> <br>
        
        <input type="submit" name="btn_cad_disc" value="Cadastrar">
    </form>
</div>

<?php
    if(isset($_POST['btn_cad_disc'])){
        if (!$_POST['nome'] or !$_POST['curso']) {
            echo "<script>alert(\"Campos preenchidos incorretamente!\")</script>";
        }else{
            $nome = addslashes($_POST['nome']);
            $curso = addslashes($_POST['curso']);

            $query = "INSERT INTO disciplinas(`nome`, `curso`) VALUES(\"$nome\", \"$curso\")";
            $sql = mysqli_query($con, $query);

            if($sql){
                echo"<script>alert(\"Disciplina cadastrada com sucesso!\");</script>";
            }else{
                echo"<script>alert(\"Não foi possível cadastrar essa disciplina!\");</script>";
            }

        }
    }


?>