<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uic extends Model
{
    use HasFactory;
    protected $table = 'uic_kendala';
    protected $guarded = ['id'];

    protected $fillable = [
        'uic',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];

    public function feedbacks()
    {
        return $this->hasMany(FeedbackPIC::class, 'id_uic', 'id');
    }
}
