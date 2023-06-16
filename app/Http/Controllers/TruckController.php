<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Truck;
use Illuminate\Http\Request;

class TruckController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trucks = Truck::simplePaginate(25);

        return view('trucks.index', compact('trucks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('trucks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Truck::create($this->validateTruck($request));

        return redirect(route('trucks.index'))->with('status', 'Truck added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Truck $truck)
    {
        return view('trucks.show', compact('truck'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Truck $truck)
    {
        return view('trucks.edit', compact('truck'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Truck $truck)
    {
        $truck->update($this->validateTruck($request));

        return redirect(route('trucks.show', $truck))->with('status', 'Truck updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Truck $truck)
    {
        $truck->delete();

        return redirect(route('trucks.index'));
    }

    public function validateTruck(Request $request): array
    {
        return $request->validate([
            'license' => 'required',
            'location' => 'string',
            'status' => 'string',
            'posX' => 'numeric',
            'posY' => 'numeric'
        ]);
    }
    public function indexWithTrucks()
    {
        $trucks = Truck::simplePaginate(25);
        return view('levels.level1', ['trucks' => $trucks]);
    }


    public function truck1()
    {
        $reports = Report::all();
        return view('dropdown.truck1', compact('reports'));
    }

    public function truck2()
    {
        $reports = Report::all();
        return view('dropdown.truck2', compact('reports'));
    }

    public function truck3()
    {
        $reports = Report::all();
        return view('dropdown.truck3', compact('reports'));
    }

    public function truck4()
    {
        $reports = Report::all();
        return view('dropdown.truck4', compact('reports'));
    }

    public function truck5()
    {
        $reports = Report::all();
        return view('dropdown.truck5', compact('reports'));
    }
}
