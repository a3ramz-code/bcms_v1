<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index() { return Company::paginate(); }
    public function store(Request $r) { return Company::create($r->validate(['name'=>'required'])); }
    public function show(Company $company) { return $company; }
    public function update(Request $r, Company $company) { $company->update($r->all()); return $company; }
    public function destroy(Company $company) { $company->delete(); return response()->noContent(); }
}
