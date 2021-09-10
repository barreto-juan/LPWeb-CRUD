<div class="form all">
    <form action="" method="post">
        <h1>Consulta geral</h1>
        <hr>
        <h4>Selecione a curso</h4>

        <label for="curso">Curso</label> <br>
        <select name="curso" id="curso">
            <option value="">---</option>
            
            <?php
                $query = "SELECT * FROM `cursos`";
                $sql = $con->query($query) or die($con->error);

                while ($valores = mysqli_fetch_array($sql)) {
                    echo "<option value=". $valores["id"] .">". $valores["nome"] ."</option>";
                }

            ?>

        </select> <br>

        <input type="submit" name="btn_all" value="Pesquisar">
    </form>
</div>

<?php
    if(isset($_POST['btn_all'])){
        $erros = "";

        if(!$_POST['curso'])
            $erros .= "Campo curso não preenchido! <hr>";
        if(!is_numeric($_POST['curso']))
            $erros .= "Campo curso precisa ser um valor numérico! <hr>";
        
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
            $id = intval($_POST['curso']);

            require_once "disciplinas.php";
            $sql = viewAll($id);

            if (mysqli_num_rows($sql) == 0) {
                echo "
                <div class=\"alert\">
                    <div class=\"alert-error\">
                        <h1>ERRO</h1>  <hr>
                            Não foi possível encontrar disciplinas neste curso!
                        </div>
                </div>";
                header("refresh");
                exit;
            }else{
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
                                <th>
                                    Semestre
                                </th>
                                <th>
                                    Ano
                                </th>
                                <th>
                                    Carga horária
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
                                    ".$valores['id_curso']."
                                </td>
                                <td>
                                    ".$valores['semestre']."º
                                </td>
                                <td>
                                    ".$valores['ano']."
                                </td>
                                <td>
                                    ".$valores['carga']." aulas
                                </td>
                            </tr> 
                        </tbody>       
                    ";
                }
                echo "</table>
                    </div>";
            }
        }
    }