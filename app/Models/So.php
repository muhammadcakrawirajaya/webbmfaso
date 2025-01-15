<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class So extends Model
{
    use HasFactory;
    protected $table = 'so';
    protected $guarded = ['id'];

    protected $fillable = [
        'nama_so',
        'nama_telda',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];

    public function so_sto()
    {
        return $this->hasMany(Sto::class, 'id_so', 'id');
    }
}
