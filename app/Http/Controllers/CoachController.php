<?php

namespace App\Http\Controllers;

use App\Http\Requests\CoachRequest;
use App\Models\Coach;

class CoachController extends Controller
{
    public function index()
    {
        $coachs = Coach::get();
        return view('coach.index', compact('coachs'));
    }

    public function create()
    {
        return view('coach.form');
    }

    public function store(CoachRequest $request)
    {
        Coach::create($request->only(['name', 'description', 'avatar']));
        return redirect()->route('coach.index');
    }

    public function show(Coach $coach)
    {
        return view('coach.show', compact('coach'));
    }

    public function edit(Coach $coach)
    {
        return view('coach.form', compact('coach'));
    }

    public function update(CoachRequest $request, Coach $coach)
    {
        $coach->update($request->only(['name', 'description', 'avatar']));
        return redirect()->route('coach.index');
    }

    public function destroy(Coach $coach)
    {
        $coach->delete();
        return redirect()->route('coach.index');
    }
}
