<?php
    /* 
     * Classe rota    
     * Cria as URL, carrega os controladores,metodos e parametros
     * FORMATO URL - /controlador/metodo/paramento       
    */

    class Route {
        /* atributos da classe */
        private $controlador = 'Pages';    
        private $metodo = 'index'; 
        private $parametros = []; /* array vazio */

        public function __construct()
        {
            /* se a url existir joga a função url na varialvel $url */
            $url = $this->url() ? $this->url() : [0];/* if else */

            if(file_exists('../app/Controllers/'.ucwords($url[0]).'.php')){
                /* checa se o controlador existe */
                
                /* pega a primeira palavra e deixa em maisculo */
                $this->controlador = ucwords($url[0]);

                /* destroi a variavel especificada */
                unset($url[0]);
            }
            /* requer o controlador */
            require_once '../app/Controllers/'.$this->controlador.'.php';
            $this->controlador = new $this->controlador;

            if(isset($url[1])){
                /* checa se o metodo da classe existe */

                if(method_exists($this->controlador, $url[1])){
                    $this->metodo = $url[1];
                    unset($url[1]);
                }
            }

            /* se existir retornar um array com os valores se não retorna uma rray vazio  */
            $this->parametros = $url ? array_values($url) : [];
           
           /* chama uma dada função de usuario com um array de parametros */
            call_user_func_array([$this->controlador, $this->metodo], $this->parametros);
            
        }

        private function url(){
            $url = filter_input(INPUT_GET,'url',FILTER_SANITIZE_URL);
            if(isset($url)){
                $url = trim(rtrim($url, '/')); /*  tira os espaços */
                $url = explode('/', $url); /* ARRAY? */
                return $url;
            }/* fechei o if, pode se de outro jeito */
        }
    }
?>