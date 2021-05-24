<div class="form read-alunos">
    <form action="" method="post">
        <h1>Excluir aluno</h1>
        <hr>
        <h4>Digite o Id do aluno para excluir</h4>

        <label for="id">Id</label> <br>
        <input type="number" name="id" id="id" placeholder="Ex:. 404"> <br>
        
        <input type="submit" name="btn_del_aluno" value="Excluir">
    </form>
</div>



<?php
    if (isset($_POST['btn_del_aluno'])) {
        if (!$_POST['id']) {
            echo "<script>alert(\"Campo(s) preenchido(s) inorretamente!\")</script>";
            exit();
        }else {
            $id = $_POST['id'];
            $query = "DELETE FROM alunos WHERE `id`=\"$id\"";
            $sql = $con->query($query) or die($con->error);
            
            if (!$sql) {
                echo "<script>alert(\"Aluno com id ($id) não pode ser encontrado!\")</script>";
                exit();
            }   
        }
        echo "<script>alert(\"Aluno excluído com sucesso!\")</script>";
    }
?>