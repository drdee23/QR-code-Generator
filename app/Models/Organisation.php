<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organisation extends Model
{
    use HasFactory;
    protected $table = "organisations";
    protected $fillable = [
        'name',
        'logo',
        'color',
        'status',
       
    ];

    public function organisation_personel()
    {
        return $this->hasMany(OrganisationPersonel::class);
    }
    public function admin()
    {
        return $this->hasOne(OrganisationPersonel::class);
    }
    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
