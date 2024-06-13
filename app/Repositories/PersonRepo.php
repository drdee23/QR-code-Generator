<?php

namespace App\Repositories;


use App\Models\Person;
use App\User;
use App\Helpers\Qs;
use DateTime;


class PersonRepo
{
    // protected $loc;

    // public function __construct(LocationRepo $loc)
    // {
    //     $this->loc = $loc;
    // }

    public function update($id, $data)
    {
        return Person::find($id)->update($data);
    }


    public function delete($id)
    {
        return Person::destroy($id);
    }

    public function create($data)
    {
        return Person::create($data);
    }


    public function find($id)
    {
        return Person::find($id);
    }
    public function existByPhoneNumber($phone_number)
    {
        return Person::where('phone_number', $phone_number)->first();
    }

    public function existByEmail($email)
    {
        return Person::where('email', $email)->first();
    }
    public function getAll()
    {
        return Person::orderBy('first_name', 'asc')->get();
    }

    

    public function updatePerson($req, $id)
    {
        $person = $this->find($id);
        $person->first_name = ucwords($req->first_name);
        $person->last_name = ucwords($req->last_name);
        $person->middle_name = ucwords($req->middle_name);
        $person->email = $req->email;
        $person->phone_number = $req->phone_number;
        $person->gender = $req->gender;
        $person->dob = $req->dob;
        $person->country_id = $req->country_id;

        // $person->region_id = $this->loc->getRegionByRegionName("Central Region");
        $person->district_id = $req->district_id;
        $person->address = $req->address;
        $person->blood_group = $req->blood_group;

        if ($req->hasFile('photo')) {
            $photo = $req->file('photo');
            $f = Qs::getFileMetaData($photo);
            $f['name'] = 'photo-' . $person->email . '.' . $f['ext'];
            $f['path'] = $photo->storeAs(Qs::getPersonUploadPath() . $person->email, $f['name']);
            $person->photo = asset('storage/' . $f['path']);
        }
        // $this->person->update($id, $data);   /* UPDATE PERSON RECORD */
        // dd( $person);
        $person->save();
        return $person;
    }

    public function createPerson($req)
    {
        $data = [];
        $data['first_name'] = ucwords($req->first_name);
        $data['last_name'] = ucwords($req->last_name);
        $data['middle_name'] = ucwords($req->middle_name);
        $data['email'] = $req->email;
        $data['phone_number'] = $req->phone_number;
        $data['gender'] = $req->gender;
        $data['dob'] = new DateTime($req->dob);
        $data['country_id'] = $req->country_id;
        // $data['region_id'] = $this->loc->getRegionByRegionName("Central Region");
        $data['district_id'] = $req->district_id;
        $data['address'] = $req->address;
        $data['blood_group'] = $req->blood_group;
        $data['photo'] = Qs::getDefaultUserImage();

        if ($req->hasFile('photo')) {
            $photo = $req->file('photo');
            $f = Qs::getFileMetaData($photo);
            $f['name'] = 'passportphoto.' . $f['ext'];
            $f['path'] = $photo->storeAs(Qs::getPersonUploadPath() . $data['email'], $f['name']);
            $data['photo'] = asset('storage/' . $f['path']);
        } else {
            $data['photo'] = asset('user.png');
        }

        /* Ensure that Email is not blank*/
        if (!$req->email) {
            return back()->with('pop_error', __('msg.user_invalid'));
        }
        return $this->create($data); // Create Person
    }
}
