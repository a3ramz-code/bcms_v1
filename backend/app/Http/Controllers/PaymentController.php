<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function store(Request $r)
    {
        $data = $r->validate([
            'company_id' => ['required','integer'],
            'invoice_id' => ['required','integer'],
            'paid_at' => ['nullable','date'],
            'amount' => ['required','numeric'],
            'method' => ['nullable'],
            'reference' => ['nullable'],
        ]);
        return Payment::create($data);
    }
}
