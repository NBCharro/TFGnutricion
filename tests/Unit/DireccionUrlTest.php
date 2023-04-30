<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DireccionUrlTest extends TestCase
{
    use RefreshDatabase;
    public function testUrlPaginaInicio()
    {
        $url = 'http://127.0.0.1:8000/';
        $response = $this->get($url);
        $response->assertStatus(200);
    }
    public function testUrlPaginaMiDieta()
    {
        $url = 'http://127.0.0.1:8000/midieta';
        $response = $this->get($url);
        $response->assertStatus(200);
    }
    public function testUrlPaginaComenzarMiPlan()
    {
        $url = 'http://127.0.0.1:8000/comenzarmiplan';
        $response = $this->get($url);
        $response->assertStatus(200);
    }
    public function testUrlPaginaClientes()
    {
        $user = User::factory()->create();
        $url = 'http://127.0.0.1:8000/clientes';
        $response = $this->actingAs($user)->get($url);
        $response->assertStatus(200);
    }
    public function testUrlPaginaDietas()
    {
        $user = User::factory()->create();
        $url = 'http://127.0.0.1:8000/dietas';
        $response = $this->actingAs($user)->get($url);
        $response->assertStatus(200);
    }
    public function testUrlPaginaMensajes()
    {
        $user = User::factory()->create();
        $url = 'http://127.0.0.1:8000/mensajes';
        $response = $this->actingAs($user)->get($url);
        $response->assertStatus(200);
    }
}
