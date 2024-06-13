<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $table = "events";
    protected $fillable = [
        'title',
        'organisation_id',
        'status',
        'start_date',
        'end_date',
        'number_of_qrs',
        'description'
    ];

    public function organisation()
    {
        return $this->belongsTo(Organisation::class);
    }

    public function event_personel()
    {
        return $this->hasMany(EventPersonel::class);
    }


    public function qr()
    {
        return $this->hasMany(QRCode::class);
    }
}
