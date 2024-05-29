<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VacinaModel extends Model
{
    use HasFactory;

    protected $table = 'vacinas';

    protected $fillable = [
        'descricao',
        'vencimento',
        'id_animal',
    ];
}
