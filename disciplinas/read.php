<div class="form read-alunos">
    <form action="" method="post">
        <h1>Pesquisar disciplina</h1>
        <hr>
        <h4>Digite o id ou o nome da disciplina</h4>

        <label for="id">Id</label> <br>
        <input type="number" name="id" id="id" placeholder="EX:. 1"> <br>

        <label for="nome">Nome</label> <br>
        <input type="text" name="nome" id="nome" placeholder="Ex:. Língua Portuguesa"> <br>
        
        <input type="submit" name="btn_ler_disc" value="Pesquisar">
    </form>
</div>

<?php
    if (isset($_POST['btn_ler_disc'])) {
        if (!$_POST['id'] and !$_POST['nome']) {
            echo "<script>alert(\"Campos vazios, preencha pelo menos um!\")</script>";
            exit;
        }else if($_POST['id']){
            $id = $_POST['id'];
            $query = "SELECT * FROM disciplinas WHERE `id`=\"$id\"";
            $sql = mysqli_query($con, $query);
            $valores = mysqli_fetch_assoc($sql);
            if ($valores <= 0) {
                echo "<script>alert(\"Disciplina ($id) não encontrada!\")</script>";
                exit;
            }
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
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>
                                    ".$valores['id']."
                                </th>
                                <td>
                                    ".$valores['nome']."
                                </td>
                                <td>
                                    ".$valores['curso']."
                                </td>
                            </tr> 
                        </tbody>       
                    </table>
                </div>";

        }elseif ($_POST['nome']) {
            $nome = $_POST['nome'];
            $query = "SELECT * FROM disciplinas WHERE `nome`=\"$nome\"";
            $sql = mysqli_query($con, $query);
            $valores = mysqli_fetch_assoc($sql);
            if ($valores <= 0) {
                echo "<script>alert(\"Disciplina ($nome) não encontrada!\")</script>";
                exit;
            }
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
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>
                                    ".$valores['id']."
                                </th>
                                <td>
                                    ".$valores['nome']."
                                </td>
                                <td>
                                    ".$valores['curso']."
                                </td>
                            </tr> 
                        </tbody>       
                    </table>
                </div>";
        }
    }
            
?>