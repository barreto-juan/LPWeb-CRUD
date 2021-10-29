<div class="form read-disciplinas">
    <form action="" method="post">
        <h1>Pesquisar disciplinas</h1>
        <hr>
        <h4>Digite o nome da disciplina</h4>

        <label for="nome">Nome</label> <br>
        <input type="text" name="nome" id="nome" placeholder="Ex:. Língua Portuguesa"> <br>
        
        <input type="submit" name="btn_ler_disc" value="Pesquisar">
    </form>
</div>

<?php
    if (isset($_POST['btn_ler_disc'])) {
        $erros = "";

        if (!$_POST['nome'])
            $erros .= "Campo nome não preenchido! <hr>";
        if (!is_string($_POST['nome']))
            $erros .= "Campo nome precisa ser uma string! <hr>";
        
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
            $nome = addslashes($_POST['nome']);
            
            require_once "disciplinas.php";
            $sql = readDisciplinas($nome);

            if (mysqli_num_rows($sql) == 0) {
                echo "
                <div class=\"alert\">
                    <div class=\"alert-error\">
                        <h1>ERRO</h1>  <hr>
                            Disciplina não encontrada!
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
            
