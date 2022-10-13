<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MutationRegistration extends Model
{
    use HasFactory;

    protected $table = 'mutation_registrations';

    protected $fillable = [
        'customer_id',
        'mutation_reg_date',
        'mutation_misscase_no',
        'individual_land_size',
        'mutation_dcs',
        'mutation_dsa',
        'mutation_drs',
        'mutation_dbs',
        'mutation_kcs',
        'mutation_ksa',
        'mutation_krs',
        'mutation_kbs',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}
