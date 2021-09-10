<div class="form update-disciplinas">
    <form action="" method="post">
        <h1>Atualizar disciplinas</h1>
        <hr>

        <label for="nome">Nome</label> <br>
        <input type="text" name="nome" id="nome" placeholder="Ex:. (Atualizar)Língua Portuguesa"> <br>

        <label for="semestre">Semestre</label> <br>
        <select name="semestre" id="semestre">
            <option value="">---</option>
            <option value="1">1º semestre</option>
            <option value="2">2º semestre</option>
        </select> <br>

        <label for="curso">Curso</label> <br>
        <select name="curso" id="curso">
            <option value="">---</option>
            
            <?php
                $query = "SELECT * FROM `cursos`";
                $sql = $con->query($query) or die($con->error);

                while ($valores = mysqli_fetch_array($sql))
                    echo "<option value=". $valores["id"] .">" . $valores["nome"] . "</option>";
            ?>

        </select> <br>

        <label for="carga">Carga Horária</label> <br>
        <input type="number" name="carga" id="carga" placeholder="Ex:. (Atualizar)80 (aulas)"> <br>

        <input type="submit" name="btn_atu_disc" value="Atualizar">
    </form>
</div>

<?php
    if(isset($_POST['btn_atu_disc'])){
        $erros = "";

        if (!$_POST['nome'])
            $erros .= "Campo (atualizar)nome não preenchido! <hr>";
        if(!$_POST['semestre'])
            $erros .= "Campo (atualizar)semestre não preenchido! <hr>";
        if(!$_POST['curso'])
            $erros .= "Campo (atualizar)curso não preenchido! <hr>";
        if(!$_POST['carga'])
            $erros .= "Campo (atualizar)carga horária não preenchido! <hr>";
        if (!is_string($_POST['nome']))
            $erros .= "Campo (atualizar)nome precisa ser uma string! <hr>";
        if(!is_numeric($_POST['semestre']))
            $erros .= "Campo (atualizar)semestre precisa ser um valor numérico! <hr>";
        if(!is_numeric($_POST['curso']))
            $erros .= "Campo (atualizar)curso precisa ser um valor numérico! <hr>";
        if(!is_numeric($_POST['carga']))
            $erros .= "Campo (atualizar)carga horária precisa ser um valor numérico! <hr>";
        if (strlen($_POST['nome']) < 10 ) 
            $erros .= "Campo (atualizar)nome com valor muito curto (Mínimo de 10 caracteres)! <hr>";
        
        
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
            $semestre = addslashes($_POST['semestre']);
            $ano = date("Y");
            $curso = addslashes($_POST['curso']);
            $carga = addslashes($_POST['carga']);

            require_once "disciplinas.php";
            updateDisciplinas($curso, $nome, $semestre, $ano, $carga);


            if(mysqli_affected_rows($con) == 0){
                echo "
                <div class=\"alert\">
                    <div class=\"alert-error\">
                        <h1>ERRO</h1>  <hr>
                            Disciplina não encontrada!
                        </div>
                </div>";
                header("refresh");
                exit;
            }elseif(mysqli_affected_rows($con) > 0){
                echo "
                <div class=\"alert\">
                    <div class=\"alert-sucess\">
                        <h1>ÊXITO</h1>  <hr>
                            Disciplina atualizada com sucesso!
                        </div>
                </div>";
                header("refresh");
                exit;
            }
        }
    }


