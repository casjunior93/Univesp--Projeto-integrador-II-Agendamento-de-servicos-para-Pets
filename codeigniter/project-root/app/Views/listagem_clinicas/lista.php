<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="Agendamento de Serviços veterinários" />
  <meta name="author" content="" />
  <title><?= $title; ?>  </title>
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
      <h1>Clínicas e Veterinários</h1>
    </div>
  </header>

  <main class="p-5">
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
      <!-- <form>
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
      </form> -->
    </section>

    <section class="listagem-section">
      <ul class="list-group lista-animais">
        <?php foreach ($dados as $usuario) {
          if (count($servicos) > 0) { ?>
            <li class="list-group-item list-group-item-action flex-column align-items-start p-3 item-animal">
              <div class="d-flex">
                <div class="dados-animal col-12 d-flex align-items-center">
                  <div class="conteudo col-12">
                    <div class="d-flex w-100 justify-content-between">
                      <h5 class="mb-1"><?= $usuario['nome']; ?></h5>
                    </div>
                    <div class="d-flex w-100 justify-content-between pt-2">
                      <div class="texto">
                        <p class="mb-1"><strong>Sobre:</strong> <?= $usuario['descricao']; ?></p>
                        <p class="mb-1"><strong>Endereço:</strong> <?= $usuario['rua']; ?>, <?= $usuario['cidade']; ?>-<?= $usuario['estado']; ?></p>
                        <p class="mb-1"><strong>Telefone:</strong> <?= $usuario['telefone']; ?></p>
                      </div>
                      <div class="botao d-flex align-items-start">
                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#clinica-<?= $usuario['id']; ?>" onclick="limpaValores()">
                          Fazer orçamento
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </li>
        <?php }
        } ?>
      </ul>
    </section>

    <!-- Conteudo visível relevante vai dentro da main -->

  </main>

  <!-- Aqui será renderizado os modais -->
  <?php foreach ($dados as $usuario) {
    if (count($servicos) > 0) { ?>
      <div class="modal fade" id="clinica-<?= $usuario['id']; ?>" tabindex="-1" aria-labelledby="clinicaLabel-<?= $usuario['id']; ?>" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <form class="" action="<?= base_url('agendamento/salvar'); ?>" method="POST">
              <div class="modal-header">
                <h5 class="modal-title" id="clinicaLabel-<?= $usuario['id']; ?>">Fazer orçamento com <strong><?= $usuario['nome']; ?></strong></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="mb-3">
                  <label for="nome" class="form-label">Nome<span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="nome" name="nome" aria-describedby="Nome" required>
                </div>
                <div class="mb-3">
                  <label for="nome" class="form-label">Nome do animal<span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="nome_animal" name="nome_animal" aria-describedby="Nome do animal" required>
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
                  <?php foreach ($servicos as $servico) {
                    if ($servico['id_usuario'] == $usuario['id']) { ?>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="<?= $servico['id']; ?>" id="tosa" name="servicos[]" onclick="calculaTotalServicos(this)" data-valor="<?= $servico['valor']; ?>" data-usuario="<?= $usuario['id']; ?>">
                        <label class="form-check-label" for="tosa">
                          <?= $servico['nome']; ?> - R$<?= $servico['valor']; ?>
                        </label>
                      </div>
                  <?php }
                  } ?>
                </div>
                <div class="mb-3 d-flex">
                  <div class="col-3 p-1">
                    <label for="data" class="form-label">Data<span class="text-danger">*</span></label>
                    <input type="date" class="form-control" id="data" name="data" aria-describedby="data" required>
                  </div>
                  <div class="col-3 p-1">
                    <label for="data" class="form-label">Horas<span class="text-danger">*</span></label>
                    <select name="hora" class="form-control" id="hora">
                      <option value="7">7</option>
                      <option value="8">8</option>
                      <option value="9">9</option>
                      <option value="10">10</option>
                      <option value="11">11</option>
                      <option value="12">12</option>
                      <option value="13">13</option>
                      <option value="14">14</option>
                      <option value="15">15</option>
                      <option value="16">16</option>
                      <option value="17">17</option>
                      <option value="18">18</option>
                    </select>
                  </div>
                  <div class="col-3 p-1">
                    <label for="data" class="form-label">Minutos<span class="text-danger">*</span></label>
                    <select name="minuto" class="form-control" id="minuto">
                      <option value="30">30</option>
                      <option value="00">00</option>
                    </select>
                  </div>
                </div>
                <div class="mb-3">
                  <label for="recados" class="form-label">Recados<span class="text-danger">*</span></label>
                  <textarea class="form-control" aria-label="recados" id="recados" name="recados" required></textarea>
                </div>
                <div class="mb-3">
                  <label for="recados" class="form-label">Método de pagamento<span class="text-danger">*</span></label>
                  <select class="form-select" aria-label="Método de pagamento" name="metodo_pagamento">
                    <option selected>Selecionar</option>
                    <option value="Dinheiro">Dinheiro</option>
                    <option value="Cartão de crédito">Cartão de crédito</option>
                    <option value="PIX">PIX</option>
                  </select>
                </div>
              </div>
              <div class="modal-footer d-flex justify-content-between">
                <span class="valor-final badge bg-warning text-black" style="font-size: 30px;" id="valor-f<?= $usuario['id']; ?>">R$0</span>
                <div class="botoes">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                  <input type="hidden" name="id_usuario" value="<?= $usuario['id']; ?>">
                  <input type="submit" value="Enviar orçamento" class="btn btn-warning">
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
  <?php }
  } ?>
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
  </footer>

  <!-- Scripts da pasta public -->
  <script src="<?= base_url('/'); ?>/js/jquery-3.6.0.min.js"></script>
  <script src="<?= base_url('/'); ?>/bootstrap/bootstrap.js"></script>
  <script src="<?= base_url('/'); ?>/js/scripts.js"></script>
  <script>
    var id_usuario = 0;
    var total = 0;
    var ultimo_vf_id = '';

    function limpaValores() {
      total = 0;
      ultimo_vf_id.innerHTML = 'R$0';
      var inputs = $('input[type=checkbox]');
      inputs.attr('checked', false);
      inputs.prop('checked', false);
    }

    function calculaTotalServicos(el) {
      id_u = el.getAttribute("data-usuario");
      if (id_usuario == 0) {
        id_usuario = id_u;
        if (el.checked) {
          total = total + parseFloat(el.getAttribute("data-valor"));
        } else {
          total = total - parseFloat(el.getAttribute("data-valor"));
        }
        ultimo_vf_id = document.getElementById('valor-f' + id_u)
        ultimo_vf_id.innerHTML = 'R$' + parseFloat(total);
      } else if (id_usuario == id_u) {
        if (el.checked) {
          total = total + parseFloat(el.getAttribute("data-valor"));
        } else {
          total = total - parseFloat(el.getAttribute("data-valor"));
        }
        ultimo_vf_id = document.getElementById('valor-f' + id_u)
        ultimo_vf_id.innerHTML = 'R$' + parseFloat(total);
      } else {
        id_usuario = id_u;
        total = 0;
        ultimo_vf_id.innerHTML = 'R$0';
        if (el.checked) {
          total = total + parseFloat(el.getAttribute("data-valor"));
        } else {
          total = total - parseFloat(el.getAttribute("data-valor"));
        }
        ultimo_vf_id = document.getElementById('valor-f' + id_u)
        ultimo_vf_id.innerHTML = 'R$' + parseFloat(total);
      }
    }
  </script>

</body>

</html>