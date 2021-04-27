<?php
    function organiza(){
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
                    }else{
                        $pagina = "disciplinas/index.php";
                    }
                }

                if (isset($_GET['i']) and $_GET['i'] == "relatorios") {
                    if ($_GET['f'] == "create") {
                        $pagina = "relatorios/create.php";
                    }else if ($_GET['f'] == "read") {
                        $pagina = "relatorios/read.php";
                    }else if ($_GET['f'] == "update") {
                        $pagina = "relatorios/update.php";
                    }else if ($_GET['f'] == "delete") {
                        $pagina = "relatorios/delete.php";
                    }else{
                        $pagina = "relatorios/index.php";
                    }
                }
            }
        return $pagina;
    }

?>