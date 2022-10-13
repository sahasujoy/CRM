<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandRegistration extends Model
{
    use HasFactory;

    protected $table = 'land_registrations';

    protected $fillable = [
        'customer_id',
        'land_reg_date',
        'land_reg_sub_deed_no',
        'individual_land_size',
        'mouza_name',
        'land_dcs',
        'land_dsa',
        'land_drs',
        'land_dbs',
        'land_kcs',
        'land_ksa',
        'land_krs',
        'land_kbs',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}
