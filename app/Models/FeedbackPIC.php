<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeedbackPIC extends Model
{
    use HasFactory;
    protected $table = 'feedback_pic';
    protected $guarded = ['id'];

    protected $fillable = [
        'id_uic',
        'feedback_pic',
        'id_status_kendala',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];

    public function order_feedback()
    {
        return $this->hasMany(Order::class, 'id_feedback', 'id');
    }

    public function uic()
    {
        return $this->belongsTo(Uic::class, 'id_uic', 'id');
    }

    public function status_kendalas()
    {
        return $this->belongsTo(StatusKendala::class, 'id_status_kendala', 'id');
    }
}
