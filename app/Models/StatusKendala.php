<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusKendala extends Model
{
    use HasFactory;
    protected $table = 'status_kendala';
    protected $guarded = ['id'];

    protected $fillable = [
        'status_kendala',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];

    public function feedback_status()
    {
        return $this->hasOne(FeedbackPIC::class, 'id_status_kendala', 'id');
    }
}
