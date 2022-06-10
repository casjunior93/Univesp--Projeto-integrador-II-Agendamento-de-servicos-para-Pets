<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrar</title>
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
  <div class="container-fluid h-100 d-flex align-items-center">
    <div class="row col-12">
      <div class="col-6 text-center my-auto d-flex justify-content-center">
        <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
        <lottie-player src="https://assets6.lottiefiles.com/private_files/lf30_seyrd2ti.json" background="transparent" speed="1" style="width: 500px; height: 500px;" loop autoplay></lottie-player>
      </div>
      <div class="col-6  d-flex justify-content-center">
        <div class="box box-shadow col-8">
          <h4>Registre-se</h4>
          <form action="<?= base_url('login/salvar'); ?>" method="post">
            <?= csrf_field(); ?>
            <label for="">Nome</label>
            <input type="text" class="form-control" name="nome" placeholder="Seu nome">
            <label for="">Email</label>
            <input type="text" class="form-control" name="email" placeholder="Seu email">
            <label for="">Sua senha</label>
            <input type="text" class="form-control" name="password" placeholder="Sua senha">
            <label for="">Confirmar senha</label>
            <input type="text" class="form-control" name="cpassword" placeholder="Confirmar senha">
            <button class="btn btn-primary btn-block" type="submit"> Registrar </button>
            <a href="<?= site_url('login'); ?>">Já tenho conta</a>
          </form>
        </div>
      </div>
    </div>
  </div>
  <style>
    body,
    html {
      height: 100%;
    }

    .container-fluid {
      height: 100vh;
      background-color: #F8F0E5;
    }

    .box {
      background-color: #fff;
      border-radius: 5px;
      display: inline-block;
      padding: 30px;
    }

    .box-shadow {
      box-shadow: 0px 0px 11px 6px rgb(0, 0, 0, 0.08);
    }

    input {
      margin-bottom: 15px;
    }
  </style>
</body>

</html>