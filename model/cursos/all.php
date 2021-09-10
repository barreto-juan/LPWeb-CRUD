<div class="form all">
    <form action="" method="post">
        <h1>Todos cursos</h1>
        <hr>
        <h4>Veja abaixo todos nossos atuais cursos</h4>
    </form>
</div>

<?php

    require_once "cursos.php";
    $sql = viewAll();

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
                    </tr>
                </tbody>       
            ";
        }
        echo "
            </table>
        </div>";
