<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QRCode extends Model
{
    use HasFactory;
    protected $table = "q_r_codes";
    protected $fillable = [
        'qr_location',
        'event_id',
        'status',
        'scanned',
        'end_date',
        'scannedby',
        'number_of_scans'
    ];

    public function organisation()
    {
        return $this->belongsTo(Organisation::class);
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
