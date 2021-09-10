<div class="form read-alunos">
    <form action="" method="post">
        <h1>Pesquisar aluno</h1>
        <hr>
        <h4>Digite o nome do aluno</h4>

        <label for="nome">Nome</label> <br>
        <input type="text" name="nome" id="nome" placeholder="Ex:. Jão da Silva"> <br>
        
        <input type="submit" name="btn_ler_alunos" value="Pesquisar">
    </form>
</div>

<?php
    if (isset($_POST['btn_ler_alunos'])) {
        $erros = "";

        if (!$_POST['nome'])
            $erros .= "Campo nome não preenchido! <hr>";
        if (!is_string($_POST['nome']))
            $erros .= "Campo nome precisa ser uma string! <hr>";

        if (strlen($erros) > 0){
            echo "
                <div class=\"alert\">
                    <div class=\"alert-error\">
                        <h1>ERRO</h1>  <hr>"
                        .$erros. 
                    "</div>
                </div>";
        }else{
            $nome = addslashes($_POST['nome']);
            
            require_once "alunos.php";
            $sql = readAluno($nome);
            
            if(mysqli_num_rows($sql) == 0){
                echo "
                <div class=\"alert\">
                    <div class=\"alert-error\">
                        <h1>ERRO</h1>  <hr>
                        Não foi possível encontrar o aluno!
                    </div>
                </div>";
                header("refresh");
                exit;
            } else {
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
                        </thead>";
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
                echo "
                    </table>
                </div>";
            }
        }
    }
