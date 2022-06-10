<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrar</title>
  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <div class="row">
      <h1>Registro</h1>
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
</body>

</html>