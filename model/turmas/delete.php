<div class="form del-disciplinas">
    <form action="" method="post">
        <h1>Excluir disciplinas</h1>
        <hr>
        <h4>Digite o Id da disciplina que deseja excluir</h4>

        <label for="id">Id</label> <br>
        <input type="number" name="id" id="id" placeholder="Ex:. 404"> <br>
        
        <input type="submit" name="btn_del_disc" value="Excluir">
    </form>
</div>



<?php
    if (isset($_POST['btn_del_disc'])) {
        $erros = "";

        if (!$_POST['id'])
            $erros .= "Campo id não preenchido! <hr>";
        if(!is_numeric($_POST['id']))
            $erros .= "Campo id precisa ser um valor numérico! <hr>";
        
        if (strlen($erros) > 0){
            echo "
                <div class=\"alert\">
                    <div class=\"alert-error\">
                        <h1>ERRO</h1>  <hr>
                            ". $erros ."
                        </div>
                </div>";
            header("refresh");
            exit;
        }else{
            $id = intval($_POST['id']);
            
            require_once "disciplinas.php";
            deleteDisciplinas($id);
            
            if(mysqli_affected_rows($con) == 0){
                echo "
                    <div class=\"alert\">
                        <div class=\"alert-error\">
                            <h1>ERRO</h1>  <hr>
                                Não foi possível excluir a disciplina!
                            </div>
                    </div>";
                header("refresh");
                exit;
            }elseif(mysqli_affected_rows($con) > 0){
                echo "
                    <div class=\"alert\">
                        <div class=\"alert-sucess\">
                            <h1>ÊXITO</h1>  <hr>
                                Disciplinas excluída com sucesso!
                            </div>
                    </div>";
                header("refresh");
                exit;
            }
        }
    }
