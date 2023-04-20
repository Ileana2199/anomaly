<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\System;
use App\Models\Admin\Equipment;
use App\Models\Admin\Area;
use App\Models\Admin\Unit;


class SystemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $systems = System::all();
        $equipments = Equipment::all();
        $areas = Area::all();
        $units = Unit::all();

        return view('admin.systems.index',compact('systems','equipments','areas','units'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $systems = System::all();
        return view('admin.systems.create',compact('systems'));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $systems = System::create($request->all());
        return redirect()->route('admin.systems.index')->with('info', 'El sistema se creó con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(System $system)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(System $system)
    {
        //
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, System $system)
    {
       
        //
    }


    public function updateModal(Request $request)
    {
    
        $id = $request->id;
        $title = $request->title;
        
        $system = System::find($id);
        $system->title=$title;
        $system->save();
        return redirect()->route('admin.systems.index');
      

    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(System $system)
    {
        $system->delete();

        return redirect()->route('admin.systems.index')->with('eliminar','ok');
    }
}
