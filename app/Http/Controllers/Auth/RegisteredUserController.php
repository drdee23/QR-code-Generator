<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Person;
use App\Models\User;
use App\Repositories\PersonRepo;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{

    protected $person, $organisation;

    public function __construct(PersonRepo $person)
    {
        $this->person = $person;
    }

    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        if ($this->person->existByEmail($request->email)) {
            return redirect()->back()->withErrors(['email' => __('auth.email_exist')]);
        }
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $this->person->createPerson($request);

        $person=$this->person->existByEmail($request->email);
        if ($person) {
            $user = User::create([
                'name' => $request->first_name,
                'email' => $request->email,
                'person_id' => $person->id,
                'password' => Hash::make($request->password),
            ]);
        } else {
            return redirect()->back()->withErrors(['email' => __('Failed to create a new user account please try again')]);
        }




        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}
