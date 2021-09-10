<div class="form read-alunos">
    <form action="" method="post">
        <h1>Excluir aluno</h1>
        <hr>
        <h4>Digite o id do aluno para excluir</h4>

        <label for="id">Id</label> <br>
        <input type="number" name="id" id="id" placeholder="Ex:. 404"> <br>
        
        <input type="submit" name="btn_del_aluno" value="Excluir">
    </form>
</div>



<?php
    if (isset($_POST['btn_del_aluno'])) {
        $erros = "";

        if (!$_POST['id'])
            $erros .= "Campo id não preenchido!\\n";
        if(!is_numeric($_POST['id']))
            $erros .= "Campo id precisa ser um valor numérico!\\n";
        
        if (strlen($erros) > 0){
            echo "
                <div class=\"alert\">
                    <div class=\"alert-error\">
                        <h1>ERRO</h1>  <hr>"
                        .$erros. 
                    "</div>
                </div>";
        }else{
            $id = intval($_POST['id']);
            
            require_once "alunos.php";
            deleteAluno($id);
            
            if($sql && mysqli_affected_rows($con) == 0){
                echo "
                <div class=\"alert\">
                    <div class=\"alert-error\">
                        <h1>ERRO</h1>  <hr>
                        Não foi possível excluir o aluno!
                    </div>
                </div>";
                header("refresh");
            }elseif($sql && mysqli_affected_rows($con) > 0){
                echo "
                <div class=\"alert\">
                    <div class=\"alert-sucess\">
                        <h1>ÊXITO</h1>  <hr>
                        Aluno excluído com sucesso!
                    </div>
                </div>";
                header("refresh");
            }
        }
    }
?>