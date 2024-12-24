<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class UE extends Model
{
    use HasFactory;
    protected $table = 'unites_enseignement';

    protected $fillable = ['code', 'nom', 'credits_ects', 'semestre'];

    public function ecs()
    {
        return $this->hasMany(EC::class);
    }}
