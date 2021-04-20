<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::check() && Auth::user()->role == true)
        {
            //Если администратор
            $trainings = DB::table('trainings')
            ->join('users', 'users.id', '=', 'trainings.user_id')
            ->join('prices', 'prices.id', '=', 'trainings.price_id')
            ->join('coaches', 'coaches.id', '=', 'trainings.coach_id')
            ->select('users.name as user', 'prices.name as pricelist', 'coaches.name as coach', 'trainings.time', 'prices.price', 'trainings.id')
            ->where('trainings.time', '>', 'now()')
            ->get();
            return view('home',  ['trainings' => $trainings]);
        }
        elseif(Auth::check() && isset(Auth::user()->coach_id))
        {
            //Если тренер
            $trainings = DB::table('trainings')
            ->join('users', 'users.id', '=', 'trainings.user_id')
            ->join('prices', 'prices.id', '=', 'trainings.price_id')
            ->join('coaches', 'coaches.id', '=', 'trainings.coach_id')
            ->select('users.name as user', 'prices.name as pricelist', 'coaches.name as coach', 'trainings.time', 'prices.price', 'trainings.id')
            ->where('trainings.time', '>', 'now()')
            ->where('trainings.coach_id', '=', Auth::user()->coach_id)
            ->get();
            return view('home',  ['trainings' => $trainings]);
        }
        else
        {
            //Если обычный пользователь
            $trainings = DB::table('trainings')
            ->join('users', 'users.id', '=', 'trainings.user_id')
            ->join('prices', 'prices.id', '=', 'trainings.price_id')
            ->join('coaches', 'coaches.id', '=', 'trainings.coach_id')
            ->select('users.name as user', 'prices.name as pricelist', 'coaches.name as coach', 'trainings.time', 'prices.price', 'trainings.id')
            ->where('trainings.time', '>', 'now()')
            ->where('trainings.user_id', '=', Auth::user()->id)
            ->get();
            return view('home',  ['trainings' => $trainings]);
        }
    }
}
