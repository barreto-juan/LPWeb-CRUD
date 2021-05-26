    <!-- login form -->

    <div class="form login">
    <form action="validations/validate_login.php" method="post">
        <h1>Login</h1>
        <hr>
        <label for="user">Nome de Usuário</label> <br>
	<input type="text" name="user" id="user" required> <br>
	<?php
	if(isset($_GET['errUser']))
		echo "<p style=\"color:red; font-size:15px\">" . $_GET['errUser'] . "</p>";
	?>

        <label for="passwd">Senha</label> <br>
	<input type="password" name="passwd" id="passwd" required> <br>
	<?php
	if(isset($_GET['errPass']))
		echo "<p style=\"color:red; font-size:15px\">" . $_GET['errPass'] . "</p>";
	?>

        <input type="submit" name="btn_login" value="Entrar">
    </form>
    </div>
