<div class="form read-cursos">
    <form action="#" method="post">
        <h1>Pesquisar cursos</h1>
        <hr>
        <h4>Digite o nome do curso</h4>

        <label for="nome">Nome</label> <br>
        <input type="text" name="nome" id="nome" placeholder="Ex:. Licenciatura em História"> <br>
        
        <input type="submit" name="btn_ler_curso" value="Pesquisar">
    </form>
</div>

<?php

    function tratar_input($data){
	    $data = trim($data);
	    $data = stripslashes($data);
	    $data = htmlspecialchars($data);
	    return $data;
    }	

    if (isset($_POST['btn_ler_curso'])) {
        $erros = "";

	$nome = tratar_input($_POST['nome']);

        if (empty($nome))
            $erros .= "Campo nome não preenchido! <br>";
    	if (!is_string($nome))
            $erros .= "Campo nome precisa ser uma string! <hr>";
        
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
            $sql = readCurso($nome);

            if (mysqli_num_rows($sql) == 0) {
                echo "
                    <div class=\"alert\">
                        <div class=\"alert-error\">
                            <h1>ERRO</h1>  <hr>
                                Nenhum curso encontrado!
                            </div>
                    </div>";
                header("refresh");
                exit;
            }else{

                echo "
                    <div class=\"table-responsive\">
                        <table class=\"table table-hover\">
                            <thead>
                                <tr>
                                    <th>
                                        Id
                                    </th>
                                    <th>
                                        Nome
                                    </th>
                                </tr>
                            </thead>
                    ";
                    while($valores = mysqli_fetch_assoc($sql)){
                        echo "
                            <tbody>
                                <tr>
                                    <th>
                                        ".$valores['id']."
                                    </th>
                                    <td>
                                        ".$valores['nome']."
                                    </td>
                                </tr> 
                            </tbody>       
                        ";
                    }
                    echo "</table>
                        </div>";
                }

            //$con->close();
            }
        }
