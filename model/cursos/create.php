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
	
        if (empty($nome))
            $erros .= "Campo nome não preenchido! <hr>";
        if (!is_string($nome))
            $erros .= "Campo nome precisa ser uma string! <hr>";
        if (strlen($nome) < 10 )
            $erros .= "Campo nome com valor muito curto (Mínimo de 10 caracteres)! <hr>";
        
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

            require_once "cursos.php";
            createCurso($nome);

	    //echo "<p>" . var_dump($sql) . "</p>";
	    //echo "<p>" . $con->error . "</p>";

            if(mysqli_affected_rows($con) == 0){
                echo "
                    <div class=\"alert\">
                        <div class=\"alert-error\">
                            <h1>ERRO</h1>  <hr>
                                Não foi possível cadastrar o curso!
                            </div>
                    </div>";
                header("refresh");
                exit;
            }elseif( mysqli_affected_rows($con) > 0){
                echo "
                    <div class=\"alert\">
                        <div class=\"alert-sucess\">
                            <h1>ÊXITO</h1>  <hr>
                                Curso cadastrado com sucesso!
                            </div>
                    </div>";
                header("refresh");
                exit;
            }
        }
    }
