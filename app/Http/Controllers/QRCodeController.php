<?php

namespace App\Http\Controllers;

use App\Models\QRCode;
use App\Repositories\EventRepo;
use App\Repositories\OrganisationRepo;
use App\Repositories\QRCodeRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class QRCodeController extends Controller
{
    protected $person, $organisation, $event, $qr_codes;

    public function __construct(OrganisationRepo $organisation, EventRepo $event, QRCodeRepo $qr_codes)
    {
        $this->qr_codes = $qr_codes;
        $this->organisation = $organisation;
        $this->event = $event;
    }

    public function index()
    {
        $d['events'] = $this->event->allevents();
        $d['organisations'] = $this->organisation->allorganisations();
        // $d['events_count'] = $this->event->getEventsByOrg();

        return view('pages.qrs.index', $d);
    }


    public function eventqrs($encrypted_id)
    {

        $decrypted_id= Crypt::decrypt($encrypted_id);
        $d['event'] = $this->event->find($decrypted_id);
        $d['organisations'] = $this->organisation->allorganisations();
        $d['qr_codes'] = $this->qr_codes->eventQRCodes($encrypted_id);
        // $d['events_count'] = $this->event->getEventsByOrg();

        return view('pages.qrs.event', $d);
    }

    public function generate(Request $request)
    {
    
        $decrypted_id= $request->event_id;
        $updated_event = $this->event->update($decrypted_id, $request);

   
        if($updated_event)
        {
            $d['event'] = $this->event->find($decrypted_id)->first();
         
            $d['qr_codes'] = $this->qr_codes->create($d['event']);

        }
        
        return ;
        //
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        return QrCode::format('png')->size(500)->merge('/path/to/logo.png', .3, true)->generate('Welcome to Laravel!');
    }

    /**
     * Display the specified resource.
     */
    public function show(QRCode $qRCode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(QRCode $qRCode)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, QRCode $qRCode)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(QRCode $qRCode)
    {
        //
    }
}
