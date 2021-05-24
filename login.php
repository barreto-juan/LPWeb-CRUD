<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/img/school-icon.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">    
    
    <title>CRUD - Alunos e Disciplinas</title>
</head>
<body>
    <div class="header">
        
        <a href="?i=index"><img src="assets/img/school-icon.png" alt="school-icon">CRUD - Alunos e Disciplinas</a>
        <span class="options">
            <a href="?i=alunos"><img src="assets/img/student-icon.png" alt="student-icon"></a>
            <a href="?i=disciplinas"><img src="assets/img/subjects-icon.png" alt="sujects-icon"></a>
            <a href="?i=relatorios"><img src="assets/img/report-icon.png" alt="report-icon"></a>
            <a href="logout.php"><img src="assets/img/logout-icon.png" alt="logout-icon"></a>
        </span>
        
    </div>

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

        <input type="submit" name="btn_login" value="Cadastrar">
    </form>
    </div>
</body>
</html>
