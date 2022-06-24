<?php

namespace App\Models;

use CodeIgniter\Model;

class ServicosModel extends Model
{

  protected $table = 'servicos';
  protected $primayKey = 'id';
  protected $allowedFields = ['nome', 'valor', 'id_usuario'];

  public function getServicosPorIdUsuario($id)
  {
    $db = db_connect();
    $sql = 'SELECT * FROM servicos WHERE id_usuario = ' . $id;
    $resultado = $db->query($sql);
    return $resultado->getResultArray();
  }

  public function getServicos()
  {
    $db = db_connect();
    $sql = 'SELECT * FROM servicos';
    $resultado = $db->query($sql);
    return $resultado->getResultArray();
  }

  public function excluirServico($id)
  {
    $db = db_connect();
    $sql = 'DELETE FROM servicos WHERE id = ' . $id;
    $resultado = $db->query($sql);
    return $resultado;
  }
}
