<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('index');
    }

    public function contato()
    {
        $dados = [
            "title" => "Contato"
        ];

        return view('contato', $dados);
    }
}
