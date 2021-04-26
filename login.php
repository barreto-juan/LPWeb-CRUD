<div class="login">
    <form action="" method="post">
        <h1>Login</h1>
        
        <hr>

        <label for="nome">Usuário</label> <br>
        <input type="text" name="nome" id="nome"> <br>

        <label for="senha">Senha</label> <br>
        <input type="password" name="senha" id="senha"> <br>

        <input type="submit" name="btn_login" value="Logar">
    </form>
</div>

<?php
require_once("conexao.php");

    if (isset($_POST['btn_login'])) {
        $nome = addslashes($_POST['nome']);
        $senha = addslashes($_POST['senha']);

        echo "<script>alert(\"O seu nome é $nome e senha ". md5($senha) ."\");</script>";
    }


?>