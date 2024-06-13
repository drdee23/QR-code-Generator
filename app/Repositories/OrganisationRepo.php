<?php

namespace App\Repositories;

use App\Models\Organisation;
use App\Models\OrganisationPersonel;

class OrganisationRepo {

    public function allorganisations()
    {
        return Organisation::withcount('events','organisation_personel')->get();
    }
    public function update($id, $data)
    {
        return Organisation::find($id)->update($data);
    }

    public function delete($id)
    {
        return Organisation::destroy($id);
    }

    public function create($data)
    {
        return Organisation::create($data);
    }

    public function createOrgPersonel($data)
    {
        return OrganisationPersonel::create($data);
    }
    public function getUserOrganisationRecords($id)
    {
        return Organisation::where('person_id', $id)->get();
    }

    public function find($Organisation_id)
    {
        return Organisation::with('person')->find($Organisation_id);
    }

}
