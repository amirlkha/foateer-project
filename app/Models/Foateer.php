<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Foateer extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $fillable=[
        'foateer_number',
        'foateer_Date',
        'Due_date',
        'product',
        'section_id',
        'Amount_collection',
        'Amount_Commission',
        'Discount',
        'Value_VAT',
        'Rate_VAT',
        'Total',
        'Status',
        'Value_Status',
        'note',
        'Payment_Date',
    ];
    protected $dates=['deleted_at'];
    public function section()
   {
   return $this->belongsTo(Section::class);
   }
}

