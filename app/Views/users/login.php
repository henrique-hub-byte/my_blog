<div class="col-xl-6 col-md-8 mx-auto p-5">
    <div class="card">
        <div class="card-body">
            <h2>Login</h2>
            <small>Preencha seus dados para fazer seu login</small>

            <form action="<?= URL ?>/users/login " method="POST" name="register" class="mt-4">

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
                <div class="row">
                    <div class="col">
                        <input type="submit" class="btn btn-info btn-block" value="Login">
                    </div>
                    <div class="col">
                        <a href="#">Você tem uma conta? Faça login</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>