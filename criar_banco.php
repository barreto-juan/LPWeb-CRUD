<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "crud_projeto";

    $con = mysqli_connect($host, $user, $pass);

    if (!mysqli_select_db($con, $db))
        echo "ERRO : <pre>". $con->errno . ": " . $con->error. "</pre> </br>";

	$sql = "CREATE DATABASE IF NOT EXISTS crud_projeto";
	if ($con->query($sql) === FALSE)
		echo "<script> alert(\"Erro ao criar o banco : " . $con->error . "\") </script>";


	$con->close();

?>
