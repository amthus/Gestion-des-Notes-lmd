<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\UE;

class UETest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->artisan('migrate'); 
    }
    /**
     * Test de création d'une UE.
     */
    public function test_creation_ue()
    {
        $ue = UE::factory()->create([
            'code' => 'UE11',
            'nom' => 'Programmation Web',
            'credits_ects' => 6,
            'semestre' => 1
        ]);

        $this->assertDatabaseHas('unites_enseignement', [
            'code' => 'UE11'
        ]);
    }
}
