<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;
    protected $fillable = [
      'name' ,
      'phone',
      'email',
      'address',
      'commercial_number',
      'indoor_cameras',
      'outdoor_cameras',
      'storage_device',
      'period_of_record',
      'show_screens',
      'camera_type',
      'contract_date',
      'expiry_date',
      'contract_number',
      'price',
      'vat',      
      'discount',
      'total_price',
    ];
}
