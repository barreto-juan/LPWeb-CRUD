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
        $erros = "";

        if (!$_POST['id']) {
            $erros .= "Campo id não preenchido!\\n";
        }if(!is_numeric($_POST['id'])){
            $erros .= "Campo id precisa ser um valor numérico!\\n";
        }
        
        if (strlen($erros) > 0){
            echo "<script>alert(\"$erros\")</script>";
            header("refresh");
        }else{
            echo "<script>alert(\"Sucesso!\")</script>";
            header("refresh");
            
            /*$id = intval($_POST['id']);
            $query = "DELETE FROM disciplinas WHERE `id`=\"$id\"";
            $sql = $con->query($query) or die($con->error);
            
            if($sql && mysqli_affected_rows($con) == 0){
                echo "<script>alert(\"Não foi possível excluir a disciplina com id ($id)!\")</script>";
                header("refresh");
                exit;
            }elseif($sql && mysqli_affected_rows($con) > 0){
                echo "<script>alert(\"Disciplina excluída com sucesso!\")</script>";
                header("refresh");
                exit;
            }*/
        }
    }
?>