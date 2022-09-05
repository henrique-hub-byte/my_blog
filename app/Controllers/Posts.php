<?php

    class Posts extends Controller{

        public function __construct()
        {   
            if(!Session::estaLogado()){
                URL::rediricionar('users/login');
            }
        }
        
        public function index (){
            $this->view('posts/index');
        }

        public function register()
    {

        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);

        if (isset($formulario)) {
            $dados = [
                'titulo' => trim($formulario['titulo']),
                'texto' => trim($formulario['texto']),
                
            ];
            if (in_array("", $formulario)) {
                if (empty($formulario['titulo'])) {
                    $dados['titulo_erro'] = "Preencha o campo titulo";
                }
                if (empty($formulario['texto'])) {
                    $dados['texto_erro'] = "Preencha o campo texto";
                }
                
            } else {
                
                    echo 'pode cadastrar o post';
                 
            }

            
            /* echo 'Senha hash:' .$senhaSegura .'<br>';    */
            /* var_dump($formulario);  */
        } else {
            $dados = [
                'titulo' => '',
                'texto' => '',
                'titulo_erro' => '',
                'texto_erro' => '',
                
            ];
        };

        $this->view('posts/register', $dados);
    }
    }
?>