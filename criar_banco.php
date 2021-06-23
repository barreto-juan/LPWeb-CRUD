<?php
	$host = "localhost";
    $user = "root";
    $pass = "";
    $db = "crud_projeto";

    $con = mysqli_connect($host, $user, $pass);

    if (!mysqli_select_db($con, $db))
        echo "ERRO : <pre>". $con->errno . ": " . $con->error. "</pre> </br>";

	$sql = "CREATE DATABASE crud_projeto";
	if ($con->query($sql) === TRUE)
		echo "Banco de dados criado com sucesso </br>";
	else
		echo "Erro ao criar o banco de dados : " . $con->error . "</br>";


	$con->close();

?>