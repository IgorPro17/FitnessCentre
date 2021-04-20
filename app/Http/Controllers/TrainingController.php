<?php

namespace App\Http\Controllers;

use App\Http\Requests\TrainingRequest;
use App\Models\Coach;
use App\Models\Price;
use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TrainingController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        $prices = Price::get();
        $coachs = Coach::get();
        return view('training.form', compact('prices', 'coachs'));
    }

    public function store(TrainingRequest $request)
    {
        DB::insert('insert into trainings (user_id, coach_id, price_id, time) values (?, ?, ?, ?)', [Auth::user()->id, $request->coach_id, $request->price_id, $request->time]);
        return redirect()->route('home');
    }

    public function show(Training $training)
    {
        //
    }

    public function edit(Training $training)
    {
        //
    }

    public function update(Request $request, Training $training)
    {
        //
    }

    public function destroy($id)
    {
        DB::table('trainings')->where('id', '=', $id)->delete();
        return redirect()->route('home');
    }
}
