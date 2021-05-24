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
        if(!$_POST['turma']){
            echo "<script>alert(\"Campo(s) preenchido(s) incorretamente!\");</script>";
            exit();
        }else{
            $id = $_POST['turma'];
            $query = "SELECT * FROM disciplinas WHERE id_curso = \"$id\"";
            $sql = $con->query($query) or die($con->error);

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

    ?>