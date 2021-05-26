<?php
session_start();

function organiza(){
	if(!isset($_SESSION['login']))
		return "login.php";

        $pagina = "main.php";
            if (isset($_GET['i'])){
                if ($_GET['i'] == "alunos") {
                    $pagina = "alunos/index.php";
                }else if ($_GET['i'] == "disciplinas") {
                    $pagina = "disciplinas/index.php";
                }else if ($_GET['i'] == "relatorios") {
                    $pagina = "relatorios/index.php";
                }else{
                    $pagina = "main.php";
                }
            }
        
            if (isset($_GET['f'])){
                if (isset($_GET['i']) and $_GET['i'] == "alunos") {
                    if ($_GET['f'] == "create") {
                        $pagina = "alunos/create.php";
                    }else if ($_GET['f'] == "read") {
                        $pagina = "alunos/read.php";
                    }else if ($_GET['f'] == "update") {
                        $pagina = "alunos/update.php";
                    }else if ($_GET['f'] == "delete") {
                        $pagina = "alunos/delete.php";
                    }else if ($_GET['f'] == "all") {
                        $pagina = "alunos/all.php";
                    }else{
                        $pagina = "alunos/index.php";
                    }
                }
        
                if (isset($_GET['i']) and $_GET['i'] == "disciplinas") {
                    if ($_GET['f'] == "create") {
                        $pagina = "disciplinas/create.php";
                    }else if ($_GET['f'] == "read") {
                        $pagina = "disciplinas/read.php";
                    }else if ($_GET['f'] == "update") {
                        $pagina = "disciplinas/update.php";
                    }else if ($_GET['f'] == "delete") {
                        $pagina = "disciplinas/delete.php";
                    }else if ($_GET['f'] == "all") {
                        $pagina = "disciplinas/all.php";
                    }else{
                        $pagina = "disciplinas/index.php";
                    }
                }

                if (isset($_GET['i']) and $_GET['i'] == "relatorios") {
                    if ($_GET['f'] == "turmas") {
                        $pagina = "relatorios/turmas.php";
                    }else if ($_GET['f'] == "boletim") {
                        $pagina = "relatorios/boletim.php";
                    }else if ($_GET['f'] == "des_notas") {
                        $pagina = "relatorios/des_notas.php";
                    }else if ($_GET['f'] == "des_media") {
                        $pagina = "relatorios/des_media.php";
                    }else{
                        $pagina = "relatorios/index.php";
                    }
                }
            }
        return $pagina;
    }

?>
