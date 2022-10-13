<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flat extends Model
{
    use HasFactory;

    protected $table = 'flats';

    protected $fillable = [
        'building_id',
        'no',
        'floor',
        'face_direction',
        'size',
        'sell_status',
    ];

    public function building()
    {
        return $this->belongsTo(Building::class, 'building_id');
    }

    public function customer()
    {
        return $this->hasOne(Customer::class, 'flat_no', 'id');
    }

    public function registrations()
    {
        return $this->hasOne(Registration::class, 'flat_id', 'id');
    }
}
