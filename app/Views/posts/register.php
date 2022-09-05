<div class="col-xl-6 col-md-8 mx-auto p-5">
    <div class="card">
        
            <h2>Cadastrar</h2>
            <small>Preencha seus dados para fa zer seu login</small>
        
            <?= Session::mensagem('user') ?>
            <div class="card-body">
            <form action="<?= URL ?>/posts/register " method="POST" name="register" class="mt-4">

                <div class="form-group">
                    <label for="titulo" class="form-label">Título<sup class="text-danger">*</sup></label>
                    <input type="text" id="titulo" name="titulo" value="<?= $dados['titulo'] ?>" class="form-control <?php if (isset($dados['titulo_erro'])) {
                                                                                                                        echo $dados['titulo_erro'] ? 'is-invalid' : '';
                                                                                                                    }; ?>">
                    <div class="invalid-feedback">
                        <?= $dados['titulo_erro'] ?>
                    </div>
                </div>
                <br>

                <div class="form-group">
                    <label for="texto" class="form-label">Texto:<sup class="text-danger">*</sup></label>
                    <textarea type="text" id="texto" name="texto" 
                    class="form-control <?php if (isset($dados['texto_erro'])) {
                                                                                                                            echo $dados['texto_erro'] ? 'is-invalid' : '';
                                                                                                                        }; ?>"></textarea>
                    <div class="invalid-feedback">
                        <?= $dados['texto_erro'] ?>
                    </div>
                </div>
                <br>
                
                <input type="submit" value="Cadastrar" class="btn btn-info btn-block">
            </form>
        </div>
    </div>
</div>