<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class InvoiceController extends Controller
{
    public function index()
    {
        return Invoice::orderByDesc('id')->paginate();
    }

    public function generateBasic(Request $r)
    {
        $data = $r->validate([
            'company_id' => ['required','integer'],
            'customer_id' => ['required','integer'],
            'period' => ['required'],
            'amount' => ['required','numeric'],
            'due_date' => ['required','date'],
        ]);

        $data['invoice_no'] = 'INV-'.Str::upper(Str::random(8));
        $data['status'] = 'unpaid';

        return Invoice::create($data);
    }
}
