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

  public function getUsuariosComServicos()
  {
    $db = db_connect();
    $sql = 'SELECT DISTINCT(s.id_usuario), u.* FROM usuarios u INNER JOIN servicos s ON u.id = s.id_usuario';
    $resultado = $db->query($sql);
    return $resultado->getResultArray();
  }
}
