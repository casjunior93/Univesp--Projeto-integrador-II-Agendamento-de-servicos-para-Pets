<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
  protected $table = 'usuarios';
  protected $primayKey = 'id';
  protected $allowedFields = ['nome', 'email', 'senha'];
}
