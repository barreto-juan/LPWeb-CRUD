<div class="form read-alunos">
    <form action="" method="post">
        <h1>Excluir aluno</h1>
        <hr>
        <h4>Digite o id ou o nome do aluno para excluir</h4>

        <label for="id">Id</label> <br>
        <input type="number" name="id" id="id" placeholder="Ex:. 1"> <br>

        <label for="nome">Nome</label> <br>
        <input type="text" name="nome" id="nome" placeholder="Ex:. Jão da Silva"> <br>
        
        <input type="submit" name="btn_del_aluno" value="Excluir">
    </form>
</div>

<?php
    if (isset($_POST['btn_del_aluno'])) {
        if (!$_POST['id'] and !$_POST['nome']) {
            echo "<script>alert(\"Campos vazios, preencha pelo menos um!\")</script>";
            exit;
        }else if($_POST['id']){
            $id = $_POST['id'];
            $query = "DELETE FROM alunos WHERE `id`=$id";
            $sql = mysqli_query($con, $query);
            
            if (!$sql) {
                echo "<script>alert(\"Usuário '$id' não encontrado!\")</script>";
                exit;
            }
        }elseif ($_POST['nome']) {
            $nome = $_POST['nome'];
            $query = "DELETE FROM alunos WHERE `nome`=\"$nome\"";
            $sql = mysqli_query($con, $query);
            
            if (!$sql) {
                echo "<script>alert(\"Usuário '$nome' não encontrado!\")</script>";
                exit;
            }
            
        }

        echo "<script>alert(\"Usuário excluído com sucesso!\")</script>";
        

    }

?>