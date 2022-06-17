<?php

namespace App\Libraries;

class Hash
{
  public static function make($senha)
  {
    return password_hash($senha, PASSWORD_DEFAULT);
  }

  public static function check($senha, $db_senha)
  {
    if (password_verify($senha, $db_senha)) {
      return true;
    } else {
      return false;
    }
  }
}
