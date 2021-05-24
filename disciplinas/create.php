<div class="form create-disciplinas">
    <form action="" method="post">
        <h1>Cadastrar disciplina</h1>
        <hr>
        
        <label for="nome">Nome</label> <br>
        <input type="text" name="nome" id="nome" placeholder="Ex:. Língua Portuguesa"> <br>

        <label for="semestre">Semestre</label> <br>
        <select name="semestre" id="semestre">
            <option value="">---</option>
            <option value="1">1º</option>
            <option value="2">2º</option>
        </select> <br>

        <label for="curso">Curso</label> <br>
        <select name="curso" id="curso">
            <option value="">---</option>
            <option value="1">Técnico em Agropecuária</option>
            <option value="2">Técnico em Agrimensura</option>
            <option value="3">Técnico em Alimentos</option>
            <option value="4">Técnico em Informática</option>
            <option value="5">Técnico em Meio Ambiente</option>
        </select> <br>

        <label for="carga">Carga Horária</label> <br>
        <input type="number" name="carga" id="carga" placeholder="Ex:. 80 (aulas)"> <br>

        
        <input type="submit" name="btn_cad_disc" value="Cadastrar">
    </form>
</div>

<?php
    if(isset($_POST['btn_cad_disc'])){
        if (!$_POST['nome'] or !$_POST['semestre'] or !$_POST['curso'] or !$_POST['carga']) {
            echo "<script>alert(\"Campo(s) preenchido(s) incorretamente!\")</script>";
        }else{
            $nome = addslashes($_POST['nome']);
            $semestre = addslashes($_POST['semestre']);
            $ano = date("Y");
            $curso = addslashes($_POST['curso']);
            $carga = addslashes($_POST['carga']);

            $query = "INSERT INTO disciplinas(`id_curso`, `nome`, `semestre`, `ano`, `carga`) VALUES(\"$curso\", \"$nome\", \"$semestre\", \"$ano\", \"$carga\")";
            $sql = mysqli_query($con, $query);

            if($sql){
                echo"<script>alert(\"Disciplina cadastrada com sucesso!\");</script>";
            }else{
                echo"<script>alert(\"Não foi possível cadastrar a disciplina!\");</script>";
            }
        }
    }


?>