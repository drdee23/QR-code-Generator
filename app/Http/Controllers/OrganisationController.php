<?php

namespace App\Http\Controllers;

use App\Helpers\Qs;
use App\Models\Organisation;
use App\Repositories\EventRepo;
use App\Repositories\OrganisationRepo;
use App\Repositories\PersonRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class OrganisationController extends Controller
{

    protected $person, $organisation, $event;

    public function __construct(PersonRepo $person, OrganisationRepo $organisation, EventRepo $event)
    {
        $this->person = $person;
        $this->organisation = $organisation;
        $this->event = $event;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $d['organisations'] = $this->organisation->allorganisations();
        // $d['events_count'] = $this->event->getEventsByOrg();

        return view('pages.organisations.index', $d);
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

        // dd($request->all());
        //
        // $user_email=Auth::user()->email;
        $d['name'] = ucwords($request->name);
        $d['color'] = ucwords($request->color);

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $f = Qs::getFileMetaData($logo);
            $f['name'] = 'logo.' . $f['ext'];
            $f['path'] = $logo->storeAs(Qs::getUploadPath($d['name']), $f['name']);
            $d['logo'] = asset('storage/uploads/' . $d['name'] . '/' . $f['name']);
        }
        // dd($d);
        $neworg = $this->organisation->create($d); // create a new organisation
        if ($neworg) {
            $orgpersoneldata['person_id'] =  Auth::user()->person->id;
            $orgpersoneldata['organisation_id'] =  $neworg->id;
            $orgpersoneldata['position'] = 'admin';
            $this->organisation->createOrgPersonel($orgpersoneldata);
        } else {
            return back()->with('message', __('Organisation can not be created'));
        }
        return back()->with('message', __('Organisation uploaded successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Organisation $organisation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Organisation $organisation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Organisation $organisation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Organisation $organisation)
    {
        //
    }
}
