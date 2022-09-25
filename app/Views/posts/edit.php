<div class="col-xl-6 col-md-8 mx-auto p-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= URL ?>/posts">Posts</a></li>
            <li class="breadcrumb-item active" aria-current="page">Editar</li>
        </ol>
    </nav>


    <div class="card">
        <div class="card-header bg-dark text-white">
            Editar post
        </div>
        <?= Session::mensagem('user') ?>
        <div class="card-body">
            <form action="<?= URL ?>/posts/edit/<?= $dados['id']?> " method="POST" name="register" class="mt-4">

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
                    <textarea type="text" id="texto" rows="5" name="texto" class="form-control <?php if (isset($dados['texto_erro'])) {
                                                                                                    echo $dados['texto_erro'] ? 'is-invalid' : '';
                                                                                                }; ?>"><?= $dados['texto'] ?></textarea>
                    <div class="invalid-feedback">
                        <?= $dados['texto_erro'] ?>
                    </div>
                </div>
                <br>

                <input type="submit" value="Atualizar" class="btn btn-info btn-block">
            </form>
        </div>
    </div>
</div>