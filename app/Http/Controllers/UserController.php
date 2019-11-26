<?php

namespace App\Http\Controllers;

use App\User;
use App\Company;
use Carbon\Carbon;
use App\HealthInformation;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        return view('users.index', ['users' => $model->paginate(15)]);
    }

    /**
     * Show the form for creating a new user
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $companies = Company::all();
        return view('users.create')->with(compact([
            'companies',
        ]));
    }

    /**
     * Store a newly created user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $model
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserRequest $request)
    {
        $dob = Carbon::createFromFormat('m/d/Y', $request->date_of_birth)->format('Y-m-d');
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'gender' => $request->gender,
            'phone_number' => $request->phone_number,
            'date_of_birth' => $dob,
            'company_id' => $request->company_id,
            'rig_id' => $request->rig_id,
        ]);

        HealthInformation::create([
            'patient_id' => $user->id,
            'weight' => $request->weight,
            'height' => $request->height,
            'hdlc' => $request->hdlc,
            'blood_pressure' => $request->blood_pressure,
            'treatment' => $request->treatment,
            'total_cholesterol' => $request->total_cholesterol,
            'diabetes' => $request->diabetes,
            'smoker' => $request->smoker,
            'family_history' => $request->family_history,
            'medical_history' => $request->medical_history,
        ]);

        return redirect()->route('user.index')->withStatus(__('User successfully created.'));
    }

    /**
     * Show the form for editing the specified user
     *
     * @param  \App\User  $user
     * @return \Illuminate\View\View
     */
    public function edit(User $user)
    {
        $companies = Company::all();

        return view('users.edit', compact('user', 'companies'));
    }

    /**
     * Update the specified user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserRequest $request, User  $user)
    {
        $dob = Carbon::createFromFormat('m/d/Y', $request->date_of_birth)->format('Y-m-d');
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'gender' => $request->gender,
            'phone_number' => $request->phone_number,
            'date_of_birth' => $dob,
            'company_id' => $request->company_id,
            'rig_id' => $request->rig_id,
        ]);

        if ($request->password) {
            $user->update([
                'password' => Hash::make($request->password),
            ]);
        }

        if ($user->is_patient) {
            HealthInformation::updateOrCreate([
                'patient_id' => $user->id,
            ], [
                'weight' => $request->weight,
                'height' => $request->height,
                'hdlc' => $request->hdlc,
                'blood_pressure' => $request->blood_pressure,
                'treatment' => $request->treatment,
                'total_cholesterol' => $request->total_cholesterol,
                'diabetes' => $request->diabetes,
                'smoker' => $request->smoker,
                'family_history' => $request->family_history,
                'medical_history' => $request->medical_history,
            ]);
        }

        return redirect()->route('user.index')->withStatus(__('User successfully updated.'));
    }

    public function show(User $user)
    {
        return view('users.show')->with(compact('user'));
    }
    /**
     * Remove the specified user from storage
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User  $user)
    {
        $user->delete();

        return redirect()->route('user.index')->withStatus(__('User successfully deleted.'));
    }
}
