<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Component;
use App\Models\Admin\Subsystem;
use App\Models\Admin\System;
use App\Models\Admin\Equipment;
use App\Models\Admin\Area;
use App\Models\Admin\Unit;



class ComponentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $components = Component::all();
        $subsystems = Subsystem::all();
        $systems = System::all();
        $equipments = Equipment::all();
        $areas = Area::all();
        $units = Unit::all();
        return view('admin.components.index',compact('components','subsystems','systems','equipments','areas','units'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $components = Component::create($request->all());
        $component = new Component();
        $component->title=$request->title;
        $component->subsystem_id=$request->subsystem_id;
        $component->save();
        return redirect()->route('admin.components.index')->with('info', 'El componente se creó con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Component $component)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Component $component)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Component $component)
    {
        //
    }
    public function updateModal(Request $request)
    {
    
        $id = $request->id;
        $title = $request->title;
        
        $component = Component::find($id);
        $component->title=$title;
        $component->save();
        return redirect()->route('admin.components.index');
      

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Component $component)
    {
        $components->delete();

        return redirect()->route('admin.components.index')->with('eliminar','ok');
    }
}
