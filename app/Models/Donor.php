<?php

namespace App\Models;

use App\Traits\Enums;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donor extends Model
{
    use HasFactory;

    public $fillable = [
        'name',
        'parental_surname',
        'maternal_surname',
        'city_id',
        'state_id',
        'bloodtype',
        'donortype',
        'gendertype',
        'born_date',
        'age',
        'email',
        'mobile'
    ];

    public function city(){
        return $this->belongsTo(City::class);
    }

    public function state(){
        return $this->belongsTo(State::class);
    }

    use Enums;

    protected $enumBloodtypes = [
        'b1' => 'A+',
        'b2' => 'B+',
        'b3' => 'O+',
        'b4' => 'AB+',
        'b5' => 'A-',
        'b6' => 'B-',
        'b7' => 'O-',
        'b8' => 'AB-',
    ];

    protected $enumGendertypes = [
        'F' => 'Femenino',
        'M' => 'Masculino'
    ];

    protected $enumDonortypes = [
        'D1' => 'Sangre',
        'D2' => 'Aféresis'
    ];
}
