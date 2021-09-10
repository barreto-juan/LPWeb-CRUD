<div class="form read-alunos">
    <form action="" method="post">
        <h1>Turmas frequentadas pelo aluno</h1>
        <hr>
        <h4>Digite o id do aluno</h4>

        <label for="id">Id</label> <br>
        <input type="text" name="id" id="id" placeholder="Ex:. 404"> <br>
        
        <input type="submit" name="btn_ler_boletim" value="Pesquisar">
    </form>
</div>

<?php
    if (isset($_POST['btn_ler_boletim'])) {
        $erros = "";

        if (!$_POST['id']) {
            $erros .= "Campo id não preenchido!\\n";
        }if (!is_numeric($_POST['id'])) {
            $erros .= "Campo id precisa ser um valor numérico!\\n";
        }
        
        if (strlen($erros) > 0){
            echo "<script>alert(\"$erros\")</script>";
            header("refresh");
        }else{
            echo "<script>alert(\"Sucesso!\")</script>";
            header("refresh");

            /*$id = addslashes($_POST['id']);
            $query = "SELECT * FROM alunos WHERE `id` = \"$id\"";
            $sql = $con->query($query) or die($con->error);
            
                echo "
                <div class=\"table-responsive\">
                    <table class=\"table table-hover\">
                        <thead>
                            <tr>
                                <th>
                                    Id
                                </th>
                            </tr>
                        </thead>";
            while ($valores = mysqli_fetch_assoc($sql)){
                echo "
                        <tbody>
                            <tr>
                                <th>
                                    ".$valores['id']."
                                </th>
                            </tr> 
                        </tbody>       
                    ";
            }
                echo "
                    </table>
                </div>";*/
            }
    }
            
?>