<div class="form read-alunos">
    <form action="" method="post">
        <h1>Pesquisar aluno</h1>
        <hr>
        <h4>Digite o id ou o nome do aluno</h4>

        <label for="id">Id</label> <br>
        <input type="number" name="id" id="id" placeholder="EX:. 1"> <br>

        <label for="nome">Nome</label> <br>
        <input type="text" name="nome" id="nome" placeholder="Ex:. Jão da Silva"> <br>
        
        <input type="submit" name="btn_ler_alunos" value="Pesquisar">
    </form>
</div>

<?php
    if (isset($_POST['btn_ler_alunos'])) {
        if (!$_POST['id'] and !$_POST['nome']) {
            echo "<script>alert(\"Campos vazios, preencha pelo menos um!\")</script>";
            exit;
        }else if($_POST['id']){
            $id = $_POST['id'];
            $query = "SELECT * FROM alunos WHERE `id` LIKE \"%$id%\"";
            $sql = mysqli_query($con, $query);
            $valores = mysqli_fetch_assoc($sql);
            if ($valores <= 0) {
                echo "<script>alert(\"Usuário ($id) não encontrado!\")</script>";
                exit;
            }
        }elseif ($_POST['nome']) {
            $nome = $_POST['nome'];
            $query = "SELECT * FROM alunos WHERE `nome` LIKE \"%$nome%\"";
            $sql = mysqli_query($con, $query);
            //$valores = mysqli_fetch_assoc($sql);

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
                                    CPF
                                </th>
                                <th>
                                    Curso
                                </th>
                                <th>
                                    E-mail
                                </th>
                                <th>
                                    Telefone
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
                                    ".$valores['cpf']."
                                </td>
                                <td>
                                    ".$valores['curso']."
                                </td>
                                <td>
                                    ".$valores['email']."
                                </td>
                                <td>
                                    ".$valores['telefone']."
                                </td>
                            </tr> 
                        </tbody>       
                    ";
                }
            echo "</table>
                </div>";
        }
    }
            
?>