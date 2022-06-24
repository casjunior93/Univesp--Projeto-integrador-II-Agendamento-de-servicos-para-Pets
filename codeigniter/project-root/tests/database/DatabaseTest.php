<?php

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\DatabaseTestTrait;
use Tests\Support\Database\Seeds\ExampleSeeder;
use Tests\Support\Models\ExampleModel;
use App\Models\MensagemModel;
use App\Models\UserModel;
use App\Models\AnimalModel;
use App\Models\ServicosModel;

/**
 * @internal
 */
final class DatabaseTest extends CIUnitTestCase
{
    use DatabaseTestTrait;

    protected $seed = ExampleSeeder::class;

    public function getAllMensagens()
    {
        $model = new MensagemModel();

        // Get every row created by ExampleSeeder
        $objects = $model->getMensagens();

        // Make sure the count is as expected
        $this->assertCount(3, $objects);
    }

    public function getAllServicos()
    {
        $model = new ServicosModel();

        // Get every row created by ExampleSeeder
        $objects = $model->getServicos();

        // Make sure the count is as expected
        $this->assertCount(3, $objects);
    }

    public function getAllUsuarios()
    {
        $model = new UserModel();

        // Get every row created by ExampleSeeder
        $objects = $model->getUsuarios();

        // Make sure the count is as expected
        $this->assertCount(3, $objects);
    }

    public function getAllAnimais()
    {
        $model = new AnimalModel();

        // Get every row created by ExampleSeeder
        $objects = $model->getAnimais();

        // Make sure the count is as expected
        $this->assertCount(3, $objects);
    }
}
