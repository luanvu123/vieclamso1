<?php

namespace App\Http\Controllers;

use App\Models\Support;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'phone' => 'nullable|string',
            'email' => 'nullable|email',
            'type_support_id' => 'required|exists:type_support,id',
            'description' => 'required|string',
            'status' => 'nullable|in:pending,resolved,closed',
        ]);

        Support::create($request->all());

        return redirect()->back()->with('success', 'Yêu cầu hỗ trợ đã được gửi.');
    }
}
