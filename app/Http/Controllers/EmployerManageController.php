<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use Illuminate\Http\Request;

class EmployerManageController extends Controller
{
      public function index()
    {
        $employers = Employer::all();
        return view('admin.employers.index', compact('employers'));
    }

    public function show($id)
    {
        $employer = Employer::findOrFail($id);
        return view('admin.employers.show', compact('employer'));
    }
}
