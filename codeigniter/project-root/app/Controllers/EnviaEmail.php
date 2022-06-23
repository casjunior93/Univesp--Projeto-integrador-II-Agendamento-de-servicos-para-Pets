<?php

namespace App\Controllers;

use App\Models\FormModel;
use CodeIgniter\Controller;

class EnviaEmail extends Controller
{
  public function index()
  {
    return view('teste_email');
  }

  function enviaEmailTeste()
  {
    $to = $this->request->getPost('mailTo');
    $subject = $this->request->getPost('subject');
    $message = $this->request->getPost('message');

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
