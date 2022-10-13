<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PoaRegistration extends Model
{
    use HasFactory;

    protected $table = 'poa_registrations';

    protected $fillable = [
        'customer_id',
        'poa_reg_date',
        'poa_reg_sub_deed_no',
        'individual_land_size',
        'mouza_name',
        'poa_dcs',
        'poa_dsa',
        'poa_drs',
        'poa_dbs',
        'poa_kcs',
        'poa_ksa',
        'poa_krs',
        'poa_kbs',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}
