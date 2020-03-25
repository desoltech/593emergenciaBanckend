<?php

namespace Tests\Unit;

use Tests\TestCase;

class Solicitudes extends TestCase
{
    /** @test */
    public function crearSolicitudParaAyudar()
    {
        // usuario creado
        // login usuario
        $this->assertTrue(true);

    }

    /** @test */
    public function crearSolicitudParaPedirAyuda()
    {
        $this->withoutExceptionHandling();
        
        //crear usuario
        $user = \factory(\App\User::class)->create();
        
        //crear tipo de ayuda
        $tipo_de_ayuda = \factory(\App\HelpType::class)->create();

        // autenticar usuario
        $this->actingAs($user, 'api');

        $headers = array_merge(
            ['Authorization' => 'Bearer '.\JWTAuth::fromUser($user)],
        );

        $response = $this->postJson('/api/requests', [
            'user_id' => $user->id,
            'type' => 'obtener-ayuda',
            'id_help_type' => $tipo_de_ayuda->id,
            'ubic_coordinates' => '-0.373016,-78.497164',
            'comments' => 'Casa de 3 pisos con sauna y yakusi',
        ], $headers);

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
        \App\HelpType::truncate();
        \App\HelpRequest::truncate();
    }
}
