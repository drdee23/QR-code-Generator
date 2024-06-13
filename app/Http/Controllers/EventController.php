<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Repositories\EventRepo;
use App\Repositories\OrganisationRepo;
use Illuminate\Http\Request;

class EventController extends Controller
{   
    
    protected $person, $organisation, $event;

    public function __construct( OrganisationRepo $organisation, EventRepo $event)
    {
 
        $this->organisation = $organisation;
        $this->event = $event;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $d['events'] = $this->event->allevents();
        $d['organisations'] = $this->organisation->allorganisations();
        // $d['events_count'] = $this->event->getEventsByOrg();

        return view('pages.events.index', $d);
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

        // dd($request->all());

       $this->event->create($request);
       return back()->with('message', 'Event successfully added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        //
    }
}
