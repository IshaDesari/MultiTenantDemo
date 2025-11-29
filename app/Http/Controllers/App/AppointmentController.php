<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\User;
use App\Notifications\AppointmentNotification;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Notification;


class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd('here');
        $appointments = Appointment::all();
        return view('app.appointments.index', compact('appointments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $patients = User::whereHas('roles', function ($query) {
            $query->where('name', 'patient');
        })->get();
        $doctors = User::whereHas('roles', function ($query) {
            $query->where('name', 'doctor');
        })->get();
        return view('app.appointments.create', compact('patients', 'doctors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validation
        $request->validate([
            // 'name'        => 'required|string|max:255',
            // 'email'       => 'required|email|max:255|unique:appointments,email',
            // 'password'    => ['required', 'confirmed', Rules\Password::defaults()]
        ]);

        $input = $request->all();
        // dd($request->all());
        if ($appointment = Appointment::create($input)) {
            //  $admins = User::whereHas('roles', function ($q) {
            //         $q->where('name', 'admin');
            //     })->get();
            $doctor = User::find($request->doctor_id);
            // $admins->notify(new LeaveRequestToAdminNotify($appointment));
            Notification::send($doctor, new AppointmentNotification($appointment));
            return redirect()->route('appointments.index')->with('success', 'Appointment Created Successfully.');
        } else {
            return redirect()->back()->withInput()->with('error', 'Appointment Creation Failed');
        }

        // return redirect()->route('appointments.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointment $appointment)
    {
        $patients = User::whereHas('roles', function ($query) {
            $query->where('name', 'patient');
        })->get();
        $doctors = User::whereHas('roles', function ($query) {
            $query->where('name', 'doctor');
        })->get();

        $appointment = Appointment::findOrFail($appointment->id);
        return view('app.appointments.edit', compact('appointment', 'patients', 'doctors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // validation
        $this->validate($request, [
            // 'name'        => 'required|string|max:255',
            // 'email'       => 'required|email|max:255|unique:appointments,email,' . $appointment->id,
            // 'roles' => 'required|array'
        ]);


        $input = $request->all();
        $appointment = Appointment::find($id);


        // dd($request->all());
        if ($appointment->update($input)) {
            
               $patient = User::find($request->patient_id);
            // $admins->notify(new LeaveRequestToAdminNotify($appointment));
            Notification::send($patient, new AppointmentNotification($appointment));
            
            return redirect()->route('appointments.index')->with('success', 'Appointment Updated Successfully');
        } else {
            return redirect()->back()->withInput()->with('error', 'Appointment Creation Failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointment $appointment)
    {
        //
    }
}