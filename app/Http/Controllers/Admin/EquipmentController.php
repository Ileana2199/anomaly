<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Equipment;
use App\Models\Admin\Area;
use App\Models\Admin\Unit;


class EquipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $equipments = Equipment::all();
        $areas = Area::all();
        $units = Unit::all();
        return view('admin.equipments.index',compact('equipments','areas','units'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $equipments = Equipment::all();
        // return view('admin.equipments.create',compact('equipments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $equipments = Equipment::create($request->all());
        return redirect()->route('admin.equipments.index')->with('info', 'El equipo se creó con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Equiment $equipment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Equiment $equipment)
    {
        // $areas = Area::all();
        // return view('admin.equipments.edit',compact('equipments','areas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Equiment $equipment)
    {
        // $equipments->update($request->all());
        // return redirect()->route('admin.equipments.index');
    }
    public function updateModal(Request $request)
    {
    
        $id = $request->id;
        $title = $request->title;
        
        $equipment = Equipment::find($id);
        $equipment->title=$title;
        $equipment->save();
        return redirect()->route('admin.equipments.index');
      

    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Equipment $equipment)
    {
        $equipment->delete();

        return redirect()->route('admin.equipments.index')->with('eliminar','ok');
    }
}
