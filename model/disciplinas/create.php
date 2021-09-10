<div class="form create-disciplinas">
    <form action="" method="post">
        <h1>Cadastrar disciplina</h1>
        <hr>
        
        <label for="nome">Nome</label> <br>
        <input type="text" name="nome" id="nome" placeholder="Ex:. Língua Portuguesa"> <br>

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
                    echo "<option value=". $valores["id"] .">". $valores["nome"] ."</option>";
            ?>

        </select> <br>

        <label for="carga">Carga Horária</label> <br>
        <input type="number" name="carga" id="carga" placeholder="Ex:. 80 aulas"> <br>

        
        <input type="submit" name="btn_cad_disc" value="Cadastrar">
    </form>
</div>

<?php
    if(isset($_POST['btn_cad_disc'])){
        $erros = "";

        if (!$_POST['nome'])
            $erros .= "Campo nome não preenchido! <br>";
        if(!$_POST['semestre'])
            $erros .= "Campo semestre não preenchido! <br>";
        if(!$_POST['curso'])
            $erros .= "Campo curso não preenchido! <br>";
        if(!$_POST['carga'])
            $erros .= "Campo carga horária não preenchido! <br>";


        if (!is_string($_POST['nome']))
            $erros .= "Campo nome precisa ser uma string! <br>";
        if(!is_numeric($_POST['semestre']))
            $erros .= "Campo semestre precisa ser um valor numérico! <br>";
        if(!is_numeric($_POST['curso']))
            $erros .= "Campo curso precisa ser um valor numérico! <br>";
        if(!is_numeric($_POST['carga']))
            $erros .= "Campo carga horária precisa ser um valor numérico! <br>";
        if (strlen($_POST['nome']) < 10 )
            $erros .= "Campo nome com valor muito curto (Mínimo de 10 caracteres)! <br>";
        
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
            createDisciplinas($curso, $nome, $semestre, $ano, $carga);
            

            if(mysqli_affected_rows($con) == 0){
                echo "
                    <div class=\"alert\">
                        <div class=\"alert-error\">
                            <h1>ERRO</h1>  <hr>
                                Não foi possível cadastrar a disciplina!
                            </div>
                    </div>";
                header("refresh");
                exit;
            }elseif(mysqli_affected_rows($con) > 0){
                echo "
                    <div class=\"alert\">
                        <div class=\"alert-sucess\">
                            <h1>ÊXITO</h1>  <hr>
                                Disciplina cadastrada com sucesso!
                            </div>
                    </div>";
                header("refresh");
                exit;
            }
        }
    }

