<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    protected $table = "statuses";

    protected $fillable = [
        'registration_id',
        'booking_date',
        'land_status',
        'flat_status',
        'mutation_status',
        'poa_status',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'registration_id');
    }
}
