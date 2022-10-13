<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = "customers";

    protected $fillable = [
        'file_no',
        'name1',
        'customer_id',
        'father_name1',
        'mother_name1',
        'hus_wife_name',
        'relationship',
        'nid_no',
        'date_of_birth',
        'phone',
        'others_file_no',
        'name2',
        'father_name2',
        'booking_date',
        'profession',
        'designation',
        'email',
        'mailing_address',
        'permanent_address',
        'office_address',
        'country',
        'nominee_name',
        'relation_with_nominee',
        'nominee_phone',
        'nominee_address',
        'nominee_gets',
        'building_no',
        'flat_no',
        'flat_size',
        'media_name',
        'media_phone',
        'customer_image',
        'nominee_image',
        'agreements',
    ];

    public function flat()
    {
        return $this->belongsTo(Flat::class, 'flat_no', 'id');
    }

    public function statuses()
    {
        return $this->hasOne(Status::class, 'registration_id', 'id');
    }

    public function prices()
    {
        return $this->hasOne(Price::class, 'registration_id', 'id');
    }

    public function payments()
    {
        return $this->hasOne(Payment::class, 'registration_id', 'id');
    }

    public function registrations()
    {
        return $this->hasMany(Registration::class, 'customer_id', 'id');
    }

    public function flat_registration()
    {
        return $this->hasOne(FlatRegistration::class, 'customer_id', 'id');
    }

    public function land_registration()
    {
        return $this->hasOne(LandRegistration::class, 'customer_id', 'id');
    }

    public function mutation_registration()
    {
        return $this->hasOne(MutationRegistration::class, 'customer_id', 'id');
    }

    public function poa_registration()
    {
        return $this->hasOne(MutationRegistration::class, 'customer_id', 'id');
    }

    public function status()
    {
        return $this->hasOne(Status::class, 'registration_id', 'id');
    }

    public function building()
    {
        return $this->belongsTo(Building::class, 'building_no', 'id');
    }
}
