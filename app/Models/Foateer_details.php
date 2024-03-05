<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foateer_details extends Model
{
    use HasFactory;
    protected $fillable=[
        'id_foateer',
        'foateer_number',
        'product',
        'section',
        'note',
        'Status',
        'Value_Status',
        'user'
    ];
}
