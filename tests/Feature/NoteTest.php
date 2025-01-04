<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Note;
use App\Models\Etudiant;
use App\Models\EC;
use App\Models\User;

class NoteTest extends TestCase
{
    use RefreshDatabase;

    public function test_ajout_dune_note_valide()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $etudiant = Etudiant::factory()->create();
        $ec = EC::factory()->create();

        $noteData = [
            'etudiant_id' => $etudiant->id,
            'ec_id' => $ec->id,
            'note' => 15,
            'session' => 'normale',
            'date_evaluation' => now(),
        ];

        $response = $this->post(route('notes.store'), $noteData);
        $response->assertRedirect(route('notes.create'));
        $this->assertDatabaseHas('notes', $noteData);
    }

    public function test_verification_des_limites()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $etudiant = Etudiant::factory()->create();
        $ec = EC::factory()->create();

        $noteData = [
            'etudiant_id' => $etudiant->id,
            'ec_id' => $ec->id,
            'note' => 25,
            'session' => 'normale',
            'date_evaluation' => now(),
        ];

        $response = $this->post(route('notes.store'), $noteData);
        $response->assertSessionHasErrors('note');
    }

    public function test_calcul_de_la_moyenne_dune_ue()
    {
        $etudiant = Etudiant::factory()->create();
        $ec1 = EC::factory()->create();
        $ec2 = EC::factory()->create();

        Note::create(['etudiant_id' => $etudiant->id, 'ec_id' => $ec1->id, 'note' => 12, 'session' => 'normale', 'date_evaluation' => now()]);
        Note::create(['etudiant_id' => $etudiant->id, 'ec_id' => $ec2->id, 'note' => 16, 'session' => 'normale', 'date_evaluation' => now()]);

        $moyenne = Note::where('etudiant_id', $etudiant->id)->avg('note');

        $this->assertEquals(14, $moyenne);
    }

    public function test_gestion_des_sessions()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $etudiant = Etudiant::factory()->create();
        $ec = EC::factory()->create();

        $noteData = [
            'etudiant_id' => $etudiant->id,
            'ec_id' => $ec->id,
            'note' => 10,
            'session' => 'rattrapage',
            'date_evaluation' => now(),
        ];

        $response = $this->post(route('notes.store'), $noteData);
        $response->assertRedirect(route('notes.create'));
        $this->assertDatabaseHas('notes', ['session' => 'rattrapage']);
    }

    public function test_validation_des_notes_manquantes()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $etudiant = Etudiant::factory()->create();
        $ec = EC::factory()->create();

        $noteData = [
            'etudiant_id' => $etudiant->id,
            'ec_id' => $ec->id,
            'note' => null,
            'session' => 'normale',
            'date_evaluation' => now(),
        ];

        $response = $this->post(route('notes.store'), $noteData);
        $response->assertSessionHasErrors('note');
    }
}