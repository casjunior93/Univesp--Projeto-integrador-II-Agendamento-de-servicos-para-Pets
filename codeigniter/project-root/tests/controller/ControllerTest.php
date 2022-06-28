<?php

namespace CodeIgniter;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\ControllerTestTrait;
use CodeIgniter\Test\DatabaseTestTrait;

class TestControllerA extends CIUnitTestCase
{
  use ControllerTestTrait;
  use DatabaseTestTrait;

  public function testListagemClinicas()
  {
    $result = $this->controller(\App\Controllers\Clinicas::class)
      ->execute('listaClinicas');

    $this->assertTrue($result->isOK());
  }

  public function testListagemAnimais()
  {
    $result = $this->controller(\App\Controllers\Animais::class)
      ->execute('listaAnimais');

    $this->assertTrue($result->isOK());
  }
}
