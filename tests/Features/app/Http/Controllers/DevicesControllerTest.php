<?php

namespace Featutes\app\Http\Controllers;

use tests\TestCase;
use App\Models\Device;
use Illuminate\Support\Facades\Auth;
use Laravel\Lumen\Testing\DatabaseMigrations;

class DevicesControllerTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * checa se é possivel efetuar login
     * na api de autenticação do sistema
     */
    public function testLogin()
    {
        $user = Auth::factory()->create();
        $response = $this->post('/api/login', $user);
        $response->assertResponseStatus(200);
    }

    /**
     * checa se é possivel retornar todos os dispositivos
     */
    public function testGetAllDevices()
    {
        $response = $this->get('/device/all');
        $response->assertResponseStatus(200);
    }

    /**
     * checa se é possivel retornar um dispositivo
     */
    public function testGetDevice()
    {
        $device = Device::factory()->create();
        $response = $this->get('/device/' . $device->id);
        $response->assertResponseStatus(200);
    }

    /**
     * checa se é possivel criar um dispositivo
     */
    public function testCreateDevice()
    {
        $device = Device::factory()->create();
        $response = $this->post('/device/create', $device->toArray());
        $response->assertResponseStatus(201);
    }

    /**
     * checa se é possivel deletar um dispositivo
     */
    public function testDeleteDevice()
    {
        $device = Device::factory()->create();
        $response = $this->delete('/device/' . $device->id);
        $response->assertResponseStatus(200);
    }

}
