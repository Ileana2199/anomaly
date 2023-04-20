<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Unit;
use App\Models\Admin\Area;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $areas = Area::all();
        $units = Unit::all();
        return view('admin.areas.index',compact('areas','units'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $units = Unit::all();
        return view('admin.areas.create',compact('units'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $areas = Area::create($request->all());
        return redirect()->route('admin.areas.index')->with('info', 'El area se creó con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Area $area)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Area $area)
    {
        // $units = Unit::all();
        // return view('admin.areas.edit',compact('areas','units'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Area $area)
    {
        // $areas->update($request->all());
        // return redirect()->route('admin.areas.index');
    }
    public function updateModal(Request $request)
    {
    
        $id = $request->id;
        $title = $request->title;
        
        $area = Area::find($id);
        $area->title=$title;
        $area->save();
        
        // $unit = Unit::find($title);
        // $unit->title=$title;
        // $unit->save();
       

        return redirect()->route('admin.areas.index');
      

    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Area $area)
    {
        $area->delete();

        return redirect()->route('admin.areas.index')->with('eliminar','ok');
    }
}
