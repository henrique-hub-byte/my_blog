<?php 
    class Pages extends Controller {

        public function index() {
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
    }
?>