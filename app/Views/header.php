<header class="br-dark">
  <div>
    <nav class="navbar navbar-expand-lg navbar-dark  bg-dark">
      <div class="container">
        <a class="navbar-brand" href=" <?= URL ?> ">UnSet</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="<?= URL ?>">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= URL ?>/pages/about">Sobre nós</a>
            </li>
          </ul>
          <div>

            <?php if (isset($_SESSION['usuario_id'])) { ?>
              <div class="d-flex">
                <span class="nav-bar-text">
                  <p style="color: green;"><?= $_SESSION['usuario_nome'] ?> bem vindo(a)</p>
                </span>
                <a class="btn btn-sm btn-danger" href="<?= URL ?>/users/sair">Sair</a>
              </div>

            <?php } else { ?>

              <form class="d-flex">
                <a href="<?= URL ?>/users/login" class="btn btn-outline-success me-2">Login</a>
                <a href="<?= URL ?>/users/register" class="btn btn-outline-success me-2">Cadastrar</a>

              <?php } ?>
              </form>
          </div>
        </div>
      </div>
    </nav>
  </div>
</header>