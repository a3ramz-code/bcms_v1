<?php

namespace App\Http\Controllers;

use App\Models\Reminder;

class ReminderController extends Controller
{
    public function index()
    {
        return Reminder::orderByDesc('id')->paginate();
    }
}
