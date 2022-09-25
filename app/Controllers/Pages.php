<?php 
    class Pages extends Controller {

        public function index() {
            if(Session::estaLogado()){
                URL::rediricionar('posts');
            }

            $dados = [
                'titulo' => 'Pagina Inicial',
                'descricao' => 'curso de PHP7'
            ];
            
            $this->view('pages/home', $dados );
        }

        public function about() {
            $dados = [
                'tituloPagina' => 'Pagina sobre nós'
            ];


            $this->view('pages/about', $dados );
        } 

        public function error() {
            $dados = [
                'tituloPagina' => 'Pagina não encontrada'
            ];

            $this->view('pages/error', $dados );
        } 
    }
