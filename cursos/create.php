<div class="form create-cursos">
    <form action="#" method="post">
        <h1>Cadastrar curso</h1>
        <hr>
        
        <label for="nome">Nome</label> <br>
        <input type="text" name="nome" id="nome" placeholder="Ex:. Licenciatura em História"> <br>
        
        <input type="submit" name="btn_cad_curso" value="Cadastrar">
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

    if(isset($_POST['btn_cad_curso'])){
	$erros = "";

	$nome = tratar_input($_POST['nome']);
	
        if (empty($nome)){
            $erros .= "Campo nome não preenchido!\\n";
        }if (!is_string($nome)){
            $erros .= "Campo nome precisa ser uma string!\\n";
        }if (strlen($nome) < 10 ) {
            $erros .= "Campo nome com valor muito curto (Mínimo de 10 caracteres)!\\n";
        }
        
        if (strlen($erros) > 0){
            echo "<script>alert(\"$erros\")</script>";
            header("refresh");
        }else{
            $nome = addslashes($nome);

            $query = "INSERT INTO cursos(`nome`) VALUES(\"$nome\")";
            $sql = mysqli_query($con, $query);

	    //echo "<p>" . var_dump($sql) . "</p>";
	    //echo "<p>" . $con->error . "</p>";

            if(!$sql || mysqli_affected_rows($con) == 0){
                echo "<script>alert(\"Não foi possível cadastrar a disciplina!\")</script>";
                header("refresh");
                exit;
            }elseif($sql && mysqli_affected_rows($con) > 0){
                echo "<script>alert(\"Disciplina cadastrada com sucesso!\")</script>";
                header("refresh");
                exit;
            }
	}

	$con->close();
    }


?>
