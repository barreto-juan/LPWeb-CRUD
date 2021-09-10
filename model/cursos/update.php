<div class="form update-cursos">
    <form action="#" method="post">
        <h1>Atualizar cursos</h1>
        <hr>

	<label for="curso">Curso</label> <br>
        <select name="curso" id="curso">
	    <option value="">---</option>
	    <?php 
            $query = "SELECT * FROM cursos";
            $sql = $con->query($query);

            //if($sql){
                while($valores = mysqli_fetch_assoc($sql)){
                    echo "<option value=" . $valores['id'] . ">" . $valores['nome'] . "</option>";
                }
            //}
            //else{
            //    echo "<script> alert(\"Ocorreu um erro: <hr>" . $con->error . "\") </script>";
            //}
	    ?>	
        </select> <br><br>

	    <label for="nome">Novo nome</label> <br>
        <input type="text" name="nome" id="nome" placeholder="Ex:. (Atualizar) Engenharia de Alimentos"> <br>

        <input type="submit" name="btn_atu_curso" value="Atualizar">
    </form>
</div>

<?php

    function tratar_input($data){
	    $data = trim($data);
	    $data = stripslashes($data);
	    $data = htmlspecialchars($data);
	    return $data;
    }	

    if(isset($_POST['btn_atu_curso'])){
        $erros = "";

        $nome = tratar_input($_POST['nome']);
        $idCurso = tratar_input($_POST['curso']);

	    if (empty($idCurso))
            $erros .= "Nenhum curso selecionado! <hr>";
        if (empty($nome))
            $erros .= "Campo (atualizar) nome não preenchido! <hr>";
        if (!is_string($nome))
            $erros .= "Campo (atualizar) nome precisa ser uma string! <hr>";
        if (strlen($nome) < 10 ) 
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

            $nome = addslashes($nome);
	        $idCurso = intval($idCurso);

            require_once "cursos.php";
            updateCurso($idCurso, $nome);

	    //echo "<p>" . var_dump($sql) . "</p>";

            if(mysqli_affected_rows($con) > 0){
                echo "
                    <div class=\"alert\">
                        <div class=\"alert-sucess\">
                            <h1>ÊXITO</h1>  <hr>
                                Curso atualizado com sucesso!
                            </div>
                    </div>";
                header("refresh");
                exit;
            }else{
                echo "
                    <div class=\"alert\">
                        <div class=\"alert-error\">
                            <h1>ERRO</h1>  <hr>
                                Não foi possível atualizar o curso!
                            </div>
                    </div>";
                header("refresh");
                exit;
            }
        }

	//$con->close();
    }

