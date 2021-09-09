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

		if($sql){
			while($valores = mysqli_fetch_assoc($sql)){
				echo "<option value=\"" . $valores['id'] . "\">" . $valores['nome'] . "</option>";
			}
		}
		else{
			echo "<script> alert(\"Ocorreu um erro:\\n" . $con->error . "\") </script>";
		}
	    ?>	
        </select> <br><br>
        
        <input type="submit" name="btn_del_curso" value="Excluir">
    </form>
</div>


<?php

    function tratar_input($data)
    {
	    $data = trim($data);
	    $data = stripslashes($data);
	    $data = htmlspecialchars($data);
	    return $data;
    }	

    if(isset($_POST['btn_del_curso'])){
        $erros = "";

	$idCurso = tratar_input($_POST['curso']);

	if (empty($idCurso)){
            $erros .= "Nenhum curso selecionado!\\n";
        }
        
        if (strlen($erros) > 0){
            echo "<script>alert(\"$erros\")</script>";
            header("refresh");
        }else{

	    $idCurso = intval($idCurso);

            $query = "DELETE FROM cursos WHERE id=\"$idCurso\""; 
            
	    $sql = mysqli_query($con, $query);
	    //echo "<p>" . var_dump($sql) . "</p>";

            if($sql && mysqli_affected_rows($con) > 0){
                echo "<script>alert(\"Disciplina deletada com sucesso!\")</script>";
                header("refresh");
                exit;
            }else{
                echo "<script>alert(\"Não foi possível deletar a disciplina!\\n" . $con->error . "\")</script>";
                header("refresh");
                exit;
            }
        }

	$con->close();
    }


?>
