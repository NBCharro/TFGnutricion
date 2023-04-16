<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;
use Tests\TestCase;

class DireccionUrlTest extends TestCase
{
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
    // public function testUrlPaginaClientes()
    // {
    //     $url = 'http://127.0.0.1:8000/clientes';
    //     $response = $this->get($url);
    //     $response->assertStatus(200);
    // }
    // public function testUrlPaginaDietas()
    // {
    //     $url = 'http://127.0.0.1:8000/dietas';
    //     $response = $this->get($url);
    //     $response->assertStatus(200);
    // }
    // public function testUrlPaginaMensajes()
    // {
    //     $url = 'http://127.0.0.1:8000/mensajes';
    //     $response = $this->get($url);
    //     $response->assertStatus(200);
    // }
}
