<?php

namespace App\Http\Controllers\Analytics;

use App\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShowAnalytics extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke(Request $request)
    {
        $messages = Message::orderBy('created_at', 'desc')->paginate(25);

        return view('analytics.show')->with('messages', $messages );
    }
}