<?php 
/* autoload - responsavel pelo carregamento automatico das classes */
    
/* a função spl_autoload_register registra qualquer numero de auloeaders, permitindo que classes e interfaces seja, automaticamente carregas*/
spl_autoload_register(function($classe)  {
            /* lista de diretórios para buscar as classes */
        $diretorios = [
        'Libraries',
            'Helpers'
        ];

        foreach($diretorios as $diretorio){
            /* a constante dir retornar o duretirui di arquivo */
            //DIRECTORY_SEPARATOR é o separador utilizado para percorrer diretórios
            $arquivo =  (__DIR__.DIRECTORY_SEPARATOR.$diretorio.DIRECTORY_SEPARATOR.$classe.'.php');
            if(file_exists($arquivo)){
                require_once(__DIR__.DIRECTORY_SEPARATOR.$diretorio.DIRECTORY_SEPARATOR.$classe.'.php');
            }
        }
    });

?>