<?php

namespace App\Models;

use CodeIgniter\Model;

class AnimalModel extends Model
{

  protected $table = 'animais';
  protected $primayKey = 'id';
  protected $allowedFields = ['nome', 'img', 'vacinas', 'sobre', 'idade', 'disponivel', 'id_usuario'];

  public function getAnimais()
  {
    $db = db_connect();
    $sql = 'SELECT a.*, u.nome as nome_usuario FROM animais a INNER JOIN usuarios u ON u.id = a.id_usuario';
    $resultado = $db->query($sql);
    return $resultado->getResultArray();
  }

  public function getAnimaisDisponiveis()
  {
    $db = db_connect();
    $sql = 'SELECT a.*, u.nome as nome_usuario FROM animais a INNER JOIN usuarios u ON u.id = a.id_usuario WHERE a.disponivel = 1';
    $resultado = $db->query($sql);
    return $resultado->getResultArray();
  }

  public function getAnimaisPorIdUsuario($id)
  {
    $db = db_connect();
    $sql = 'SELECT * FROM animais WHERE id_usuario = ' . $id;
    $resultado = $db->query($sql);
    return $resultado->getResultArray();
  }

  public function atualizaAnimalParaAdotado($id)
  {
    $db = db_connect();
    $sql = 'UPDATE animais SET disponivel = 0 WHERE id = ' . $id;
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
