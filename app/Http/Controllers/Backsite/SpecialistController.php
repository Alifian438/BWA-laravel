<?php

namespace App\Http\Controllers\Backsite;

use App\Http\Controllers\Controller;

//use library here
use Illuminate\Support\Facedes\Storage;
use Symfony\Component\HttpFoundation\Response;

//request
use App\Http\Requests\Specialist\StoreSpecialistRequest;
use App\Http\Requests\Specialist\UpdateSpecialistRequest;

//use everything here
// use gate
use Auth;

//use model here (masukkan model yang di butuhkan pada controller)
use App\Models\MasterData\Specialist;

//thidparty package

class SpecialistController extends Controller
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
        $specialist = Specialist::orderBy('created_at', 'desc')->get();

        return view('pages.backsite.master-data.specialist.index', compact('specialist'));
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
    public function store(StoreSpecialistRequest $request)
    {
        //get all request from frontsite
        $data =  $request->all();

        //store to database
        $specialist = Specialist::create($data);

        alert()->success('Success Message', 'Successfully added new specialist');
        return redirect()->route('backsite.specialist.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Specialist $specialist)
    {
        return view('pages.backsite.master-data.specialist.show', compact('specialist'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Specialist $specialist)
    {
        return view('pages.backsite.master-data.specialist.edit', compact('specialist'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSpecialistRequest $request, Specialist $specialist)
    {
        $data = $request->all();

        $specialist->update($data);

        alert()->success('Success Message', 'Successfully added new specialist');
        return redirect()->route('backsite.specialist.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Specialist $specialist)
    {
        $specialist->delete(); //untuk soft delete
        // $specialist->forceDelete(); //untuk hard delete

        alert()->success('Success Message', 'Successfully deleted specialist');
        return back();
    }
}
