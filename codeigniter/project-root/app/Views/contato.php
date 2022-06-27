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
          <!--    <li class="nav-item"><a class="nav-link" href="#team">Sobre</a></li> -->
          <li class="nav-item"><a href="<?= base_url('contato'); ?>" class="nav-link" href="#contact">Contato</a></li>
          <a href="<?= base_url('entre-cadastre-se'); ?>" button type="button" class="btn btn-warning"> Entrar </a></button>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Masthead-->
  <header class="masthead">
    <div class="container">
      <h1>Contato</h1>
    </div>
  </header>

  <main>

    <!-- Conteudo visível relevante vai dentro da main -->

    <section class="conteudo">
      <h1>Entre em contato </h1>
    
 <!-- form inicio-->

 <form>

 <div class="form-row">
    <div class="col">
      <input type="text" class="form-control" placeholder="Nome">
    </div>
  <div class="form-group">
    <label for="email1">E-mail</label>
    <input type="email" class="form-control" id="email1" placeholder="Seu melhor e-mail ">
    
  </div>
  <div class="form-group">
    <label for="textarea1">Sua mensagem</label>
    <textarea class="form-control" id="textarea1" rows="3"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Enviar</button>
</form>
</section>


 <!-- form fim -->

    <!-- Conteudo visível relevante vai dentro da main -->

  </main>

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