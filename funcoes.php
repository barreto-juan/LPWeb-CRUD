<?php
    
    function organiza(){
        $url = "$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $array = explode("/", $url);

        switch ($array[count($array)-1]) {
                //********ALUNOS********
            case '?i=alunos':
                require_once("alunos/index.php");
                break;
            
                //********DISCIPLINAS********
            case '?i=disciplinas':
                require_once("disciplinas/index.php");
                break;
            
                //********ALUNOS-CRIAR********
            case '?i=alunos&f=create':
                require_once("alunos/create.php");
                break;
            
                //********ALUNOS-LER********
            case '?i=alunos&f=read':
                require_once("alunos/read.php");
                break;
            
                //********ALUNOS-ATUALIZAR********
            case '?i=alunos&f=update':
                require_once("alunos/update.php");
                break;
            
                //********ALUNOS-DELETAR********
            case '?i=alunos&f=delete':
                require_once("alunos/delete.php");
                break;

                //********DISCIPLINAS-CRIAR********
            case '?i=disciplinas&f=create':
                require_once("disciplinas/create.php");
                break;
            
                //********DISCIPLINAS-LER********
            case '?i=disciplinas&f=read':
                require_once("disciplinas/read.php");
                break;
            
                //********DISCIPLINAS-ATUALIZAR********
            case '?i=disciplinas&f=update':
                require_once("disciplinas/update.php");
                break;
            
                //********DISCIPLINAS-DELETAR********
            case '?i=disciplinas&f=delete':
                require_once("disciplinas/delete.php");
                break;
            
                //********PAGINA-PRINCIPAL DO SITE********
            default:
                require_once("main.php");
                break;
        }
    }



?>