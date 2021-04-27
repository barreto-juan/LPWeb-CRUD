<?php
    function organiza(){
        $pagina = "main.php";
            if (isset($_GET['i'])){
                if ($_GET['i'] == "alunos") {
                    $pagina = "alunos/index.php";
                }else if ($_GET['i'] == "disciplinas") {
                    $pagina = "disciplinas/index.php";
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
            }
        return $pagina;
    }

?>