<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Unit;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $units = Unit::all();
        return view('admin.units.index',compact('units'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('admin.units.create');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $units = Unit::create($request->all());
        return redirect()->route('admin.units.index')->with('info', 'La unidad se creó con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Unit $unit)
    {
        // return view('admin.units.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Unit $unit)
    {
       
        // return view('admin.units.edit', compact('units'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Unit $unit)
    {
    
        
        // $units->update($request->all());
        // return redirect()->route('admin.units.index');
      

    }
    public function updateModal(Request $request)
    {
    
        $id = $request->id;
        $title = $request->title;
        
        $unit = Unit::find($id);
        $unit->title=$title;
        $unit->save();
        return redirect()->route('admin.units.index');
      

    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Unit $unit)
    {
         $unit->delete();

        return redirect()->route('admin.units.index')->with('eliminar','ok');
    }
}


