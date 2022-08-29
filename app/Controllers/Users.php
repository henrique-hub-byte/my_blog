<?php


class Users extends Controller
{
    public function __construct()
    {
        $this->usuarioModel = $this->model('User');
    }


    public function register()
    {

        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);

        if (isset($formulario)) {
            $dados = [
                'nome' => trim($formulario['nome']),
                'email' => trim($formulario['email']),
                'senha' => trim($formulario['senha']),
                'confirmar_senha' => trim($formulario['confirmar_senha']),
            ];
            if (in_array("", $formulario)) {
                if (empty($formulario['nome'])) {
                    $dados['nome_erro'] = "Preencha o campo nome";
                }
                if (empty($formulario['email'])) {
                    $dados['email_erro'] = "Preencha o campo email";
                }
                if (empty($formulario['senha'])) {
                    $dados['senha_erro'] = "Preencha o campo senha";
                }
                if (empty($formulario['confirmar_senha'])) {
                    $dados['confirmar_senha_erro'] = "Preencha o campo confirmar senha";
                }
            } else {
                if (Check::ChecarNome($formulario['nome'])) {
                    $dados['nome_erro'] = 'O nome informado é invalido';
                } else if (Check::ChecarEmail($formulario['email'])) {
                    $dados['email_erro'] = 'o e-mail informado é invalido';
                } elseif (strlen($formulario['senha']) < 6) {
                    $dados['senha_erro'] = ' A senha deve ter no minimo 6 caracteres';
                } elseif ($formulario['senha'] != $formulario['confirmar_senha']) {
                    $dados['confirmar_senha_erro'] = 'As senha são diferentes';
                } else {

                    $dados['senha'] = password_hash($formulario['senha'], PASSWORD_DEFAULT);

                    if ($this->usuarioModel->armazenar($dados)) {
                        echo 'Cadastro realizado com sucesso';
                    } else {
                        echo "Erro ao armazenar usuario no banco de dados";
                    }
                }
            }

            $senhaSegura = password_hash($formulario['senha'], PASSWORD_DEFAULT);
            /* echo 'Senha hash:' .$senhaSegura .'<br>';    */
            /* var_dump($formulario);  */
        } else {
            $dados = [
                'nome' => '',
                'email' => '',
                'senha' => '',
                'confirmar_senha' => '',
            ];
        };

        $this->view('users/register', $dados);
    }

    /* --------------------LOGIN --------------------- */
    public function login()
    {

        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);

        if (isset($formulario)) {
            $dados = [
                'email' => trim($formulario['email']),
                'senha' => trim($formulario['senha']),
            ];
            if (in_array("", $formulario)) {
                if (empty($formulario['email'])) {
                    $dados['email_erro'] = "Preencha o campo email";
                }
                if (empty($formulario['senha'])) {
                    $dados['senha_erro'] = "Preencha o campo senha";
                }
            } else {
                if (Check::ChecarEmail($formulario['email'])) {
                    $dados['email_erro'] = 'o e-mail informado é invalido';
                } else { 
                    $usuario = $this->usuarioModel->checarLogin($formulario['email'],$formulario['senha']);
                    
                    if ($usuario) {
                        $this->criarSessaoUsuario($usuario);
                    }else{
                        echo "Usuario ou senha invalidos <hr>";    
                    }
                    
                }
            }


            $senhaSegura = password_hash($formulario['senha'], PASSWORD_DEFAULT);
            /* echo 'Senha hash:' .$senhaSegura .'<br>';    */
            /* var_dump($formulario);  */
        } else {
            $dados = [
                'email' => '',
                'senha' => '',
            ];
        };

        $this->view('users/login', $dados);
    }

    private function criarSessaoUsuario($usuario){
        $_SESSION['usuario_id'] = $usuario->id_usuario;
        $_SESSION['usuario_nome'] = $usuario->nome;
        $_SESSION['usuario_email'] = $usuario->email;
    }

    public function sair(){
        unset($_SESSION['usuario_id']);
        unset($_SESSION['usuario_nome']);
        unset($_SESSION['usuario_email']);

        session_destroy();
    }
}
