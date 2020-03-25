<?php

namespace Tests\Unit;

use Tests\TestCase;

class TipoDeAyudaTest extends TestCase
{
    /** @test */
    public function sePuedeCrearUnTipoDeAyuda()
    {
        // $this->withoutExceptionHandling();

        $user = \factory(\App\User::class)->create();

        $this->actingAs($user, 'api');

        $headers = array_merge(
            ['Authorization' => 'Bearer '.\JWTAuth::fromUser($user)],
        );

        $response = $this->postJson('/api/help-type', [
            'name' => 'Alimento',
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
    }
}
