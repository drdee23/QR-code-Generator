<?php

namespace App\Repositories;

use App\Helpers\Qs;
use App\Models\QRCode as QRCodes;
use App\Models\QRCodePersonel;
use App\Models\Organisation;
use Illuminate\Support\Facades\Crypt;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QRCodeRepo
{

    public function allQRCodes()
    {
        return QRCodes::with('event')->get();
    }

    public function eventQRCodes($event_id)
    {
        return QRCodes::with('event')->where('event_id', $event_id)->get();
    }
    public function update($id, $data)
    {
        return QRCodes::find($id)->update($data);
    }

    public function delete($id)
    {
        return QRCodes::destroy($id);
    }

    public function create($d)
    {
        //  dd($d);
        for ($i = 1; $i <= $d->number_of_qrs; $i++) {

            $path = storage_path(Qs::getqrUploadPath($d->title));
            // dd($d->id);
            QrCode::size(200)->generate(Crypt::encrypt($d->id) . '/' . Crypt::encrypt($i), storage_path('app/public/' . $i . 'qrcode.png'));
            $data['qr_location'] =   $path;
            $data['event_id'] = $d->id;
            $data['number_of_scans'] = $d->number_of_scans;
            $data['scanned'] = $d->scanned;
            $data['scannedby'] = $d->scannedby;

            QRCodes::create($data);
        }
        return;
    }


    public function getQRCodesByOrg($orgid)
    {
        return QRCodes::where('organisation_id', $orgid)->get();
    }

    public function find($QRCode_id)
    {
        return QRCodes::with('organisation')->find($QRCode_id);
    }
}
