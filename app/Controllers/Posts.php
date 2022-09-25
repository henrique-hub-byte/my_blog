<?php

class Posts extends Controller
{

    public function __construct()
    {
        if (!Session::estaLogado()) {
            URL::rediricionar('users/login');
        }

        $this->postModel = $this->model('Post');
        $this->userModel = $this->model('User');
    }

    public function index()
    {
        $dados = [
            'posts' => $this->postModel->lerPosts()
        ];

        $this->view('posts/index', $dados);
    }

    public function register()
    {
        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);

        if (isset($formulario)) {
            $dados = [
                'titulo' => trim($formulario['titulo']),
                'texto' => trim($formulario['texto']),
                'id_usuario' => $_SESSION['usuario_id']

            ];
            if (in_array("", $formulario)) {
                if (empty($formulario['titulo'])) {
                    $dados['titulo_erro'] = "Preencha o campo titulo";
                }
                if (empty($formulario['texto'])) {
                    $dados['texto_erro'] = "Preencha o campo texto";
                }
            } else {

                if ($this->postModel->armazenar($dados)) {
                    Session::mensagem('post', 'Post realizado com sucesso');
                    URL::rediricionar('posts');
                } else {
                    echo "Erro ao armazenar usuario no banco de dados";
                }
            }
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

    public function look($id)
    {

        $post = $this->postModel->lerPostPorId($id);

        if ($post == null) {
            Url::rediricionar('pages/error');
        }

        $user = $this->userModel->lerUserPorId($post->id_usuario);

        $dados = [
            'post' => $post,
            'user' => $user
        ];

        $this->view('posts/look', $dados);
    }


    public function edit($id_posts)
    {
        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);

        if (isset($formulario)) {
            $dados = [
                'id' => $id_posts,
                'titulo' => trim($formulario['titulo']),
                'texto' => trim($formulario['texto'])

            ];
            if (in_array("", $formulario)) {
                if (empty($formulario['titulo'])) {
                    $dados['titulo_erro'] = "Preencha o campo titulo";
                }
                if (empty($formulario['texto'])) {
                    $dados['texto_erro'] = "Preencha o campo texto";
                }
            } else {

                if ($this->postModel->atualizar($dados)) {
                    Session::mensagem('post', 'Post atualizado com sucesso');
                    URL::rediricionar('posts');
                } else {
                    echo "Erro ao atualizar o post no banco de dados";
                }
            }
            /* echo 'Senha hash:' .$senhaSegura .'<br>';    */
            /* var_dump($formulario);  */
        } else {
            $post = $this->postModel->lerPostPorId($id_posts);

            if ($post->usuario_id != $_SESSION['usuario_id']) {
                Session::mensagem('post', 'você não tem autorização para editar esse post', 'alert alert-danger');
                URL::rediricionar('posts');
            }

            $dados = [
                'id' => $post->id_posts,
                'titulo' => $post->titulo,
                'texto' => $post->texto,
                'titulo_erro' => '',
                'texto_erro' => '',
            ];
        };
        var_dump($formulario);
        $this->view('posts/edit', $dados);
    }

    public function delete($id_posts)
    {

        if (!$this->checarAutorizacao($id_posts)) {
            $id_posts = filter_var($id_posts, FILTER_VALIDATE_INT);
            $metodo = filter_input(INPUT_SERVER, 'REQUEST_METHOD', FILTER_SANITIZE_SPECIAL_CHARS);

            if ($id_posts && $metodo == 'POST') {
                if ($this->postModel->destruir($id_posts)) {

                    Session::mensagem('post', 'Post detetado com sucesso');
                    URL::rediricionar('posts');
                } else {

                    Session::mensagem('post', 'você não tem autorização para editar esse post', 'alert alert-danger');
                    URL::rediricionar('posts');
                }
            } else {
                Session::mensagem('post', 'você não tem autorização para editar esse post', 'alert alert-danger');
                URL::rediricionar('posts');
            }
        } else {

            Session::mensagem('post', 'você não tem autorização para editar esse post', 'alert alert-danger');
            URL::rediricionar('posts');
        }
    }

    private function checarAutorizacao($id_posts)
    {
        $post = $this->postModel->lerPostPorId(
            $id_posts
        );;
        if ($post->id_usuario != $_SESSION['usuario_id']) {
            var_dump($_SESSION['usuario_id']);
            return true;
        } else {
            return false;
        }
    }
}
