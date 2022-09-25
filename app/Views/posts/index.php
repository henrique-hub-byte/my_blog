<div class="container py-5">
    <?= Session::mensagem('post') ?>
    <div class="card">
        <div class="card-header bg-info text-white">
            Postagens
            <div class="float-end">
                <a href="<?= URL ?>/posts/register" class="btn btn-light">Escrever</a>
            </div>
        </div>
        <div class="card-body">
            <?php foreach ($dados['posts'] as $posts) { ?>
                <div class="card my-5 ">
                    <div class="card-header bg-secondary text-white font-weight-bold">
                    <p><?= $posts->titulo ?></p>
                    </div>
                    <div class="card-body">
                        
                        <p class="card-text"><?= $posts->texto ?></p>
                        <a href="<?= URL.'/posts/look/'.$posts->postID?>" class="btn btn-primary float-end">Ler mais</a>
                    </div>
                    <div class="card-footer text-muted">
                        Escrito por: <?= $posts->nome ?>  <?= date('d/m/Y:i', strtotime($posts->postDataCadastro))  ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>