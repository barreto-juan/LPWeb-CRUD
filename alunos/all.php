<div class="form all">
    <form action="" method="post">
        <h1>Consulta geral</h1>
        <hr>
        <h4>Selecione o curso</h4>

        <label for="curso">Curso</label> <br>
        <select name="curso" id="curso">
            <option value="">---</option>
            
            <?php
                $query = "SELECT * FROM `cursos`";
                $sql = $con->query($query) or die($con->error);

                while ($valores = mysqli_fetch_assoc($sql)){
                    echo "<option value=". $valores["id"]. ">". $valores["nome"] ."</option>";
                }
            ?>

        </select> <br>

        <input type="submit" name="btn_all" value="Pesquisar">
    </form>
</div>

<?php
    if(isset($_POST['btn_all'])){
        $erros = "";

        if (!$_POST['curso'])
            $erros .= "Campo (curso) não foi selecionado!\\n";
        if (!is_numeric($_POST['curso']))
            $erros .= "Campo (curso) precisa ser um valor numérico!\\n";
        
        if (strlen($erros) > 0){
            echo "
                <div class=\"alert\">
                    <div class=\"alert-error\">
                        <h1>ERRO</h1>  <hr>"
                        . $erros .
                    "</div>
                </div>";
                header("refresh");
        } else {
            $curso = intval($_POST['curso']);
            
            require_once "alunos.php";
            viewAll($curso);

            if (mysqli_num_rows($con) == 0){
                echo "
                <div class=\"alert\">
                    <div class=\"alert-error\">
                        <h1>ERRO</h1>  <hr>
                        Não foi possível encontrar alunos neste curso!
                    </div>
                </div>";
                header("refresh");
            } else {
               echo "
                    <div class=\"table-responsive\">
                        <table class=\"table table-hover\">
                            <thead>
                                <tr>
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
                                    <td>
                                        ".$valores['nome']."
                                    </td>
                                    <td>
                                        ".$valores['cpf']."
                                    </td>
                                    <td>
                                        ".$valores['id_curso']."
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
    }

    ?>