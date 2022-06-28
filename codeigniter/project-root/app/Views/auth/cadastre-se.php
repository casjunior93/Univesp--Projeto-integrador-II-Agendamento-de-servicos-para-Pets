<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Cadastre-se | Mascote web</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>

    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('/'); ?>/css/modal.css" />
    <link href="<?= base_url('/'); ?>/css/styles.css" rel="stylesheet" />
    <script src="<?= base_url('/'); ?>/js/bootstrap.js"></script>
    <script src="<?= base_url('/'); ?>/js/jquery-3.6.0.min.js"></script>
    <script src="<?= base_url('/'); ?>/js/scripts.js"></script>
    <script src="<?= base_url('/'); ?>/js/fill_form.js"></script>
    <script type="text/javascript" src="jquery-1.2.6.pack.js"></script>
    <script type="text/javascript" src="jquery.maskedinput-1.1.4.pack.js">
    </script>
    <script type="text/javascript">
        /* Máscaras ER */
        function mascara(o, f) {
            v_obj = o
            v_fun = f

            setTimeout("execmascara()", 1)
        }

        function execmascara() {
            v_obj.value = v_fun(v_obj.value)
        }

        function edita_cep(v) {
            v = v.replace(/\D/g, ""); //Remove tudo o que não é dígito
            v = v.replace(/^([\d]{2})\.*([\d]{3})-*([\d]{3})/, "$1$2-$3");
            return v;
        }

        function id(el) {
            return document.getElementById(el);
        }

        // aciona função ao digitar dados no campo
        window.onload = function() {
            id('inputAddressCep').onkeypress = function() {
                mascara(this, edita_cep);
            }
        }
    </script>
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
                    <a href="<?= base_url('entre-cadastre-se'); ?>" type="button" class="btn btn-warning"> Entrar </a>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead">
        <div class="container">
        </div>
    </header>

    <body>
        <section class="page-section">
            <div class="container">
                <h2> Cadastre-se</h2><br><br>

                <form class="" action="<?= base_url('login/salvar'); ?>" method="POST">
                    <?= csrf_field(); ?>
                    <?php if (!empty(session()->getFlashdata('fail'))) : ?>
                        <div class='alert alert-danger'><?= session()->getFlashdata('fail'); ?></div>
                    <?php endif ?>

                    <?php if (!empty(session()->getFlashdata('success'))) : ?>
                        <div class='alert alert-success'><?= session()->getFlashdata('success'); ?></div>
                    <?php endif ?>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputName">Nome/Razão Social<span class="text-danger">*</span></label>
                            <input type="text" id="inputName" name="nome" class="form-control" value="<?= set_value('nome'); ?>" required>
                            <?php
                            if (isset($validation) && mostra_erro($validation, 'nome') != '') {
                                echo '<div class="alert alert-danger">';
                                echo mostra_erro($validation, 'nome');
                                echo '</div>';
                            }
                            ?>
                        </div>


                        <div class="form-group">
                            <label for="inputAddress">Cep<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="inputAddressCep" name="cep" value="<?= set_value('cep'); ?>" class="ls-mask-cep" placeholder="00000-000" maxlength="9" minlength="9" required>
                            <?php
                            if (isset($validation) && mostra_erro($validation, 'cep') != '') {
                                echo '<div class="alert alert-danger">';
                                echo mostra_erro($validation, 'cep');
                                echo '</div>';
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Rua/ Avenida<span class="text-danger">*</span> </label>
                            <input type="text" class="form-control" id="inputAddressRua" name="rua" value="<?= set_value('rua'); ?>" required>
                            <?php
                            if (isset($validation) && mostra_erro($validation, 'rua') != '') {
                                echo '<div class="alert alert-danger">';
                                echo mostra_erro($validation, 'rua');
                                echo '</div>';
                            }
                            ?>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputCity">Cidade<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="inputCity" name="cidade" value="<?= set_value('cidade'); ?>" required>
                                    <?php
                                    if (isset($validation) && mostra_erro($validation, 'cidade') != '') {
                                        echo '<div class="alert alert-danger">';
                                        echo mostra_erro($validation, 'cidade');
                                        echo '</div>';
                                    }
                                    ?>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="inputState">Estado<span class="text-danger">*</span></label>
                                    <select id="inputState" name="estado" class="form-control" required>
                                        <option hidden>Escolha...</option>
                                        <option value="AC">Acre</option>
                                        <option value="AL">Alagoas</option>
                                        <option value="AP">Amapá</option>
                                        <option value="AM">Amazonas</option>
                                        <option value="BA">Bahia</option>
                                        <option value="CE">Ceará</option>
                                        <option value="DF">Distrito Federal</option>
                                        <option value="ES">Espírito Santo</option>
                                        <option value="GO">Goiás</option>
                                        <option value="MA">Maranhão</option>
                                        <option value="MT">Mato Grosso</option>
                                        <option value="MS">Mato Grosso do Sul</option>
                                        <option value="MG">Minas Gerais</option>
                                        <option value="PA">Pará</option>
                                        <option value="PB">Paraíba</option>
                                        <option value="PR">Paraná</option>
                                        <option value="PE">Pernambuco</option>
                                        <option value="PI">Piauí</option>
                                        <option value="RJ">Rio de Janeiro</option>
                                        <option value="RN">Rio Grande do Norte</option>
                                        <option value="RS">Rio Grande do Sul</option>
                                        <option value="RO">Rondônia</option>
                                        <option value="RR">Roraima</option>
                                        <option value="SC">Santa Catarina</option>
                                        <option value="SP">São Paulo</option>
                                        <option value="SE">Sergipe</option>
                                        <option value="TO">Tocantins</option>
                                    </select>
                                    <?php
                                    if (isset($validation) && mostra_erro($validation, 'estado') != '') {
                                        echo '<div class="alert alert-danger">';
                                        echo mostra_erro($validation, 'estado');
                                        echo '</div>';
                                    }
                                    ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputAddress2">Complemento</label>
                                <input type="text" class="form-control" id="inputAddress2" name="complemento" value="<?= set_value('complemento'); ?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputSurname">Nome do responsável pela clínica<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="inputSurname" name="responsavel" value="<?= set_value('responsavel'); ?>" required>
                                <?php
                                if (isset($validation) && mostra_erro($validation, 'responsavel') != '') {
                                    echo '<div class="alert alert-danger">';
                                    echo mostra_erro($validation, 'responsavel');
                                    echo '</div>';
                                }
                                ?>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputZip">Telefone (whatsapp)<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="inputZip" name="telefone" value="<?= set_value('telefone'); ?>" required>
                                <?php
                                if (isset($validation) && mostra_erro($validation, 'telefone') != '') {
                                    echo '<div class="alert alert-danger">';
                                    echo mostra_erro($validation, 'telefone');
                                    echo '</div>';
                                }
                                ?>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Sobre a clínica<span class="text-danger">*</span></label>
                                <textarea maxlength="255" class="form-control" name="sobre-clinica" id="sobre-clinica" required><?= set_value('sobre-clinica'); ?></textarea>
                                <?php
                                if (isset($validation) && mostra_erro($validation, 'email') != '') {
                                    echo '<div class="alert alert-danger">';
                                    echo mostra_erro($validation, 'sobre-clinica');
                                    echo '</div>';
                                }
                                ?>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Email<span class="text-danger">*</span></label>
                                <input type="email" value="<?= set_value('email'); ?>" class="form-control" id="inputEmail4" name="email" required>
                                <?php
                                if (isset($validation) && mostra_erro($validation, 'email') != '') {
                                    echo '<div class="alert alert-danger">';
                                    echo mostra_erro($validation, 'email');
                                    echo '</div>';
                                }
                                ?>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Senha<span class="text-danger">*</span></label>
                                <input type="password" class="form-control" id="inputPassword4" name="senha" required minlength="5" maxlength="12">
                                <?php
                                if (isset($validation) && mostra_erro($validation, 'senha') != '') {
                                    echo '<div class="alert alert-danger">';
                                    echo mostra_erro($validation, 'senha');
                                    echo '</div>';
                                }
                                ?>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Repetir senha<span class="text-danger">*</span></label>
                                <input type="password" class="form-control" id="inputPassword4" name="senha2" required minlength="5" maxlength="12">
                                <?php
                                if (isset($validation) && mostra_erro($validation, 'senha2') != '') {
                                    echo '<div class="alert alert-danger">';
                                    echo mostra_erro($validation, 'senha2');
                                    echo '</div>';
                                }
                                ?>
                            </div>
                        </div>



                    </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>

            </div>
        </section>



    </body>

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
    <!-- Portfolio Modals-->
    <!-- Portfolio item 1 modal popup-->
    <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">
                                <!-- Project details-->
                                <h2 class="text-uppercase">Project Name</h2>
                                <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/1.jpg" alt="..." />
                                <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                                <ul class="list-inline">
                                    <li>
                                        <strong>Client:</strong>
                                        Threads
                                    </li>
                                    <li>
                                        <strong>Category:</strong>
                                        Illustration
                                    </li>
                                </ul>
                                <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                    <i class="fas fa-xmark me-1"></i>
                                    Close Project
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Portfolio item 2 modal popup-->
    <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">
                                <!-- Project details-->
                                <h2 class="text-uppercase">Project Name</h2>
                                <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/2.jpg" alt="..." />
                                <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                                <ul class="list-inline">
                                    <li>
                                        <strong>Client:</strong>
                                        Explore
                                    </li>
                                    <li>
                                        <strong>Category:</strong>
                                        Graphic Design
                                    </li>
                                </ul>
                                <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                    <i class="fas fa-xmark me-1"></i>
                                    Close Project
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Portfolio item 3 modal popup-->
    <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">
                                <!-- Project details-->
                                <h2 class="text-uppercase">Project Name</h2>
                                <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/3.jpg" alt="..." />
                                <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                                <ul class="list-inline">
                                    <li>
                                        <strong>Client:</strong>
                                        Finish
                                    </li>
                                    <li>
                                        <strong>Category:</strong>
                                        Identity
                                    </li>
                                </ul>
                                <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                    <i class="fas fa-xmark me-1"></i>
                                    Close Project
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Portfolio item 4 modal popup-->
    <div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">
                                <!-- Project details-->
                                <h2 class="text-uppercase">Project Name</h2>
                                <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/4.jpg" alt="..." />
                                <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                                <ul class="list-inline">
                                    <li>
                                        <strong>Client:</strong>
                                        Lines
                                    </li>
                                    <li>
                                        <strong>Category:</strong>
                                        Branding
                                    </li>
                                </ul>
                                <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                    <i class="fas fa-xmark me-1"></i>
                                    Close Project
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Portfolio item 5 modal popup-->
    <div class="portfolio-modal modal fade" id="portfolioModal5" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">
                                <!-- Project details-->
                                <h2 class="text-uppercase">Project Name</h2>
                                <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/5.jpg" alt="..." />
                                <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                                <ul class="list-inline">
                                    <li>
                                        <strong>Client:</strong>
                                        Southwest
                                    </li>
                                    <li>
                                        <strong>Category:</strong>
                                        Website Design
                                    </li>
                                </ul>
                                <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                    <i class="fas fa-xmark me-1"></i>
                                    Close Project
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Portfolio item 6 modal popup-->
    <div class="portfolio-modal modal fade" id="portfolioModal6" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">
                                <!-- Project details-->
                                <h2 class="text-uppercase">Project Name</h2>
                                <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/6.jpg" alt="..." />
                                <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                                <ul class="list-inline">
                                    <li>
                                        <strong>Client:</strong>
                                        Window
                                    </li>
                                    <li>
                                        <strong>Category:</strong>
                                        Photography
                                    </li>
                                </ul>
                                <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                    <i class="fas fa-xmark me-1"></i>
                                    Close Project
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>