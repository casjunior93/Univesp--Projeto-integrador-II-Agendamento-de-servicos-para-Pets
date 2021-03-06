<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Animais para adoção | Mascote web</title>
  <!-- Favicon-->
  <link rel="icon" type="image/x-icon" href="<?= base_url('/'); ?>/assets/favicon.ico" />
  <!-- Font Awesome icons (free version)-->
  <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>

  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
  <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
  <link href="<?= base_url('/'); ?>/css/modal.css" />
  <link href="<?= base_url('/'); ?>/css/styles.css" rel="stylesheet" />
  <link href="<?= base_url('/'); ?>/bootstrap/bootstrap.css" rel="stylesheet" />
  <link href="<?= base_url('/'); ?>/css/override.css" rel="stylesheet" />
</head>

<body id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
    <a class="navbar-brand" href="#page-top"><img src="<?= base_url('/'); ?>/assets/img/logo.png" alt="Mascote Web" /></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars ms-1"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
          <li class="nav-item"><a class="nav-link" href="<?= base_url('/'); ?>">Mascote Web</a></li>
          <li class="nav-item"><a href="<?= base_url('animais-adocao'); ?>" class="nav-link" href="#portfolio">Adote! </a></li>
          <li class="nav-item"><a href="<?= base_url('clinicas'); ?>" class="nav-link" href="#about">Clínicas e Veterinários</a></li>
          <!-- <li class="nav-item"><a class="nav-link" href="#team">Sobre</a></li> -->
          <li class="nav-item"><a href="<?= base_url('contato'); ?>" class="nav-link" href="#contact">Contato</a></li>
          <a href="<?= base_url('entre-cadastre-se'); ?>" type="button" class="btn btn-warning"> Entrar </a>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Masthead-->
  <header class="masthead">
    <div class="container">
      <h1>Animais para adoção</h1>
    </div>
  </header>

  <main class="p-5 pt-0">
    <!-- Mensagens de erro -->
    <?php if (!empty(session()->getFlashdata('fail'))) : ?>
      <div class='alert alert-danger'><?= session()->getFlashdata('fail'); ?></div>
    <?php endif ?>

    <?php if (!empty(session()->getFlashdata('success'))) : ?>
      <div class='alert alert-success'><?= session()->getFlashdata('success'); ?></div>
    <?php endif ?>
    <!-- Fim de mensagens de erro -->

    <!-- Conteudo visível relevante vai dentro da main -->

    <section class="listagem-section">
      <ul class="list-group lista-animais">
        <?php
        $qtde_animais = count($info_animais);
        if ($qtde_animais == 0) {
          echo '<h3>Nenhum animal disponível para adoção.</h3>';
        }
        ?>
        <?php foreach ($info_animais as $animal) { ?>
          <li class="list-group-item list-group-item-action flex-column align-items-start p-3 item-animal">
            <div class="d-flex">
              <div class="img-animal col-2 d-flex  justify-content-center">
                <img src="<?= $animal['img']; ?>" alt="Foto do animal <?= $animal['nome']; ?> para adoção." class="img-fluid" style="border-radius: 10px; max-height: 150px;">
              </div>
              <div class="dados-animal col-10 d-flex align-items-center">
                <div class="conteudo col-12 p-3">
                  <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1"><?= $animal['nome']; ?></h5>
                    <small class="badge bg-warning text-black"><?= $animal['idade']; ?> ano(s)</small>
                  </div>
                  <div class="d-flex w-100 justify-content-between pt-2">
                    <div class="texto">
                      <p class="mb-1"><strong>Sobre:</strong> <?= $animal['sobre']; ?></p>
                      <p class="mb-1"><strong>Vacinas:</strong> <?= $animal['vacinas']; ?></p>
                      <p class="mb-1"><strong>Local para adoção:</strong> <?= $animal['nome_usuario']; ?></p>
                    </div>
                    <div class="botao d-flex align-items-end">
                      <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#animal-<?= $animal['id']; ?>">
                        Adotar
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </li>
        <?php } ?>
      </ul>
    </section>

    <!-- Conteudo visível relevante vai dentro da main -->

  </main>

  <!-- Aqui será renderizado os modais -->
  <?php foreach ($info_animais as $animal) { ?>
    <div class="modal fade" id="animal-<?= $animal['id']; ?>" tabindex="-1" aria-labelledby="animalLabel-<?= $animal['id']; ?>" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <form class="" action="<?= base_url('salva-contato'); ?>" method="POST">
            <?= csrf_field(); ?>
            <div class="modal-header">
              <h5 class="modal-title" id="animalLabel-<?= $animal['id']; ?>">Adotar <?= $animal['nome']; ?></h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <p>Entre em contato com <strong><?= $animal['nome_usuario']; ?></strong></p>
              <div class="mb-3">
                <label for="nome" class="form-label">Nome<span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="nome" name="nome" aria-describedby="Nome" required>
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Email<span class="text-danger">*</span></label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="email" required>
              </div>
              <div class="mb-3">
                <label for="telefone" class="form-label">Telefone<span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="telefone" name="telefone" aria-describedby="telefone" required>
              </div>
              <div class="mb-3">
                <label for="mensagem" class="form-label">Fale sobre você e sobre porque você quer adotar o animal<span class="text-danger">*</span></label>
                <textarea class="form-control" aria-label="mensagem" id="mensagem" name="mensagem" maxlength="255" required></textarea>
              </div>
              <div class="mb-3">
                <input type="hidden" name="id_usuario" value="<?= $animal['id_usuario']; ?>">
                <input type="hidden" name="nome_animal" value="<?= $animal['nome']; ?>">
                <input type="submit" class="btn btn-warning" value="Enviar contato">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  <?php } ?>
  <!-- Aqui será renderizado os modais -->

  <!--Footer-->
  <footer class="footer py-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 text-lg-start">Copyright &copy; Mascote Web 2022</div>
                <div class="col-lg-4 my-3 my-lg-0">
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a class="link-dark text-decoration-none me-3" href="https://www.univesp.br">UNIVESP - Universidade Virtual do Estado de SP </a><br></p> Projeto Integrador</p>
                    <a class="link-dark text-decoration-none" href="#!"> Termos de uso</a>
                </div>
            </div>
        </div>
    </footer>

  <!-- Scripts da pasta public -->
  <script src="<?= base_url('/'); ?>/js/jquery-3.6.0.min.js"></script>
  <script src="<?= base_url('/'); ?>/bootstrap/bootstrap.js"></script>
  <script src="<?= base_url('/'); ?>/js/scripts.js"></script>

</body>

</html>