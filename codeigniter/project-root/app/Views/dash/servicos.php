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
            <h1>Serviços</h1>
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
            <h3 class="pb-3">Meus serviços</h3>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item navbar-brand">
                                <a class="link-dark" href="<?= base_url('dashboard/contatos-adocao'); ?>">
                                    Contatos para adoção
                                </a>
                            </li>
                            <li class="nav-item navbar-brand">
                                <a class="link-dark" href="<?= base_url('dashboard/'); ?>">
                                    Animais
                                </a>
                            </li>
                            <li class="nav-item navbar-brand">
                                <a class="link-dark" href="<?= base_url('dashboard/agendamentos'); ?>">
                                    Agendamentos
                                </a>
                            </li>
                            <li class="nav-item p-1">
                                <div>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                        Adicionar serviço
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
                                                    <form class="" action="<?= base_url('servicos/salvar'); ?>" method="POST">
                                                        <?= csrf_field(); ?>
                                                        <div class="mb-3">
                                                            <div class="form-row d-flex">
                                                                <div class="form-group col-md-6 p-1">
                                                                    <label for="inputName">Nome do serviço<span class="text-danger">*</span></label>
                                                                    <input type="text" id="nome" name="nome" class="form-control" value="<?= set_value('nome'); ?>" required>
                                                                </div>
                                                                <div class="form-group col-md-6 p-1">
                                                                    <label for="inputName">Valor<span class="text-danger">*</span></label>
                                                                    <input type="number" id="valor" name="valor" class="form-control" value="0" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary">Cadastrar novo servico</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item p-1">
                                <div>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#staticBackdrop2">
                                        Adicionar animal
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel">Cadastrar novo animal</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="" action="<?= base_url('animais/salvar'); ?>" method="POST" enctype="multipart/form-data">
                                                        <?= csrf_field(); ?>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-12">
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
                                                            <div class="form-group col-md-12">
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
                                                            <div class="form-group col-md-12">
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
                                                            <div class="form-group col-md-12">
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
                                                            <div class="form-group col-md-12">
                                                                <label for="img">Link da Foto<span class="text-danger">*</span></label>
                                                                <?= form_open_multipart('upload/upload') ?>
                                                                <input type="file" accept=".png, .jpg, .jpeg" id=" img" name="img" class="form-control" value="<?= set_value('img'); ?>" required>
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
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </section>

        <!-- Listagem animais -->

        <section class="listagem-section">
            <?php
            if ($qtde_servicos == 0) {
                echo '<h3>Nenhum serviço adicionado.</h3>';
            } else { ?>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Nome1</th>
                            <th scope="col">Valor</th>
                            <th scope="col">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($info_servicos as $servicos) { ?>
                            <tr>
                                <td>
                                    <?= $servicos['nome']; ?>
                                </td>
                                <td>
                                    <?= $servicos['valor']; ?>
                                </td>
                                <td>
                                    <form class="" action="<?= base_url('servicos/excluir'); ?>" method="POST">
                                        <input type="hidden" name="id-servico" value="<?= $servicos['id']; ?>">
                                        <input type="submit" value="Excluir" class="btn btn-warning" style="margin-bottom: 10px;">
                                    </form>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php } ?>
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