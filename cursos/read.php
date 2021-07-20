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

    function tratar_input($data)
    {
	    $data = trim($data);
	    $data = stripslashes($data);
	    $data = htmlspecialchars($data);
	    return $data;
    }	

    if (isset($_POST['btn_ler_curso'])) {
        $erros = "";

	$nome = tratar_input($_POST['nome']);

        if (empty($nome)) {
            $erros .= "Campo nome não preenchido!\\n";
        }if (!is_string($nome)) {
            $erros .= "Campo nome precisa ser uma string!\\n";
        }
        
        if (strlen($erros) > 0){
            echo "<script>alert(\"$erros\")</script>";
            header("refresh");
        }else{

            $nome = addslashes($nome);
            $query = "SELECT * FROM cursos WHERE `nome` LIKE '%$nome%'";
            $sql = $con->query($query) or die($con->error);
                
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

	    $con->close();
    }
            
?>
