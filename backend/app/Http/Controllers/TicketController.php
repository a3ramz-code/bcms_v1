<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index() { return Ticket::orderByDesc('id')->paginate(); }
    public function store(Request $r) { return Ticket::create($r->validate(['company_id'=>'required|integer','customer_id'=>'nullable|integer','subject'=>'required','description'=>'nullable'])); }
    public function show(Ticket $ticket) { return $ticket; }
    public function update(Request $r, Ticket $ticket) { $ticket->update($r->all()); return $ticket; }
    public function destroy(Ticket $ticket) { $ticket->delete(); return response()->noContent(); }
}
