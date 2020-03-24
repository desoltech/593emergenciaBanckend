<?php

namespace Tests\Unit;

use Tests\TestCase;

class UserTest extends TestCase
{
     /**
     * @test
     */
    public function crear_usuario()
    {

        // $this->withoutExceptionHandling();

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

    /** @test */
    public function loguear_usuario()
    {

        $this->withoutExceptionHandling();

        $user = \factory(\App\User::class)->create();

        $response = $this->postJson('/api/login', [
            'cedula' => $user->cedula,
            'password' => 'password',
        ]);

        // $response->dump();

        // $response->dumpHeaders();

        // $response->dumpSession();

        $response
            ->assertStatus(200)
            ->assertJson([
                'token_type' => 'bearer',
            ]);
        
        
    }

    protected function tearDown(): void
    {
        // eliminar todos los registros creados
        \App\User::truncate();
    }

}
