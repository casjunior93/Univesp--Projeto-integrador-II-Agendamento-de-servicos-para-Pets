<?php

namespace App\Models;

use CodeIgniter\Model;

class MensagemModel extends Model
{

  protected $table = 'mensagens';
  protected $primayKey = 'id';
  protected $allowedFields = ['nome', 'email', 'telefone', 'mensagem', 'respondida', 'id_usuario', 'nome_animal'];

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
    $sql = 'UPDATE mensagens SET respondida = 1 WHERE id = ' . $id;
    $resultado = $db->query($sql);
    return $resultado;
  }

  public function excluirMensagem($id)
  {
    $db = db_connect();
    $sql = 'DELETE FROM mensagens WHERE id = ' . $id;
    $resultado = $db->query($sql);
    return $resultado;
  }
}
