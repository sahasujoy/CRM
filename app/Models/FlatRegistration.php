<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlatRegistration extends Model
{
    use HasFactory;

    protected $table = 'flat_registrations';

    protected $fillable = [
            'customer_id',
            'flat_reg_date',
            'flat_reg_sub_deed_no',
            'flat_size',
            'land_size',
            'mouza_name',
            'flat_dcs',
            'flat_dsa',
            'flat_drs',
            'flat_dbs',
            'flat_kcs',
            'flat_ksa',
            'flat_krs',
            'flat_kbs',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}
