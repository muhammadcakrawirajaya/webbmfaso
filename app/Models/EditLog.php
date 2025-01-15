<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EditLog extends Model
{
    use HasFactory;
    protected $table = 'edit_logs';
    protected $guarded = ['id'];

    protected $fillable = [
        'model_type',
        'model_id',
        'edit_data',
    ];
}
