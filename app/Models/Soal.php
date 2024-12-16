<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    use HasFactory;

    protected $table = 'soal';

    public function mapel()
    {
        return $this->belongsTo(Mapel::class, 'mapel_id');
    }
}
