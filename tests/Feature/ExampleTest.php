<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LocationControllerTest extends TestCase
{
   /**
     * Prueba que se pueden obtener las ubicaciones con una API Key válida.
     *
     * @return void
     */
    public function test_can_fetch_locations_with_valid_api_key()
    {
        // Simulamos hacer una petición GET al endpoint /api/locations
        $response = $this->withHeaders([
            'x-api-key' => config('app.api_key'), // Usamos la API Key válida desde el archivo de configuración
        ])->get('/api/locations');

        // Verificamos que la respuesta tenga un código de estado 200
        $response->assertStatus(200);

        // Verificamos que el JSON devuelto tenga la estructura correcta
        $response->assertJsonStructure([
            '*' => ['code', 'name', 'image', 'creationDate'],
        ]);
    }

    /**
     * Prueba que no se pueden obtener ubicaciones con una API Key inválida.
     *
     * @return void
     */
    public function test_cannot_fetch_locations_with_invalid_api_key()
    {
        // Simulamos hacer una petición GET al endpoint /api/locations con una API Key inválida
        $response = $this->withHeaders([
            'x-api-key' => 'invalid_api_key',
        ])->get('/api/locations');

        // Verificamos que la respuesta tenga un código de estado 401 (No autorizado)
        $response->assertStatus(401);
    }
}
