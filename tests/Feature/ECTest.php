<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\UE;
use App\Models\EC;

class ECTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_creation_ec_avec_coefficient()
    {
        // Create a UE (Unité d'Enseignement)
        $ue = UE::create([
            'code' => 'UE06',
            'nom' => 'Informatique',
            'credits_ects' => 15,
            'semestre' => 1,
        ]);

        $ec = EC::create([
            'nom' => 'Programmation',
            'code' => 'EC01',  
            'coefficient' => 4,
            'ue_id' => $ue->id,
        ]);

        $this->assertDatabaseHas('elements_constitutifs', ['nom' => 'Programmation', 'code' => 'EC01']);
    }

    public function test_verification_rattachement_a_une_ue()
    {
        // Create a UE
        $ue = UE::create([
            'code' => 'UE07',
            'nom' => 'Réseaux',
            'credits_ects' => 10,
            'semestre' => 2,
        ]);

        $ec = EC::create([
            'nom' => 'TCP/IP',
            'code' => 'EC02',  
            'coefficient' => 3,
            'ue_id' => $ue->id,
        ]);

        $this->assertNotNull($ec->ue);
    }


    public function test_modification_ec()
    {
        $ue = UE::create([
            'code' => 'UE08',
            'nom' => 'Mathématiques',
            'credits_ects' => 12,
            'semestre' => 1,
        ]);

        $ec = EC::create([
            'nom' => 'Algorithmes',
            'code' => 'EC03', 
            'coefficient' => 3,
            'ue_id' => $ue->id, 
        ]);

        $ec->update(['nom' => 'Algorithmes Avancés']);

        $this->assertDatabaseHas('elements_constitutifs', ['nom' => 'Algorithmes Avancés']);
    }

    public function test_validation_coefficient()
    {
        $ue = UE::create([
            'code' => 'UE09',
            'nom' => 'Systèmes',
            'credits_ects' => 10,
            'semestre' => 2,
        ]);

        $ec = EC::create([
            'nom' => 'Systèmes',
            'code' => 'EC04', 
            'coefficient' => 4,
            'ue_id' => $ue->id, 
        ]);

        $this->assertTrue($ec->coefficient >= 1 && $ec->coefficient <= 5);
    }

    public function test_suppression_ec()
    {
        $ue = UE::create([
            'code' => 'UE10',
            'nom' => 'Bases de données',
            'credits_ects' => 5,
            'semestre' => 1,
        ]);

        $ec = EC::create([
            'nom' => 'Bases de données',
            'code' => 'EC05', 
            'coefficient' => 3,
            'ue_id' => $ue->id, 
        ]);

        $ec->delete();

        $this->assertDatabaseMissing('elements_constitutifs', ['nom' => 'Bases de données']);
    }
}
