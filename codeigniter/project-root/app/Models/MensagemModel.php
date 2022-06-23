<?php

namespace App\Models;

use CodeIgniter\Model;

class MensagemModel extends Model
{

  protected $table = 'mensagens';
  protected $primayKey = 'id';
  protected $allowedFields = ['nome', 'email', 'telefone', 'mensagem', 'respondida'];

  public function getMsgmPorIdUsuario($id)
  {
    $db = db_connect();
    $sql = 'SELECT * FROM mensagens WHERE id_usuario = ' . $id;
    $resultado = $db->query($sql);
    return $resultado->getResultArray();
  }

  public function atualizaMsgParaRespondido($id)
  {
    $db = db_connect();
    $sql = 'UPDATE mensagens SET respondida = 0 WHERE id = ' . $id;
    $resultado = $db->query($sql);
    return $resultado;
  }

  public function excluirAnimal($id)
  {
    $db = db_connect();
    $sql = 'DELETE FROM animais WHERE id = ' . $id;
    $resultado = $db->query($sql);
    return $resultado;
  }
}
