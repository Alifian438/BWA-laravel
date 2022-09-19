<?php

namespace App\Http\Controllers\Backsite;

use App\Http\Controllers\Controller;

//use library here
use Illuminate\Support\Facedes\Storage;
use Symfony\Component\HttpFoundation\Response;

//use everything here
// use gate
use Auth;

//use model here (masukkan model yang di butuhkan pada controller)
use App\Models\Operational\Appointment;
use App\Models\Operational\Doctor;//kita ambil data specialist karena ada sepcialist_id di doctor
use App\Models\User;
use App\Models\MasterData\Consultation;

//thidparty package
class ReportAppointmentController extends Controller
{
     /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //for table
        $appointment = Appointment::orderBy('created_at', 'desc')->get();

        //for select2
        $doctor = Doctor::orderBy('name', 'asc')->get(); //kenapa asc karena agar nama urut sesuai abjact

        //for select3
        $user = User::orderBy('name', 'asc')->get(); //kenapa asc karena agar nama urut sesuai abjact

        //for select4
        $consultation = Consultation::orderBy('name', 'asc')->get(); //kenapa asc karena agar nama urut sesuai abjact

        return view('pages.backsite.operational.appointment.index', compact('appointment', 'doctor', 'user', 'consultation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return abort(404);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        return view('pages.backsite.operational.appointment.show', compact('appointment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return abort(404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return abort(404);
    }
}
