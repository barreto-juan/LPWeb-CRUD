<div class="form read-alunos">
    <form action="" method="post">
        <h1>Desempenho de notas de um aluno</h1>
        <hr>
        <h4>Digite o id do aluno</h4>

        <label for="id">Id</label> <br>
        <input type="text" name="id" id="id" placeholder="Ex:. 404"> <br>
        
        <input type="submit" name="btn_ler_boletim" value="Pesquisar">
    </form>
</div>

<?php
    if (isset($_POST['btn_ler_boletim'])) {
        if (!$_POST['id']) {
            echo "<script>alert(\"Campo(s) preenchido(s) incorretamente!\")</script>";
            exit;
        }else{
            $id = addslashes($_POST['id']);
            $query = "SELECT * FROM alunos WHERE `id` = \"$id\"";
            $sql = $con->query($query) or die($con->error);
            
            if ($valores = mysqli_fetch_assoc($sql) <= 0) {
                echo "<script>alert(\"Aluno com id ($id) não pode ser encontrado!\")</script>";
                exit;
            }
            else{
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
                </div>";
            }
        }
    }
            
?>