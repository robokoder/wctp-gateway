<?php

namespace App\Http\Controllers;

use App\Message;
use App\EventLog;
use App\Checklist;
use Carbon\Carbon;
use App\ServerStats;
use App\QueueStatus;
use Illuminate\Http\Request;

class ShowDashboard extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke(Request $request)
    {
        $queue = QueueStatus::get();
        $server = ServerStats::get();
        $checklist = Checklist::get();
        $events = EventLog::take(10)->orderBy('created_at', 'desc')->get();

        $inboundCount = Message::where('direction', 'inbound')->where('created_at', '>=', Carbon::now()->subHours(24))->count();
        $outboundCount = Message::where('direction', 'outbound')->where('created_at', '>=', Carbon::now()->subHours(24))->count();

        return view('home')
            ->with('server', $server )
            ->with('queue', $queue )
            ->with('checklist', $checklist )
            ->with('inboundCount', $inboundCount )
            ->with('outboundCount', $outboundCount )
            ->with('events', $events );
    }
}
