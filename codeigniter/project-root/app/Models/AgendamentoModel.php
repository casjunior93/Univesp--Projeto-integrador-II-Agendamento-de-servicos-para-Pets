<?php

namespace App\Models;

use CodeIgniter\Model;

class AgendamentoModel extends Model
{

  protected $table = 'agendamentos';
  protected $primayKey = 'id';
  protected $allowedFields = [
    'nome',
    'nome_animal',
    'email',
    'telefone',
    'vacinas',
    'servicos',
    'data',
    'hora',
    'minuto',
    'recados',
    'metodo_pagamento',
    'id_usuario',
    'confirmado',
    'respondido'
  ];

  public function getAgenda()
  {
    $db = db_connect();
    $sql = 'SELECT a.*, u.nome as nome_usuario FROM animais a INNER JOIN usuarios u ON u.id = a.id_usuario';
    $resultado = $db->query($sql);
    return $resultado->getResultArray();
  }

  public function getAgendaDisponiveis()
  {
    $db = db_connect();
    $sql = 'SELECT * FROM agenda INNER JOIN usuarios u ON u.id = a.id_usuario WHERE a.disponivel = 1';
    $resultado = $db->query($sql);
    return $resultado->getResultArray();
  }

  public function getAgendaPorIdUsuario($id)
  {
    $db = db_connect();
    $sql = 'SELECT * FROM agendamentos WHERE id_usuario = ' . $id . ' ORDER BY data ASC';
    $resultado = $db->query($sql);
    return $resultado->getResultArray();
  }

  public function atualizaAgParaRespondido($id)
  {
    $db = db_connect();
    $sql = 'UPDATE agendamentos SET respondida = 1 WHERE id = ' . $id;
    $resultado = $db->query($sql);
    return $resultado;
  }

  public function excluirAgendamento($id)
  {
    $db = db_connect();
    $sql = 'DELETE FROM agendamentos WHERE id = ' . $id;
    $resultado = $db->query($sql);
    return $resultado;
  }

  public function verificaAgDuplicado($data, $hora, $minuto, $id_usuario)
  {
    $db = db_connect();
    $sql = 'SELECT * FROM agendamentos a WHERE a.id_usuario = ' . $id_usuario . ' AND a.data = "' . $data . '" AND a.hora = "' . $hora . '" AND a.minuto = ' . $minuto;
    $resultado = $db->query($sql);
    return $resultado;
  }
}
