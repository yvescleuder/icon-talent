<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected string $primaryKey = 'cep';
    public bool $incrementing = false;

    protected $fillable = [
        'cep',
        'address',
        'complement',
        'neighborhood',
        'city',
        'state',
        'ibge',
        'gia',
        'ddd',
        'siafi'
    ];
}