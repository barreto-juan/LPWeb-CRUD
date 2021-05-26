<div class="form update-disciplinas">
    <form action="" method="post">
        <h1>Atualizar disciplinas</h1>
        <hr>

        <label for="nome">Nome</label> <br>
        <input type="text" name="nome" id="nome" placeholder="Ex:. (Atualizar)Língua Portuguesa"> <br>

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
        <input type="number" name="carga" id="carga" placeholder="Ex:. (Atualizar)80 (aulas)"> <br>

        <input type="submit" name="btn_atu_disc" value="Atualizar">
    </form>
</div>

<?php
    if(isset($_POST['btn_atu_disc'])){
        $erros = "";

        if (!$_POST['nome']){
            $erros .= "Campo (atualizar)nome não preenchido!\\n";
        }if(!$_POST['semestre']){
            $erros .= "Campo (atualizar)semestre não preenchido!\\n";
        }if(!$_POST['curso']){
            $erros .= "Campo (atualizar)curso não preenchido!\\n";
        }if(!$_POST['carga']){
            $erros .= "Campo (atualizar)carga horária não preenchido!\\n";
        }if (!is_string($_POST['nome'])){
            $erros .= "Campo (atualizar)nome precisa ser uma string!\\n";
        }if(!is_numeric($_POST['semestre'])){
            $erros .= "Campo (atualizar)semestre precisa ser um valor numérico!\\n";
        }if(!is_numeric($_POST['curso'])){
            $erros .= "Campo (atualizar)curso precisa ser um valor numérico!\\n";
        }if(!is_numeric($_POST['carga'])){
            $erros .= "Campo (atualizar)carga horária precisa ser um valor numérico!\\n";
        }if (strlen($_POST['nome']) < 10 ) {
            $erros .= "Campo (atualizar)nome com valor muito curto (Mínimo de 10 caracteres)!\\n";
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

            $query = "UPDATE `disciplinas` SET `id_curso`=\"$curso\",`nome`=\"$nome\",`semestre`=\"$semestre\",`ano`=\"$ano\",`carga`=\"$carga\" WHERE `nome`=\"$nome\"";
            
            $sql = mysqli_query($con, $query);

            if($sql && mysqli_affected_rows($con) == 0){
                echo "<script>alert(\"Disciplina ($nome) não pode ser encontrada!\")</script>";
                header("refresh");
                exit;
            }elseif($sql && mysqli_affected_rows($con) > 0){
                echo "<script>alert(\"Disciplina atualizada com sucesso!\")</script>";
                header("refresh");
                exit;
            }else{
                echo "<script>alert(\"Não foi possível atualizar a disciplina de ($nome)!\")</script>";
                header("refresh");
                exit;
            }*/
        }
    }


?>