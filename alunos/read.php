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
            $query = "SELECT * FROM alunos WHERE `id`=$id LIMIT 1";
            $sql = mysqli_query($con, $query);
            $valores = mysqli_fetch_assoc($sql);
            if ($valores <= 0) {
                echo "<script>alert(\"Usuário '$id' não encontrado!\")</script>";
                exit;
            }
        }elseif ($_POST['nome']) {
            $nome = $_POST['nome'];
            $query = "SELECT * FROM alunos WHERE `nome`=\"$nome\" LIMIT 1";
            $sql = mysqli_query($con, $query);
            $valores = mysqli_fetch_assoc($sql);
            if ($valores <= 0) {
                echo "<script>alert(\"Usuário '$nome' não encontrado!\")</script>";
                exit;
            }
            
        }

        echo "
            <table border=\"1\">
                <tr>
                    <td>
                        ID
                    </td>
                    <td>
                        Nome
                    </td>
                    <td>
                        CPF
                    </td>
                    <td>
                        Curso
                    </td>
                    <td>
                        E-mail
                    </td>
                    <td>
                        Telefone
                    </td>
                </tr>
                <tr>
                    <td>".
                        $valores['id']
                    ."</td>
                    <td>".
                        $valores['nome']
                    ."</td>
                    <td>".
                        $valores['cpf']
                    ."</td>
                    <td>".
                        $valores['curso']
                    ."</td>
                    <td>".
                        $valores['email']
                    ."</td>
                    <td>".
                        $valores['telefone']
                    ."</td>
                </tr>

            </table>
        ";

    }

?>