<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{

  protected $table = 'usuarios';
  protected $primayKey = 'id';
  protected $allowedFields = ['nome', 'email', 'senha', 'cep', 'rua', 'cidade', 'estado', 'complemento', 'telefone', 'responsavel', 'descricao'];

  public function getUsuarios()
  {
    $db = db_connect();
    $sql = 'SELECT * FROM usuarios';
    $resultado = $db->query($sql);
    return $resultado->getResultArray();
  }
}
