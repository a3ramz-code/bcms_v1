<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index() { return Service::paginate(); }
    public function store(Request $r) { return Service::create($r->validate(['company_id'=>'required|integer','name'=>'required','price'=>'required|numeric'])); }
    public function show(Service $service) { return $service; }
    public function update(Request $r, Service $service) { $service->update($r->all()); return $service; }
    public function destroy(Service $service) { $service->delete(); return response()->noContent(); }
}
