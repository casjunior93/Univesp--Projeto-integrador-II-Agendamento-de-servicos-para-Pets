<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title><?= $title; ?> | Mascote web</title>
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
      <a class="navbar-brand" href="#page-top"><img src="<?= base_url('/'); ?>/assets/img/navbar-logo.svg" alt="..." /></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars ms-1"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
          <li class="nav-item"><a class="nav-link" href="<?= base_url('/'); ?>">Mascote Web</a></li>
          <li class="nav-item"><a href="<?= base_url('animais-adocao'); ?>" class="nav-link" href="#portfolio">Animais para adoção </a></li>
          <li class="nav-item"><a class="nav-link" href="#about">Sou Clínica / Hospital</a></li>
          <li class="nav-item"><a class="nav-link" href="#team">Sobre</a></li>
          <li class="nav-item"><a class="nav-link" href="#contact">Contato</a></li>
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

    <!-- Conteudo visível relevante vai dentro da main -->

    <section class="listagem-section">
      <ul class="list-group lista-animais">
        <li class="list-group-item list-group-item-action flex-column align-items-start p-3 item-animal">
          <div class="d-flex">
            <div class="img-animal col-2 d-flex  justify-content-center">
              <img src="https://conteudo.imguol.com.br/c/entretenimento/eb/2022/03/23/cachorro-da-raca-lulu-da-pomeramia-1648065976007_v2_3x4.jpg" alt="Foto do animal Pingo para adoção." height="120">
            </div>
            <div class="dados-animal col-10 d-flex align-items-center">
              <div class="conteudo col-12">
                <div class="d-flex w-100 justify-content-between">
                  <h5 class="mb-1">Pingo</h5>
                  <small class="badge bg-warning text-black">3 anos</small>
                </div>
                <div class="d-flex w-100 justify-content-between pt-2">
                  <div class="texto">
                    <p class="mb-1"><strong>Sobre:</strong> Muito dócil. Foi encontrado abandonado em um terreno baldio quando filhotinho.</p>
                    <p class="mb-1"><strong>Vacinas:</strong> Vacinado para raiva e gripe canina.</p>
                    <p class="mb-1"><strong>Local para adoção:</strong> Clínica Anjos de Patas</p>
                  </div>
                  <div class="botao d-flex align-items-end">
                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#animal-1">
                      Adotar
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </li>
        <li class="list-group-item list-group-item-action flex-column align-items-start p-3 item-animal">
          <div class="d-flex">
            <div class="img-animal col-2 d-flex  justify-content-center">
              <img src="https://seres.vet/blog/wp-content/uploads/2021/04/castracao-de-cachorro-femea.jpg" alt="Foto do animal Estrela para adoção." height="120">
            </div>
            <div class="dados-animal col-10 d-flex align-items-center">
              <div class="conteudo col-12">
                <div class="d-flex w-100 justify-content-between">
                  <h5 class="mb-1">Estrela</h5>
                  <small class="badge bg-warning text-black">1 ano</small>
                </div>
                <div class="d-flex w-100 justify-content-between pt-2">
                  <div class="texto">
                    <p class="mb-1"><strong>Sobre:</strong> Muito dócil e gosta de brincar bastante. Infelizmente foi abandonada na clínica Anjo de Patas.</p>
                    <p class="mb-1"><strong>Vacinas:</strong> Carteira de vacinação completa.</p>
                    <p class="mb-1"><strong>Local para adoção:</strong> Clínica Anjos de Patas</p>
                  </div>
                  <div class="botao d-flex align-items-end">
                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#animal-2">
                      Adotar
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </li>
      </ul>
    </section>

    <!-- Conteudo visível relevante vai dentro da main -->

  </main>

  <!-- Aqui será renderizado os modais -->
  <div class="modal fade" id="animal-1" tabindex="-1" aria-labelledby="animalLabel-1" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form>
          <div class="modal-header">
            <h5 class="modal-title" id="animalLabel-1">Adotar Pingo</h5>
            <p>Entre em contato com a Clínica <strong>Anjos de Patas</strong></p>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email" aria-describedby="email">
            </div>
            <div class="mb-3">
              <label for="telefone" class="form-label">Telefone</label>
              <input type="text" class="form-control" id="telefone" name="telefone" aria-describedby="telefone">
            </div>
            <div class="mb-3">
              <label for="porque-adotar" class="form-label">Fale sobre você e sobre porque você quer adotar o animal</label>
              <textarea class="form-control" aria-label="porque-adotar" id="porque-adotar" name="porque-adotar"></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            <button type="button" class="btn btn-primary">Enviar pedido de adoção</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="modal fade" id="animal-2" tabindex="-1" aria-labelledby="animalLabel-2" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form>
          <div class="modal-header">
            <h5 class="modal-title" id="animalLabel-2">Adotar Estrela</h5>
            <p>Entre em contato com a Clínica <strong>Anjos de Patas</strong></p>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email" aria-describedby="email">
            </div>
            <div class="mb-3">
              <label for="telefone" class="form-label">Telefone</label>
              <input type="text" class="form-control" id="telefone" name="telefone" aria-describedby="telefone">
            </div>
            <div class="mb-3">
              <label for="porque-adotar" class="form-label">Fale sobre você e sobre porque você quer adotar o animal</label>
              <textarea class="form-control" aria-label="porque-adotar" id="porque-adotar" name="porque-adotar"></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            <button type="button" class="btn btn-primary">Enviar pedido de adoção</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Aqui será renderizado os modais -->

  <!-- Footer-->
  <footer class="footer py-4">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-4 text-lg-start">Copyright &copy; Your Website 2022</div>
        <div class="col-lg-4 my-3 my-lg-0">
          <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
          <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
          <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
        </div>

        <div class="col-lg-4 text-lg-end">
          <a class="link-dark text-decoration-none me-3" href="#!">Privacy Policy</a>
          <a class="link-dark text-decoration-none" href="#!">Terms of Use</a>
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