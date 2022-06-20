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
      <h1>Clínicas e Pet Shops</h1>
    </div>
  </header>

  <main class="p-5 pt-0">

    <!-- Conteudo visível relevante vai dentro da main -->
    <section class="listagem-section">
      <form>
        Filtrar por cidade:
        <div class="col-3 d-flex">
          <select class="form-select" aria-label="Método de pagamento">
            <option selected>Selecionar</option>
            <option value="1">Andradas</option>
            <option value="2">Poços de Caldas</option>
            <option value="3">Espírito Santo do Pinhal</option>
          </select>
          <input type="button" value="Filtrar" class="btn btn-warning" style="margin-left: 10px;">
        </div>
      </form>
    </section>

    <section class="listagem-section">
      <ul class="list-group lista-animais">
        <li class="list-group-item list-group-item-action flex-column align-items-start p-3 item-animal">
          <div class="d-flex">
            <div class="img-animal col-2 d-flex  justify-content-center">
              <img src="https://img.elo7.com.br/product/original/290D03C/adesivo-vitrine-pet-shop-clinica-veterinaria-parede-m1t2-salao.jpg" alt="Foto da clínica Anjos de Patas." height="120">
            </div>
            <div class="dados-animal col-10 d-flex align-items-center">
              <div class="conteudo col-12">
                <div class="d-flex w-100 justify-content-between">
                  <h5 class="mb-1">Clínica Anjos de Patas</h5>
                </div>
                <div class="d-flex w-100 justify-content-between pt-2">
                  <div class="texto">
                    <p class="mb-1"><strong>Sobre:</strong> Somos uma clínica que desde 2002 cuidamos muito bem dos pets de nossos clientes.</p>
                    <p class="mb-1"><strong>Endereço:</strong> Rua A, 35, Bairro B, Andradas-MG</p>
                  </div>
                  <div class="botao d-flex align-items-end">
                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#clinica-1">
                      Fazer orçamento
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
  <div class="modal fade" id="clinica-1" tabindex="-1" aria-labelledby="clinicaLabel-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <form>
          <div class="modal-header">
            <h5 class="modal-title" id="clinicaLabel-1">Fazer orçamento com <strong>Clínica Anjos de Patas</strong></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <label for="nome" class="form-label">Nome<span class="text-danger">*</span></label>
              <input type="text" class="form-control" id="nome" name="nome" aria-describedby="Nome" required>
            </div>
            <div class="mb-3">
              <label for="nome" class="form-label">Nome do animal<span class="text-danger">*</span></label>
              <input type="text" class="form-control" id="nome_a" name="nome_a" aria-describedby="Nome do animal" required>
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
              <label for="telefone" class="form-label">Vacinas<span class="text-danger">*</span></label>
              <textarea class="form-control" aria-label="vacinas" id="vacinas" name="vacinas" required></textarea>
            </div>
            <div class="mb-3">
              <label for="#" class="form-label">Serviços<span class="text-danger">*</span></label>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="tosa" name="tosa">
                <label class="form-check-label" for="tosa">
                  Tosa
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="banho" checked>
                <label class="form-check-label" for="banho">
                  Banho
                </label>
              </div>
            </div>
            <div class="mb-3">
              <label for="data" class="form-label">Data<span class="text-danger">*</span></label>
              <input type="date" class="form-control" id="data" name="data" aria-describedby="data" required>
            </div>
            <div class="mb-3">
              <label for="recados" class="form-label">Recados<span class="text-danger">*</span></label>
              <textarea class="form-control" aria-label="recados" id="recados" name="recados" required></textarea>
            </div>
            <div class="mb-3">
              <label for="recados" class="form-label">Método de pagamento<span class="text-danger">*</span></label>
              <select class="form-select" aria-label="Método de pagamento">
                <option selected>Selecionar</option>
                <option value="1">Dinheiro</option>
                <option value="2">Cartão de crédito</option>
                <option value="3">PIX</option>
              </select>
            </div>
          </div>
          <div class="modal-footer d-flex justify-content-between">
            <span class="valor-final badge bg-warning text-black" style="font-size: 30px;">R$200,00</span>
            <div class="botoes">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
              <button type="button" class="btn btn-warning">Enviar orçamento</button>
            </div>
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