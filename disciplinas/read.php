<div class="form read-disciplinas">
    <form action="" method="post">
        <h1>Pesquisar disciplinas</h1>
        <hr>
        <h4>Digite o nome da disciplina</h4>

        <label for="nome">Nome</label> <br>
        <input type="text" name="nome" id="nome" placeholder="Ex:. Língua Portuguesa"> <br>
        
        <input type="submit" name="btn_ler_disc" value="Pesquisar">
    </form>
</div>

<?php
    if (isset($_POST['btn_ler_disc'])) {
        $erros = "";

        if (!$_POST['nome']) {
            $erros .= "Campo nome não preenchido!\\n";
        }if (!is_string($_POST['nome'])) {
            $erros .= "Campo nome precisa ser uma string!\\n";
        }
        
        if (strlen($erros) > 0){
            echo "<script>alert(\"$erros\")</script>";
            header("refresh");
        }else{
            echo "<script>alert(\"Sucesso!\")</script>";
            header("refresh");

            /*$nome = addslashes($_POST['nome']);
            $query = "SELECT * FROM disciplinas WHERE `nome` LIKE '%$nome%'";
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
                                <th>
                                    Curso
                                </th>
                                <th>
                                    Semestre
                                </th>
                                <th>
                                    Ano
                                </th>
                                <th>
                                    Carga horária
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
                                <td>
                                    ".$valores['id_curso']."
                                </td>
                                <td>
                                    ".$valores['semestre']."º
                                </td>
                                <td>
                                    ".$valores['ano']."
                                </td>
                                <td>
                                    ".$valores['carga']." aulas
                                </td>
                            </tr> 
                        </tbody>       
                    ";
                }
                echo "</table>
                    </div>";*/
            }
    }
            
?>