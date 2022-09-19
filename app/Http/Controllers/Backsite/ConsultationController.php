<?php

namespace App\Http\Controllers\Backsite;

use App\Http\Controllers\Controller;

//use library here
use Illuminate\Support\Facedes\Storage;
use Symfony\Component\HttpFoundation\Response;

//request
use App\Http\Requests\Consultation\UpdateConsultationRequest;
use App\Http\Requests\Consultation\StoreConsultationRequest;

//use everything here
// use gate
use Auth;

//use model here (masukkan model yang di butuhkan pada controller)
use App\Models\MasterData\Consultation;


//thidparty package
use Illuminate\Http\Request;

class ConsultationController extends Controller
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
        $consultation = Consultation::orderBy('created_at', 'desc')->get();

        return view('pages.backsite.master-data.consultation.index', compact('consultation'));
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
    public function store(StoreConsultationRequest $request)
    {
        //get all request from frontsite
        $data =  $request->all();

        //store to database
        $consultation = Consultation::create($data);

        alert()->success('Success Message', 'Successfully added new consultation');
        return redirect()->route('backsite.consultation.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Consultation $consultation)
    {
        return view('pages.backsite.master-data.consultation.index.show', compact('consultation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Consultation $consultation)
    {
        return view('pages.backsite.master-data.consultation.index.edit', compact('consultation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateConsultationRequest $request, Consultation $consultaion)
    {
        $data = $request->all();

        $consultation->update($data);

        alert()->success('Success Message', 'Successfully added new consultation');
        return redirect()->route('backsite.consultation.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Consultation $consultation)
    {
        $consultation->delete(); //untuk soft delete
        // $specialist->forceDelete(); //untuk hard delete

        alert()->success('Success Message', 'Successfully deleted consultation');
        return back();
    }
}
