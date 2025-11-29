<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Models\DoctorAvailablity;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd('here');
        $users = User::with('roles')->get();

        return view('app.users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::where('guard_name', 'web')->orderBy('id', 'desc')->pluck('name', 'name')->all();

        return view('app.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validation
        $validatedData = $request->validate([
            'name'        => 'required|string|max:255',
            'email'       => 'required|email|max:255|unique:users,email',
            // 'password'    => ['required', 'confirmed', Rules\Password::defaults()]
        ]);

        $input = $request->all();

        if ($user = User::create($input)) {
            $user->assignRole($request->input('roles'));

            $doctor_id = $user->id;
            if (is_array($input['day_of_week'])) {
                $size = count($input['day_of_week']);
                for ($i = 0; $i < $size; $i++) {
                    $doctor_availablity = DoctorAvailablity::create([
                        'doctor_id' => $doctor_id,
                        'day_of_week' => $input['day_of_week'][$i],
                        'start_time' => $input['start_time'][$i],
                        'end_time' => $input['end_time'][$i],
                    ]);
                }
            } else {
                $size = count(json_decode($input['day_of_week']));
                // dd($size);
                for ($i = 0; $i < $size; $i++) {
                    $doctor_availablity = DoctorAvailablity::create([
                        'doctor_id' => $doctor_id,
                        'day_of_week' => json_decode($input['day_of_week'])[$i],
                        'start_time' => json_decode($input['start_time'])[$i],
                        'end_time' => json_decode($input['end_time'])[$i],
                    ]);
                }
            }


            return redirect()->route('users.index')->with('success', 'User Created Successfully.');
        } else {
            return redirect()->back()->withInput()->with('error', 'User Creation Failed');
        }

        // return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        $roles = Role::pluck('name', 'id'); // id => name
        $user = User::with('roles')->find($id);
        $userRole = $user->roles->pluck('id')->toArray(); // selected ids
        // dd($userRole);
        return view('app.users.edit', compact('user', 'roles', 'userRole'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        // validation
        $request->validate([
            'name'        => 'required|string|max:255',
            'email'       => 'required|email|max:255|unique:users,email,' . $id,
            'roles' => 'required|integer|exists:roles,id'
        ]);


        $input = $request->all();
        $user = User::find($id);

        // dd($request->all());

        if (is_array($input['day_of_week'])) {
            if (DoctorAvailablity::where('doctor_id', $id)->count()) {
                $delete_entries = DoctorAvailablity::where('doctor_id', $id)->delete();
            }

            $size = count($input['day_of_week']);
            for ($i = 0; $i < $size; $i++) {
                $doctor_availablity = DoctorAvailablity::create([
                    'doctor_id' => $user->id,
                    'day_of_week' => $input['day_of_week'][$i],
                    'start_time' => $input['start_time'][$i],
                    'end_time' => $input['end_time'][$i],
                ]);
            }
        } else {
            if (DoctorAvailablity::where('doctor_id', $id)->count()) {
                $delete_entries = DoctorAvailablity::where('doctor_id', $id)->delete();
            }

            $size = count(json_decode($input['day_of_week']));
            for ($i = 0; $i < $size; $i++) {
                $doctor_availablity = DoctorAvailablity::create([
                    'doctor_id' => $user->id,
                    'day_of_week' => json_decode($input['day_of_week'])[$i],
                    'start_time' => json_decode($input['start_time'])[$i],
                    'end_time' => json_decode($input['end_time'])[$i],
                ]);
            }
        }


        if ($user->update($input)) {
            $user->roles()->sync($request->input('roles'));
            return redirect()->route('users.index')->with('success', 'Prewedding Updated Successfully');
        } else {
            return redirect()->back()->withInput()->with('error', 'Prewedding Updation Failed');
        }





        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}