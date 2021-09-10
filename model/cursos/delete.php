<div class="form del-cursos">
    <form action="" method="post">
        <h1>Excluir cursos</h1>
        <hr>
        <h4>Escolha o curso para excluir</h4>

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
            //    echo "<script> alert(\"Ocorreu um erro:\\n" . $con->error . "\") </script>";
            //}
        ?>
        </select> <br><br>
        
        <input type="submit" name="btn_del_curso" value="Excluir">
    </form>
</div>


<?php

    function tratar_input($data){
	    $data = trim($data);
	    $data = stripslashes($data);
	    $data = htmlspecialchars($data);
	    return $data;
    }


        if(isset($_POST['btn_del_curso'])){
            $erros = "";

	    $idCurso = tratar_input($_POST['curso']);

	    if (empty($idCurso))
            $erros .= "Nenhum curso selecionado! <hr>";
        
        if (strlen($erros) > 0){
            echo "
                <div class=\"alert\">
                    <div class=\"alert-error\">
                        <h1>ERRO</h1>  <hr>
                            " . $erros. "
                        </div>
                </div>";
            header("refresh");
            exit;
        }else{

	    $idCurso = intval($idCurso);

        require_once "cursos.php";
        deleteCurso($idCurso);

	    //echo "<p>" . var_dump($sql) . "</p>";

            if(mysqli_affected_rows($con) > 0){
                echo "
                    <div class=\"alert\">
                        <div class=\"alert-sucess\">
                            <h1>ÊXITO</h1>  <hr>
                                Disciplina excluída com sucesso!
                            </div>
                    </div>";
                header("refresh");
                exit;
            }else{
                echo "
                    <div class=\"alert\">
                        <div class=\"alert-error\">
                            <h1>ERRO</h1>  <hr>
                                Não foi possível excluir a disciplina!
                            </div>
                    </div>";
                header("refresh");
                exit;
            }
        }

	//$con->close();
    }
