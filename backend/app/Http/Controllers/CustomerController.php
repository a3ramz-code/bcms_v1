<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index() { return Customer::paginate(); }
    public function store(Request $r) { return Customer::create($r->validate(['company_id'=>'required|integer','name'=>'required'])); }
    public function show(Customer $customer) { return $customer; }
    public function update(Request $r, Customer $customer) { $customer->update($r->all()); return $customer; }
    public function destroy(Customer $customer) { $customer->delete(); return response()->noContent(); }
}
