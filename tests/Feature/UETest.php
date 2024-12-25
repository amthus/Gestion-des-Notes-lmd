<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\UE;
use App\Models\EC;


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

    public function test_creation_d_une_ue_valide()
    {
        $ue = UE::create([
            'code' => 'UE01',
            'nom' => 'Programmation Web',
            'credits_ects' => 6,
            'semestre' => 1,
        ]);

        $this->assertDatabaseHas('unites_enseignement', ['code' => 'UE01']);
    }

    public function test_verification_credits_ects()
    {
        $ue = UE::create([
            'code' => 'UE02',
            'nom' => 'Mathématiques',
            'credits_ects' => 25,
            'semestre' => 2,
        ]);

        $this->assertTrue($ue->credits_ects >= 1 && $ue->credits_ects <= 30);
    }

    public function test_association_ecs_avec_ue()
    {
        $ue = UE::create([
            'code' => 'UE03',
            'nom' => 'Physique',
            'credits_ects' => 10,
            'semestre' => 1,
        ]);

        $ec = EC::create([
            'nom' => 'Mécanique',
            'code' => 'EC06',
            'coefficient' => 4,
            'ue_id' => $ue->id,
        ]);

        $this->assertEquals($ue->id, $ec->ue_id);
        $this->assertEquals('EC06', $ec->code);
    }


    public function test_validation_code_ue()
    {
        $ue = UE::create([
            'code' => 'UE04',
            'nom' => 'Chimie',
            'credits_ects' => 5,
            'semestre' => 1,
        ]);

        $this->assertMatchesRegularExpression('/^UE\d{2}$/', $ue->code);
    }

    public function test_verification_semestre()
    {
        $ue = UE::create([
            'code' => 'UE05',
            'nom' => 'Biologie',
            'credits_ects' => 8,
            'semestre' => 2,
        ]);

        $this->assertTrue(in_array($ue->semestre, [1, 2]));
    }
}
