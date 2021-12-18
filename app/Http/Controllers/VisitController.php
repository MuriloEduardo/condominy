<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class VisitController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return Inertia::render('Visit/Index', [
            'visits' => Visit::orderBy('created_at', 'desc')
                ->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $visits = Visit::orderBy('created_at', 'desc')
            ->when($request->name, function ($query, $name) {
                return $query->where('name', 'LIKE', '%' . $name . '%');
            })
            ->when($request->document, function ($query, $document) {
                return $query->where('document', 'LIKE', '%' . $document . '%');
            })
            ->when($request->vehicle_plate, function ($query, $vehicle_plate) {
                return $query->where('vehicle_plate', 'LIKE', '%' . $vehicle_plate . '%');
            })
            ->when($request->destination_apartment, function ($query, $destination_apartment) {
                return $query->where('destination_apartment', 'LIKE', '%' . $destination_apartment . '%');
            })
            ->get();

        return Inertia::render('Visit/Create', [
            'visits' => $visits,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'document' => 'required',
            'destination_apartment' => 'required',
        ]);

        Visit::create($request->all());

        return Redirect::route('visits.create')->with('flash', [
            'message' => 'Visita cadastrada!',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Visit  $visit
     * @return \Illuminate\Http\Response
     */
    public function show(Visit $visit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Visit  $visit
     * @return \Illuminate\Http\Response
     */
    public function edit(Visit $visit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Visit  $visit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Visit $visit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Visit  $visit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Visit $visit)
    {
        //
    }
}
