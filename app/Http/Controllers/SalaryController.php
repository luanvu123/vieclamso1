<?php
namespace App\Http\Controllers;

use App\Models\Salary;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    public function index()
    {
        $salaries = Salary::all();
        return view('admin.salaries.index', compact('salaries'));
    }

    public function create()
    {
        return view('admin.salaries.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|in:active,inactive',
            'count' => 'required|integer|min:0',
        ]);

        Salary::create($request->all());

        return redirect()->route('salaries.index')->with('success', 'Salary created successfully.');
    }

    public function show(Salary $salary)
    {
        return view('admin.salaries.show', compact('salary'));
    }

    public function edit(Salary $salary)
    {
        return view('admin.salaries.edit', compact('salary'));
    }

    public function update(Request $request, Salary $salary)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|in:active,inactive',
            'count' => 'required|integer|min:0',
        ]);

        $salary->update($request->all());

        return redirect()->route('salaries.index')->with('success', 'Salary updated successfully.');
    }

    public function destroy(Salary $salary)
    {
        $salary->delete();

        return redirect()->route('salaries.index')->with('success', 'Salary deleted successfully.');
    }
}
