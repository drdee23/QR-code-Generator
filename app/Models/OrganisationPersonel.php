<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganisationPersonel extends Model
{
    use HasFactory;
    protected $table = "organisation_personels";
    protected $fillable = [
        'person_id',
        'organisation_id',
        'position'
       ];

    public function person()
    {
        return $this->belongsTo(Person::class);
    }

    public function organisation()
    {
        return $this->belongsTo(Organisation::class);
    }
}
