<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $table = 'settings';
    protected $guarded = ['id'];

    protected $fillable = [
        'id_user',
        'bulan',
        'so',
        'sto',
        'telda',
        'segmen',
        'uic',
        'feedback',
        'status',
        'search',
        'export',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];

    public function user_setting()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
