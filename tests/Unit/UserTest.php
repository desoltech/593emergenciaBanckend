<?php

namespace Tests\Unit;

use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

     /**
     * @test
     */
    public function crear_usuario()
    {

        $this->withoutExceptionHandling();

        $response = $this->postJson('/api/register', [
            'nombres' => 'Maria Jose',
            'apellidos' => 'Lopez Lopez',
            'cedula' => '1723749501',
            'password' => 'Maria1234',
        ]);

        // $response->dump();

        // $response->dumpHeaders();

        // $response->dumpSession();


        $response
            ->assertStatus(201)
            ->assertJson([
                'created' => true,
            ]);
        
        
    }

    protected function tearDown(): void
    {
        // eliminar todos los registros creados
        \App\User::truncate();
    }

}
