<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "crud_projeto";

    $con = mysqli_connect($host, $user, $pass);

    if (!mysqli_select_db($con, $db))
        echo "ERRO : <pre>". $con->errno . ": " . $con->error. "</pre> </br>";

    $sql = "CREATE TABLE IF NOT EXISTS `cursos` (
      `id` int(11) not null primary key auto_increment,
      `nome` varchar(255) not null
    );";
    
    $sql .= "INSERT INTO cursos (`id`, `nome`) VALUES
    (1, \"Técnico em Agropecuária\"),
    (2, \"Técnico em Agrimensura\"),
    (3, \"Técnico em Alimentos\"),
    (4, \"Técnico em Informática\"),
    (5, \"Técnico em Meio Ambiente\");";
    
    $sql .= "CREATE TABLE IF NOT EXISTS `disciplinas` (
      `id` int(11) not null primary key auto_increment,
      `id_curso` int(11),
      `nome` varchar(255) not null,
      `semestre` int(11) not null,
      `ano` int(11) not null,
      `carga` int(11) not null,

      foreign key(`id_curso`) references cursos(`id`)
    );";
    
    $sql .= "INSERT INTO disciplinas (`id`, `id_curso`, `nome`, `semestre`, `ano`, `carga`) VALUES
    (1, 3, \"Matemática III\", 2, 2021, 144),
    (2, 1, \"Língua Portuguesa\", 1, 2021, 144),
    (3, 2, \"Geografia\", 1, 2021, 120);";
    
    $sql .= "CREATE TABLE  IF NOT EXISTS `turmas` (
      `id` int(11) not null primary key auto_increment,
      `id_curso` int(11) not null,
      `turma` varchar(255) not null,
      `total_alunos` int(11) not null,

      foreign key(`id_curso`) references cursos(`id`)
    );";
    
    $sql .= "INSERT INTO turmas (`id`, `id_curso`, `turma`, `total_alunos`) VALUES
    (1, 4, \"3InfoB\", 30),
    (2, 4, \"3InfoA\", 30);";
    
    $sql .= "CREATE TABLE IF NOT EXISTS `alunos` (
      `id` int(11) not null primary key auto_increment,
      `id_curso` int(11),
      `id_turma` int(11),
      `nome` varchar(255) not null,
      `cpf` varchar(20) not null,
      `email` varchar(255) not null,
      `telefone` varchar(20) not null,

      foreign key(`id_curso`) references cursos(`id`),
      foreign key(`id_turma`) references turmas(`id`)
    );";

	if (!mysqli_multi_query($con, $sql))
		echo "<script> alert(\"Erro ao criar as tabelas : " . $con->error . "\") </script>";

	$con->close();

?>
