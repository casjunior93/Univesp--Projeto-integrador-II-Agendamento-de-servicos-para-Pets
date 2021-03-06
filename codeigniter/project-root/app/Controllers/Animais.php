<?php

namespace App\Controllers;

use App\Libraries\Hash;
use CodeIgniter\Files\File;

class Animais extends BaseController
{
  public function __construct()
  {
    helper('form');
  }

  public function listaAnimais()
  {
    $animalModel = new \App\Models\AnimalModel();
    $info_animais = $animalModel->getAnimaisDisponiveis();

    $dados = [
      'title' => 'Animais para adoção',
      'info_animais' => $info_animais
    ];

    return view('listagem_animais/lista', $dados);
  }

  public function salvar()
  {
    //validando campos do formulario
    $validation = $this->validate([
      'nome' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Campo nome não pode ficar vazio'
        ]
      ],
      'vacinas' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Campo vacinas não pode ficar vazio'
        ]
      ],
      'sobre' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Campo senha não pode ficar vazio'
        ]
      ],
      'idade' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Campo cep não pode ficar vazio'
        ]
      ]
    ]);

    if (!$validation) {
      return view('dash/dashboard', ['validation' => $this->validator]);
    } else {

      $userModel = new \App\Models\UserModel();
      $id_usuario_logado = session()->get('loggedUser');
      $info_usuario = $userModel->find($id_usuario_logado);

      //registrando no banco de dados
      $nome = $this->request->getPost('nome');
      $vacinas = $this->request->getPost('vacinas');
      $sobre = $this->request->getPost('sobre');
      $idade = $this->request->getPost('idade');
      $img = $this->request->getFile('img');
      $id_usuario = $id_usuario_logado;

      //Img to pasta uploads
      $newName = $img->getRandomName();
      $move_img = $img->move(ROOTPATH . 'public/assets/uploads/', $newName);

      $img_url = base_url() . '/assets/uploads/' . $newName;

      $values = [
        'nome' => $nome,
        'vacinas' => $vacinas,
        'sobre' => $sobre,
        'idade' => $idade,
        'img' => $img_url,
        'id_usuario' => $id_usuario
      ];

      $animalModel = new \App\Models\AnimalModel();
      $query = $animalModel->insert($values);
      if (!$query) {
        return redirect()->back()->with('fail', 'Erro ao salvar no banco de dados')->with('nome', $info_usuario['nome']);;
      } else {
        $id_animal = $animalModel->insertID();

        //return redirect()->to('/dashboard');
        return redirect()->to('/dashboard')->with('success', $nome . ' foi registrado com sucesso!')->with('nome', $info_usuario['nome']);
      }
    }
  }

  public function marcarAdotado()
  {

    $userModel = new \App\Models\UserModel();
    $id_usuario_logado = session()->get('loggedUser');
    $info_usuario = $userModel->find($id_usuario_logado);

    //id do animal
    $id_animal = $this->request->getPost('id-animal');

    $animalModel = new \App\Models\AnimalModel();

    $query = $animalModel->atualizaAnimalParaAdotado($id_animal);

    if (!$query) {
      return redirect()->back()->with('fail', 'Erro ao salvar no banco de dados')->with('nome', $info_usuario['nome']);
    } else {
      return redirect()->to('/dashboard')->with('success', 'Animal marcado como adotado com sucesso!')->with('nome', $info_usuario['nome']);
    }
  }

  public function excluirAnimal()
  {

    $userModel = new \App\Models\UserModel();
    $id_usuario_logado = session()->get('loggedUser');
    $info_usuario = $userModel->find($id_usuario_logado);

    //id do animal
    $id_animal = $this->request->getPost('id-animal');

    $animalModel = new \App\Models\AnimalModel();

    $query = $animalModel->excluirAnimal($id_animal);

    if (!$query) {
      return redirect()->back()->with('fail', 'Erro ao salvar no banco de dados')->with('nome', $info_usuario['nome']);
    } else {
      return redirect()->to('/dashboard')->with('success', 'Animal excluído com sucesso!')->with('nome', $info_usuario['nome']);
    }
  }
}
