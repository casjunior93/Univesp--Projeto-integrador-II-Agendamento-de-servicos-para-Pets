<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class EnviaEmail extends Controller
{
  public function index()
  {
    return view('teste_email');
  }

  function enviaEmailTeste()
  {
    $to = $this->request->getVar('mailTo');
    $subject = $this->request->getVar('subject');
    $message = $this->request->getVar('message');

    $email = \Config\Services::email();
    $email->setTo($to);
    $email->setFrom('johndoe@gmail.com', 'Confirm Registration');

    $email->setSubject($subject);
    $email->setMessage($message);
    if ($email->send()) {
      echo 'Email enviado com sucesso!';
    } else {
      $data = $email->printDebugger(['headers']);
      print_r($data);
    }
  }
}
