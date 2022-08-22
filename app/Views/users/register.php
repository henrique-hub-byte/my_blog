<div class="col-xl-6 col-md-8 mx-auto p-5">
    <div class="card">
        <div class="card-body">
            <h2>Cadastre-se</h2> 
            <small>Preencha o formulario abaixo para fazer seu cadastro</small>

            <form action="<?= URL ?>/users/register " method="POST" name="register" class="mt-4">
                <div class="form-group">
                    <label for="nome" class="form-label">Nome:<sup class="text-danger">*</sup> </label>
                    <input type="text" id="nome" name="nome" value="<?= $dados['nome'] ?>" class="form-control <?php if (isset($dados['nome_erro'])) {
                                                                                                                    echo $dados['nome_erro'] ? 'is-invalid' : '';
                                                                                                                }; ?>">
                    <div class="invalid-feedback">
                        <?= $dados['nome_erro'] ?>
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label for="email" class="form-label">E-mail:<sup class="text-danger">*</sup></label>
                    <input type="text" id="email" name="email" value="<?= $dados['email'] ?>" class="form-control <?php if (isset($dados['email_erro'])) {
                                                                                                                        echo $dados['email_erro'] ? 'is-invalid' : '';
                                                                                                                    }; ?>">
                    <div class="invalid-feedback">
                        <?= $dados['email_erro'] ?>
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label for="senha" class="form-label">Senha:<sup class="text-danger">*</sup></label>
                    <input type="password" id="senha" name="senha" value="<?= $dados['senha'] ?>" class="form-control <?php if (isset($dados['senha_erro'])) {
                                                                                                                            echo $dados['senha_erro'] ? 'is-invalid' : '';
                                                                                                                        }; ?>">
                    <div class="invalid-feedback">
                        <?= $dados['senha_erro'] ?>
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label for="confimar_senha" class="form-label">Confirmar Senha:<sup class="text-danger">*</sup></label>
                    <input type="password" id="confirmar_senha" name="confirmar_senha" value="<?= $dados['confirmar_senha'] ?>" class="form-control <?php if (isset($dados['confirmar_senha_erro'])) {
                                                                                                                            echo $dados['confirmar_senha_erro'] ? 'is-invalid' : '';
                                                                                                                                                    }; ?>">
                    <div class="invalid-feedback">
                        <?= $dados['confirmar_senha_erro'] ?>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col">
                        <input type="submit" class="btn btn-info btn-block" value="Cadastrar">
                    </div>
                    <div class="col">
                        <a href="#">Você tem uma conta? Faça login</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>