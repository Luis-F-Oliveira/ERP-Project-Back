<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index()
    {
        return Stock::all();
    }

    public function store(Request $request)
    {
        return Stock::create($request->all());
    }

    public function show(string $id)
    {
        return Stock::find($id);
    }

    public function update(Request $request, string $id)
    {
        $stock = Stock::find($id);
        $stock->update($request->all());
        return response()->json($stock, 200);
    }

    public function destroy(string $id)
    {
        $stock = Stock::find($id);
        $stock->delete();
        return response()->json(['message' => 'Registro excluído com sucesso'], 200);
    }
}
