<div class="form all">
    <form action="" method="post">
        <h1>Consulta geral</h1>
        <hr>
        <h4>Selecione a turma</h4>

        <label for="turma">Turma</label> <br>
        <select name="turma" id="turma">
            <option value="">---</option>
            <option value="1">Técnico em Agropecuária</option>
            <option value="2">Técnico em Agrimensura</option>
            <option value="3">Técnico em Alimentos</option>
            <option value="4">Técnico em Informática</option>
            <option value="5">Técnico em Meio Ambiente</option>
        </select> <br>

        <input type="submit" name="btn_all" value="Pesquisar">
    </form>
</div>

<?php
    if(isset($_POST['btn_all'])){
        $erros = "";

        if (!$_POST['turma']){
            $erros .= "Campo (turma) não foi selecionado!\\n";
        } if (!is_numeric($_POST['turma'])){
            $erros .= "Campo (turma) precisa ser um valor numérico!\\n";
        }
        
        if (strlen($erros) > 0){
            echo "<script>alert(\"$erros\")</script>";
        } else {

            $id = intval($_POST['turma']);
            $query = "SELECT * FROM alunos WHERE id_curso = \"$id\"";
            $sql = $con->query($query) or die($con->error);

            if (mysqli_num_rows($sql) == 0) {
                echo "<script>alert(\"Aluno não encontrado!\")</script>";
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