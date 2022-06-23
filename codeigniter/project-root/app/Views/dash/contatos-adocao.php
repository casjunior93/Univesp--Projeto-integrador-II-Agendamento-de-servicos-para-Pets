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

    <script>
        $(function() {
            $("#datepicker").datepicker();
        });
    </script>


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
                    <li class="nav-item"><a href="<?= base_url('animais-adocao'); ?>" class="nav-link" href="#portfolio">Adote! </a></li>
                    <li class="nav-item"><a href="<?= base_url('clinicas'); ?>" class="nav-link" href="#about">Clínicas e Veterinários</a></li>
                    <!--    <li class="nav-item"><a class="nav-link" href="#team">Sobre</a></li> -->
                    <li class="nav-item"><a href="<?= base_url('contato'); ?>" class="nav-link" href="#contact">Contato</a></li>
                    <a href="<?= base_url('login/sair'); ?>" type="button" class="btn btn-warning"> Sair </a>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead">
        <div class="container">
            <h1>Meu Dashboard</h1>
        </div>
    </header>

    <main class="p-5 pt-0">
        <section class="d-flex justify-content-between">
            <h3 class="olaUser text-black">Olá, <?= isset($info_usuario['nome']) ? $info_usuario['nome'] : session()->getFlashdata('nome'); ?>!</h3>
        </section>

        <!-- Mensagens de erro -->
        <?php if (!empty(session()->getFlashdata('fail'))) : ?>
            <div class='alert alert-danger'><?= session()->getFlashdata('fail'); ?></div>
        <?php endif ?>

        <?php if (!empty(session()->getFlashdata('success'))) : ?>
            <div class='alert alert-success'><?= session()->getFlashdata('success'); ?></div>
        <?php endif ?>
        <!-- Fim de mensagens de erro -->

        <section class="d-flex justify-content-between">
            <h3 class="pb-3">Contatos para adoção</h3>
            <div>
                <!-- Button trigger modal -->
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    Adicionar animal
                </button>

                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Cadastrar novo animal</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="" action="<?= base_url('animais/salvar'); ?>" method="POST">
                                    <?= csrf_field(); ?>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputName">Nome do animal<span class="text-danger">*</span></label>
                                            <input type="text" id="nome" name="nome" class="form-control" value="<?= set_value('nome'); ?>" required>
                                            <?php
                                            if (isset($validation) && mostra_erro($validation, 'nome') != '') {
                                                echo '<div class="alert alert-danger">';
                                                echo mostra_erro($validation, 'nome');
                                                echo '</div>';
                                            }
                                            ?>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputName">Vacinas<span class="text-danger">*</span></label>
                                            <input type="text" id="vacinas" name="vacinas" class="form-control" value="<?= set_value('vacinas'); ?>" required>
                                            <?php
                                            if (isset($validation) && mostra_erro($validation, 'vacinas') != '') {
                                                echo '<div class="alert alert-danger">';
                                                echo mostra_erro($validation, 'vacinas');
                                                echo '</div>';
                                            }
                                            ?>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="sobre">Sobre<span class="text-danger">*</span></label>
                                            <input type="text" id="sobre" name="sobre" class="form-control" value="<?= set_value('vacinas'); ?>" required>
                                            <?php
                                            if (isset($validation) && mostra_erro($validation, 'sobre') != '') {
                                                echo '<div class="alert alert-danger">';
                                                echo mostra_erro($validation, 'sobre');
                                                echo '</div>';
                                            }
                                            ?>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="sobre">Idade<span class="text-danger">*</span></label>
                                            <input type="number" id="sobre" name="idade" class="form-control" value="<?= set_value('idade'); ?>" required>
                                            <?php
                                            if (isset($validation) && mostra_erro($validation, 'idade') != '') {
                                                echo '<div class="alert alert-danger">';
                                                echo mostra_erro($validation, 'idade');
                                                echo '</div>';
                                            }
                                            ?>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="img">Link da Foto<span class="text-danger">*</span></label>
                                            <input type="text" id="img" name="img" class="form-control" value="<?= set_value('img'); ?>" required>
                                            <?php
                                            if (isset($validation) && mostra_erro($validation, 'img') != '') {
                                                echo '<div class="alert alert-danger">';
                                                echo mostra_erro($validation, 'img');
                                                echo '</div>';
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Cadastrar novo animal</button>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <a href="<?= base_url('dashboard'); ?>" class="btn btn-warning">
                    Voltar para o dashboard
                </a>
            </div>
        </section>

        <!-- Listagem animais -->
        <section class="listagem-section">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#tab-disponivel" type="button" role="tab" aria-controls="tab-disponivel" aria-selected="true"><span class="text-black">Novos</span></button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#tab-adotado" type="button" role="tab" aria-controls="tab-adotado" aria-selected="false"><span class="text-black">Respondidos</span></button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="tab-disponivel" role="tabpanel" aria-labelledby="home-tab" tabindex="0">

                    <ul class="list-group lista-animais">
                        <?php
                        if ($qtde_msgs_disponiveis == 0) {
                            echo '<h3>Nenhuma mensagem ainda.</h3>';
                        } else {
                            foreach ($info_msgs as $msgs) {
                                if ($msgs['disponivel'] == 1) { ?>

                                    <li class="list-group-item list-group-item-action flex-column align-items-start p-3 item-animal">
                                        <div class="d-flex">
                                            <div class="dados-animal col-12 d-flex align-items-center">
                                                <div class="conteudo col-12 p-3">
                                                    <div class="d-flex w-100 justify-content-between pt-2">
                                                        <div class="texto col-9">
                                                            <p class="mb-1"><strong>Nome:</strong> <?= $msgs['nome']; ?></p>
                                                            <p class="mb-1"><strong>Email:</strong> <?= $msgs['email']; ?></p>
                                                            <p class="mb-1"><strong>Telefone:</strong> <?= $msgs['telefone']; ?></p>
                                                            <p class="mb-1"><strong>Mensagem:</strong> <?= $msgs['mensagem']; ?></p>
                                                        </div>
                                                        <div class="botao d-grid col-3">
                                                            <div class="form1 d-flex justify-content-end">
                                                                <?php
                                                                if (intval($msgs['disponivel']) == 0) {
                                                                    echo '<p class="btn btn-primary">Respondido</p>';
                                                                } else {
                                                                ?>
                                                                    <form action="<?= base_url('animais/marcar-adotado'); ?>" method="POST">
                                                                        <input type="hidden" name="id-animal" value="<?= $msgs['id']; ?>">
                                                                        <input type="submit" value="Marcar como respondido" class="btn btn-warning" style="margin-bottom: 10px;">
                                                                    </form>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                        <?php }
                            }
                        } ?>
                    </ul>
                </div>
                <div class="tab-pane fade" id="tab-adotado" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">

                    <ul class="list-group lista-animais">
                        <?php if ($qtde_msgs_adotados == 0) {
                            echo '<h3>Nenhuma mensagem respondida.</h3>';
                        } else {
                            foreach ($info_msgs as $msgs) { ?>
                                <?php if ($msgs['disponivel'] == 0) { ?>
                                    <li class="list-group-item list-group-item-action flex-column align-items-start p-3 item-animal">
                                        <div class="d-flex">
                                            <div class="img-animal col-2 d-flex  justify-content-center">
                                                <img src="<?= $msgs['img']; ?>" alt="Foto do animal <?= $msgs['nome']; ?> para adoção." class="img-fluid" style="border-radius: 10px; max-height: 150px;">
                                            </div>
                                            <div class="dados-animal col-10 d-flex align-items-center">
                                                <div class="conteudo col-12 p-3">
                                                    <div class="d-flex w-100 justify-content-between pt-2">
                                                        <div class="texto col-9">
                                                            <p class="mb-1"><strong>Nome:</strong> <?= $msgs['nome']; ?></p>
                                                            <p class="mb-1"><strong>Email:</strong> <?= $msgs['email']; ?></p>
                                                            <p class="mb-1"><strong>Telefone:</strong> <?= $msgs['telefone']; ?></p>
                                                            <p class="mb-1"><strong>Mensagem:</strong> <?= $msgs['mensagem']; ?></p>
                                                        </div>
                                                        <div class="botao d-grid col-3">
                                                            <div class="form1 d-flex justify-content-end">
                                                                <?php
                                                                if (intval($msgs['disponivel']) == 0) {
                                                                    echo '<p class="btn btn-primary">Respondido</p>';
                                                                } else {
                                                                ?>
                                                                    <form action="<?= base_url('animais/marcar-adotado'); ?>" method="POST">
                                                                        <input type="hidden" name="id-animal" value="<?= $msgs['id']; ?>">
                                                                        <input type="submit" value="Marcar como respondido" class="btn btn-warning" style="margin-bottom: 10px;">
                                                                    </form>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                        <?php }
                            }
                        } ?>
                    </ul>
                </div>
            </div>
        </section>

        <!-- Fim da listagem animais -->
        <br><br><br>
        <br><br><br>
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