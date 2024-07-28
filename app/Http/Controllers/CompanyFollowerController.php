<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use Illuminate\Support\Facades\Auth;
class CompanyFollowerController extends Controller
{
    public function follow($companyId)
    {
        $candidate = Auth::guard('candidate')->user();
        $company = Company::findOrFail($companyId);
        $candidate->followedCompanies()->attach($companyId);
        return response()->json(['success' => true, 'message' => 'Đã theo dõi công ty']);
    }

    public function unfollow($companyId)
    {
        $candidate = Auth::guard('candidate')->user();
        $company = Company::findOrFail($companyId);
        $candidate->followedCompanies()->detach($companyId);
        return response()->json(['success' => true, 'message' => 'Đã hủy theo dõi công ty']);
    }
}
