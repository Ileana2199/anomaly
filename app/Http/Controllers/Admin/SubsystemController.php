<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Subsystem;
use App\Models\Admin\System;
use App\Models\Admin\Equipment;
use App\Models\Admin\Area;
use App\Models\Admin\Unit;


class SubsystemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subsystems = Subsystem::all();
        $systems = System::all();
        $equipments = Equipment::all();
        $areas = Area::all();
        $units = Unit::all();
        return view('admin.subsystems.index',compact('subsystems','systems','equipments','areas','units'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $subsystems = Subsystem::all();
        // return view('admin.subsystems.create',compact('subsystems'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $subsystems = Subsystem::create($request->all());
        return redirect()->route('admin.subsystems.index')->with('info', 'El subsistema se creó con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Subsystem $subsystem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subsystem $subsystem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subsystem $subsystem)
    {
        //
    }
    public function updateModal(Request $request)
    {
    
        $id = $request->id;
        $title = $request->title;
        
        $subsystem = Subsystem::find($id);
        $subsystem->title=$title;
        $subsystem->save();
        return redirect()->route('admin.subsystems.index');
      

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subsystem $subsystem)
    {
        $subsystem->delete();

        return redirect()->route('admin.subsystems.index')->with('eliminar','ok');
    }
}
