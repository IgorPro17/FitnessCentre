<?php

namespace App\Http\Controllers;

use App\Http\Requests\PriceRequest;
use App\Models\Price;

class PriceController extends Controller
{
    public function index()
    {
        $prices = Price::get();
        return view('price.index', compact('prices'));
    }

    public function create()
    {
        return view('price.form');
    }

    public function store(PriceRequest $request)
    {
        Price::create($request->only(['name', 'description', 'price']));
        return redirect()->route('price.index');
    }

    public function show(Price $price)
    {
        return view('price.show', compact('price'));
    }

    public function edit(Price $price)
    {
        return view('price.form', compact('price'));
    }

    public function update(PriceRequest $request, Price $price)
    {
        $price->update($request->only(['name', 'description', 'price']));
        return redirect()->route('price.index');
    }

    public function destroy(Price $price)
    {
        $price->delete();
        return redirect()->route('price.index');
    }
}
