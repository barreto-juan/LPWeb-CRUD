<div class="form create-disciplinas">
    <form action="" method="post">
        <h1>Cadastrar disciplina</h1>
        <hr>
        
        <label for="nome">Nome</label> <br>
        <input type="text" name="nome" id="nome" placeholder="Ex:. Língua Portuguesa"> <br>

        <label for="semestre">Semestre</label> <br>
        <select name="semestre" id="semestre">
            <option value="">---</option>
            <option value="1">1º</option>
            <option value="2">2º</option>
        </select> <br>

        <label for="curso">Curso</label> <br>
        <select name="curso" id="curso">
            <option value="">---</option>
            <option value="1">Técnico em Agropecuária</option>
            <option value="2">Técnico em Agrimensura</option>
            <option value="3">Técnico em Alimentos</option>
            <option value="4">Técnico em Informática</option>
            <option value="5">Técnico em Meio Ambiente</option>
        </select> <br>

        <label for="carga">Carga Horária</label> <br>
        <input type="number" name="carga" id="carga" placeholder="Ex:. 80 (aulas)"> <br>

        
        <input type="submit" name="btn_cad_disc" value="Cadastrar">
    </form>
</div>

<?php
    if(isset($_POST['btn_cad_disc'])){
        $erros = "";

        if (!$_POST['nome']){
            $erros .= "Campo nome não preenchido!\\n";
        }if(!$_POST['semestre']){
            $erros .= "Campo semestre não preenchido!\\n";
        }if(!$_POST['curso']){
            $erros .= "Campo curso não preenchido!\\n";
        }if(!$_POST['carga']){
            $erros .= "Campo carga horária não preenchido!\\n";
        }if (!is_string($_POST['nome'])){
            $erros .= "Campo nome precisa ser uma string!\\n";
        }if(!is_numeric($_POST['semestre'])){
            $erros .= "Campo semestre precisa ser um valor numérico!\\n";
        }if(!is_numeric($_POST['curso'])){
            $erros .= "Campo curso precisa ser um valor numérico!\\n";
        }if(!is_numeric($_POST['carga'])){
            $erros .= "Campo carga horária precisa ser um valor numérico!\\n";
        }if (strlen($_POST['nome']) < 10 ) {
            $erros .= "Campo nome com valor muito curto (Mínimo de 10 caracteres)!\\n";
        }
        
        if (strlen($erros) > 0){
            echo "<script>alert(\"$erros\")</script>";
            header("refresh");
        }else{
            echo "<script>alert(\"Sucesso!\")</script>";
            header("refresh");
            
            /*$nome = addslashes($_POST['nome']);
            $semestre = addslashes($_POST['semestre']);
            $ano = date("Y");
            $curso = addslashes($_POST['curso']);
            $carga = addslashes($_POST['carga']);

            $query = "INSERT INTO disciplinas(`id_curso`, `nome`, `semestre`, `ano`, `carga`) VALUES(\"$curso\", \"$nome\", \"$semestre\", \"$ano\", \"$carga\")";
            $sql = mysqli_query($con, $query);

            if($sql && mysqli_affected_rows($con) == 0){
                echo "<script>alert(\"Não foi possível cadastrar a disciplina!\")</script>";
                header("refresh");
                exit;
            }elseif($sql && mysqli_affected_rows($con) > 0){
                echo "<script>alert(\"Disciplina cadastrada com sucesso!\")</script>";
                header("refresh");
                exit;
            }*/
        }
    }


?>