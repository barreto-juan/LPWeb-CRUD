<?php

$errUser = $errPass = "";
$usuario = $senha = "";

$usuario = testarInput($_POST['user']);
$senha = testarInput($_POST['passwd']);
if(strlen($usuario) < 5)
	$errUser = "Usuário deve conter no mínimo 5 caracteres";
$lenSenha = strlen($senha);
if($lenSenha < 6 or $lenSenha > 8)
	$errPass = "Senha deve conter entre 6 e 8 caracteres";

if(strlen($errUser) or strlen($errPass))
	header("Location: ../login.php?errUser=$errUser&errPass=$errPass");
else
	/*alguma coisa*/;


function testarInput($dado)
{
	$dado = trim($dado);
	$dadp = stripslashes($dado);
	$dadp = htmlspecialchars($dado);
	return $dado;
}

