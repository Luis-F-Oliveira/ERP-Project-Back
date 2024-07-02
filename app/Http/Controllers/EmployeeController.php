<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        return Employee::all();
    }

    public function store(Request $request)
    {
        return Employee::create($request->all());
    }

    public function show(string $id)
    {
        return Employee::find($id);
    }

    public function update(Request $request, string $id)
    {
        $employee = Employee::find($id);
        $employee->update($request->all());
        return response()->json($employee, 200);
    }

    public function destroy(string $id)
    {
        $employee = Employee::find($id);
        $employee->delete();
        return response()->json(['message' => 'Registro excluído com sucesso'], 200);
    }
}
