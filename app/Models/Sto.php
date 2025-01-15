<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sto extends Model
{
    use HasFactory;
    protected $table = 'sto';
    protected $guarded = ['id'];

    protected $fillable = [
        'nama_sto',
        'id_so',
        'nama_tl',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];

    public function sto_so()
    {
        return $this->belongsTo(So::class, 'id_so', 'id');
    }

    public function sto_order()
    {
        return $this->hasMany(Order::class, 'id_sto', 'id');
    }
}
