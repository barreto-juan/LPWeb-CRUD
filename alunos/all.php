<?php
    $query = "select * from alunos";
    $sql = mysqli_query($con, $query);

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
                        ".$valores['cpf']."
                    </td>
                    <td>
                        ".$valores['curso']."
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
?>