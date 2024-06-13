<?php

namespace App\Repositories;

use App\Models\Event;
use App\Models\EventPersonel;
use App\Models\Organisation;

class EventRepo {

    public function allEvents()
    {
        return Event::with('organisation')->get();
    }
    public function update($id, $d)
    {
        $data['title'] = $d->title;
        $data['organisation_id'] = $d->organisation_id;
        $data['number_of_qrs'] = $d->number_of_qrs;
        $data['start_date'] = $d->start_date;
        $data['end_date'] = $d->end_date;
        $data['description'] = $d->description;

        return Event::find($id)->update($data);
    }

    public function delete($id)
    {
        return Event::destroy($id);
    }

    public function create($d)
    {
        $data['title'] = $d->title;
        $data['organisation_id'] = $d->organisation_id;
        $data['number_of_qrs'] = $d->number_of_qrs;
        $data['start_date'] = $d->start_date;
        $data['end_date'] = $d->end_date;
        $data['description'] = $d->description;
        // dd($data);
        return Event::create($data);
    }

    public function createOrgPersonel($data)
    {
        return EventPersonel::create($data);
    }
    public function getEventsByOrg($orgid)
    {
        return Event::where('organisation_id', $orgid)->get();
    }

    public function find($Event_id)
    {
        return Event::with('organisation')->find($Event_id);
    }

}
