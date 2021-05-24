<div class="form read-disciplinas">
    <form action="" method="post">
        <h1>Excluir disciplinas</h1>
        <hr>
        <h4>Digite o Id da disciplina para excluir</h4>

        <label for="id">Id</label> <br>
        <input type="number" name="id" id="id" placeholder="Ex:. 404"> <br>
        
        <input type="submit" name="btn_del_disc" value="Excluir">
    </form>
</div>



<?php
    if (isset($_POST['btn_del_disc'])) {
        if (!$_POST['id']) {
            echo "<script>alert(\"Campo(s) preenchido(s) inorretamente!\")</script>";
            exit();
        }else {
            $id = $_POST['id'];
            $query = "DELETE FROM disciplinas WHERE `id`=\"$id\"";
            $sql = $con->query($query) or die($con->error);
            
            if (!$sql) {
                echo "<script>alert(\"Disciplina com id ($id) não pode ser encontrada!\")</script>";
                exit();
            }   
        }
        echo "<script>alert(\"Disciplina excluída com sucesso!\")</script>";
    }
?>