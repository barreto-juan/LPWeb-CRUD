<div class="form create-turmas">
    <form action="" method="post">
        <h1>Cadastrar turma</h1>
        <hr>
        
        <label for="nome">Nome</label> <br>
        <input type="text" name="nome" id="nome" placeholder="Ex:. 3E2"> <br>

        <label for="ano">Ano</label> <br>
        <select name="ano" id="ano">
            <option value="">---</option>
            <option value="1">1º ano</option>
            <option value="2">2º ano</option>
	    <option value="3">3º ano</option>
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

        <label for="totalAlunos">Máximo de alunos</label> <br>
        <input type="number" name="totalAlunos" id="totalAlunos" placeholder="Ex:. 35"> <br>

        
        <input type="submit" name="btn_cad_turma" value="Cadastrar">
    </form>
</div>

<?php
    if(isset($_POST['btn_cad_turma'])){
        $erros = "";

        if (!$_POST['nome'])
            $erros .= "Campo nome não preenchido! <br>";
        if(!$_POST['ano'])
            $erros .= "Campo ano não preenchido! <br>";
        if(!$_POST['curso'])
            $erros .= "Campo curso não preenchido! <br>";
        if(!$_POST['totalAlunos'])
            $erros .= "Campo máximo de alunos não preenchido! <br>";


        if (!is_string($_POST['nome']))
            $erros .= "Campo nome precisa ser uma string! <br>";
        if(!is_numeric($_POST['ano']))
            $erros .= "Campo ano precisa ser um valor numérico! <br>";
        if(!is_numeric($_POST['curso']))
            $erros .= "Campo curso precisa ser um valor numérico! <br>";
        if(!is_numeric($_POST['totalAlunos']))
            $erros .= "Campo máximo de alunos precisa ser um valor numérico! <br>";
        if (strlen($_POST['nome']) < 1 )
            $erros .= "Campo nome com valor muito curto (Mínimo de 1 caractere)! <br>";
        
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
            $ano = addslashes($_POST['ano']);
            $curso = addslashes($_POST['curso']);
            $totalAlunos = addslashes($_POST['totalAlunos']);

            require_once "turmas.php";
            createTurmas($curso, $nome, $ano, $totalAlunos);
            

            if(mysqli_affected_rows($con) == 0){
                echo "
                    <div class=\"alert\">
                        <div class=\"alert-error\">
                            <h1>ERRO</h1>  <hr>
                                Não foi possível cadastrar a turma!
                            </div>
                    </div>";
                header("refresh");
                exit;
            }elseif(mysqli_affected_rows($con) > 0){
                echo "
                    <div class=\"alert\">
                        <div class=\"alert-sucess\">
                            <h1>ÊXITO</h1>  <hr>
                                Turma cadastrada com sucesso!
                            </div>
                    </div>";
                header("refresh");
                exit;
            }
        }
    }

