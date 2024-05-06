<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'firstName',
        'street',
        'postalCode',
        'city',
        'proEmail',
        'phoneNumber',
        'driverLicenseNumber',
    ];

    public function Reservations() {
        return $this->hasMany('App\Models\Reservation');
    }
}
