<?php
session_start();

function organiza(){
	if(!isset($_SESSION['login']))
		return "login.php";

        $pagina = "main.php";
            if (isset($_GET['i'])){
                if ($_GET['i'] == "alunos") {
                    $pagina = "model/alunos/index.php";
                }else if ($_GET['i'] == "disciplinas") {
                    $pagina = "model/disciplinas/index.php";
                }else if ($_GET['i'] == "relatorios") {
                    $pagina = "model/relatorios/index.php";
                }else if ($_GET['i'] == "cursos") {
                    $pagina = "model/cursos/index.php";
                }else{
                    $pagina = "main.php";
                }
            }
        
            if (isset($_GET['f'])){
                if (isset($_GET['i']) and $_GET['i'] == "alunos") {
                    if ($_GET['f'] == "create") {
                        $pagina = "model/alunos/create.php";
                    }else if ($_GET['f'] == "read") {
                        $pagina = "model/alunos/read.php";
                    }else if ($_GET['f'] == "update") {
                        $pagina = "model/alunos/update.php";
                    }else if ($_GET['f'] == "delete") {
                        $pagina = "model/alunos/delete.php";
                    }else if ($_GET['f'] == "all") {
                        $pagina = "model/alunos/all.php";
                    }else{
                        $pagina = "model/alunos/index.php";
                    }
                }
        
                if (isset($_GET['i']) and $_GET['i'] == "disciplinas") {
                    if ($_GET['f'] == "create") {
                        $pagina = "model/disciplinas/create.php";
                    }else if ($_GET['f'] == "read") {
                        $pagina = "model/disciplinas/read.php";
                    }else if ($_GET['f'] == "update") {
                        $pagina = "model/disciplinas/update.php";
                    }else if ($_GET['f'] == "delete") {
                        $pagina = "model/disciplinas/delete.php";
                    }else if ($_GET['f'] == "all") {
                        $pagina = "model/disciplinas/all.php";
                    }else{
                        $pagina = "model/disciplinas/index.php";
                    }
                }

		if (isset($_GET['i']) and $_GET['i'] == "cursos") {
                    if ($_GET['f'] == "create") {
                        $pagina = "model/cursos/create.php";
                    }else if ($_GET['f'] == "read") {
                        $pagina = "model/cursos/read.php";
                    }else if ($_GET['f'] == "update") {
                        $pagina = "model/cursos/update.php";
                    }else if ($_GET['f'] == "delete") {
                        $pagina = "model/cursos/delete.php";
                    }else if ($_GET['f'] == "all") {
                        $pagina = "model/cursos/all.php";
                    }else{
                        $pagina = "model/cursos/index.php";
                    }
                }


                if (isset($_GET['i']) and $_GET['i'] == "relatorios") {
                    if ($_GET['f'] == "turmas") {
                        $pagina = "model/relatorios/turmas.php";
                    }else if ($_GET['f'] == "boletim") {
                        $pagina = "model/relatorios/boletim.php";
                    }else if ($_GET['f'] == "des_notas") {
                        $pagina = "model/relatorios/des_notas.php";
                    }else if ($_GET['f'] == "des_media") {
                        $pagina = "model/relatorios/des_media.php";
                    }else{
                        $pagina = "model/relatorios/index.php";
                    }
                }
            }
        return $pagina;
    }

?>
