<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;
    protected $table = 'people';
    protected $primaryKey = 'id';
    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'email',
        'phone_number',
        'gender', 'dob',
        'country_id',
        'region_id',
        'district_id',
        'address', 'photo',
        'blood_group'
    ];



    public function user()
    {
        return $this->hasMany(User::class);
    }
}
