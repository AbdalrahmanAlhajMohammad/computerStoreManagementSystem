<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ManufactoryRequest;
use App\Manufactory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ManufactoryController extends Controller
{
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
        $manufactories=Manufactory::all();
        return view('admin.manufactories.index')
            ->with('manufactories',$manufactories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.manufactories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ManufactoryRequest $request)
    {
        $manufactory=new Manufactory();
        $manufactory->name=$request['name'];
        $manufactory->ar_name=$request['ar_name'];
        if ($request->hasFile('logo'))
            $manufactory->logo=basename($request->file('logo')->store('public/manufactories'));
        $manufactory->save();
        \Session::flash('msg','s:'.__('manufactories.insert_successfuly'));
        return redirect()->route('manufactories.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Manufactory $manufactory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Manufactory $manufactory)
    {
      //  $manufactory=Manufactory::find($id);
        return view('admin.manufactories.edit')
            ->with('manufactory',$manufactory);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ManufactoryRequest $request, Manufactory $manufactory)
    {
        $manufactory=Manufactory::find($id);
        $manufactory->name=$request['name'];
        $manufactory->ar_name=$request['ar_name'];
        if ($request->hasFile('logo'))
        {
            Storage::delete("public/manufactories/$manufactory->logo");
            $manufactory->logo=basename($request->file('logo')->store('public/manufactories'));
        }
        $manufactory->update();
        \Session::flash('msg','s:'.__('manufactories.edit_successfuly'));
        return redirect()->route('manufactories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Manufactory $manufactory)
    {
       // $manufactory=Manufactory::find($id);
        $manufactory->delete();
        Storage::delete("public/manufactories/$manufactory->logo");
        \Session::flash('msg','s:'.__('manufactories.delete_successfuly'));
        return redirect()->route('manufactories.index');
    }
}
