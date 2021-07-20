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

	<label for="nome">Novo nome</label> <br>
        <input type="text" name="nome" id="nome" placeholder="Ex:. (Atualizar)Engenharia de Alimentos"> <br>

        <input type="submit" name="btn_atu_curso" value="Atualizar">
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

    if(isset($_POST['btn_atu_curso'])){
        $erros = "";

	$nome = tratar_input($_POST['nome']);
	$idCurso = tratar_input($_POST['curso']);

	if (empty($idCurso)){
            $erros .= "Nenhum curso selecionado!\\n";
        }
        if (empty($nome)){
            $erros .= "Campo (atualizar)nome não preenchido!\\n";
        }if (!is_string($nome)){
            $erros .= "Campo (atualizar)nome precisa ser uma string!\\n";
        }if (strlen($nome) < 10 ) {
            $erros .= "Campo (atualizar)nome com valor muito curto (Mínimo de 10 caracteres)!\\n";
        }
        
        if (strlen($erros) > 0){
            echo "<script>alert(\"$erros\")</script>";
            header("refresh");
        }else{

            $nome = addslashes($nome);
	    $idCurso = intval($idCurso);

            $query = "UPDATE `cursos` SET `nome`=\"$nome\" WHERE `id`=\"$idCurso\"";
            
	    $sql = mysqli_query($con, $query);
	    //echo "<p>" . var_dump($sql) . "</p>";

            if($sql && mysqli_affected_rows($con) > 0){
                echo "<script>alert(\"Disciplina atualizada com sucesso!\")</script>";
                header("refresh");
                exit;
            }else{
                echo "<script>alert(\"Não foi possível atualizar a disciplina de ($nome)!\\n" . $con->error . "\")</script>";
                header("refresh");
                exit;
            }
        }

	$con->close();
    }


?>
