<?php

namespace App\Libraries;

class Hash
{
  public static function make($senha)
  {
    return password_hash($senha, PASSWORD_BCRYPT);
  }
}
