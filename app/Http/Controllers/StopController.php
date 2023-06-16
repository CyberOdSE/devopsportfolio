<?php

namespace App\Http\Controllers;

use App\Models\Stop;
use Illuminate\Http\Request;

class StopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stops = Stop::simplePaginate(25);

        return view('stops.index', compact('stops'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('stops.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Stop::create($this->validateStop($request));
        return redirect(route('stops.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Stop $stop)
    {
        return view('stops.show', compact('stop'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stop $stop)
    {
        return view('stops.edit', compact('stop'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Stop $stop)
    {
        $stop->update($this->validateStop($request));
        return redirect(route('stops.show', $stop));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stop $stop)
    {
        $stop->delete();
        return redirect(route('stops.index'));
    }

    public function validateStop(Request $request): array
    {
        return $request->validate([
            'length' => 'required', 'positive',
            'location' => ['required', 'min:3'],
        ]);

    }
}
