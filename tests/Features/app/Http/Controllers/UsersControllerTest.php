<?php

namespace Tests;

use App\Models\User;
use Laravel\Lumen\Testing\DatabaseMigrations;

class UsersControllerTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * checa se é possivel retornar todos os usuários
     */
    public function testGetAllUsers()
    {
        $response = $this->get('/user/all');
        $response->assertResponseStatus(200);
    }

    /**
     * checa se é possivel retornar um usuário
     */
    public function testGetUser()
    {
        $user = User::factory()->create();
        $response = $this->get('/user/' . $user->id);
        $response->assertResponseStatus(200);
    }
    
    /**
     * checa se é possivel criar um usuário
     */
    public function testCreateUser()
    {
        $user = User::factory()->create();
        $response = $this->post('/user/create', $user->toArray());
        $response->assertResponseStatus(201);
    }
    
    /**
     * checa se é possivel atualizar um usuário
     */
    public function testUpdateUser()
    {
        $user = User::factory()->create();
        $response = $this->put('/user/' . $user->id .'/update', $user->toArray());
        $response->assertResponseStatus(200);
    }
    
    /**
     * checa se é possivel deletar um usuário
     */
    public function testDeleteUser()
    {
        $user = User::factory()->create();
        $response = $this->delete('/user/' . $user->id);
        $response->assertResponseStatus(204);
    }
    
}